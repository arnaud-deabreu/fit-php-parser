<?php

declare(strict_types=1);

namespace FitParser\Command;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\MessageInterface;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\Printer;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\String\UnicodeString;

#[AsCommand(name: 'fit-parser:generate:profile')]
class GenerateProfileCommand extends Command
{
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $filePath = 'data/Profile.xlsx';

        $reader = IOFactory::createReaderForFile($filePath);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($filePath);

        $types = $this->parseTypes($spreadsheet);
        file_put_contents('data/types.json', json_encode($types));

        $io->success('Successfully generated types file.');

        $messages = $this->parseMessages($spreadsheet);
        file_put_contents('data/messages.json', json_encode($messages));

        $io->success('Successfully generated messages file.');

        $this->buildClassesFromJson();

        return Command::SUCCESS;
    }

    /** @phpstan-ignore-next-line */
    private function parseTypes(Spreadsheet $spreadsheet): array
    {
        $sheet = $spreadsheet->getSheetByName('Types');

        if (null === $sheet) {
            throw new \RuntimeException('Unable to read Types spreadsheet');
        }

        $types = [];
        $currentTypeName = null;
        $currentBaseType = null;
        $typeIndex = 0;

        // Loop through each row in the sheet
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            if (1 === $row->getRowIndex()) {
                continue; // skip header
            }

            foreach ($cellIterator as $cell) {
                if ('A' === $cell->getColumn() && '' !== $cell->getValue()) {
                    $currentTypeName = $cell->getValue();
                    $typeIndex = 0;
                }
                if ('B' === $cell->getColumn() && '' !== $cell->getValue()) {
                    $currentBaseType = $cell->getValue();
                }
                if (('C' === $cell->getColumn() || 'D' === $cell->getColumn()) && '' !== $cell->getValue()) {
                    if ('C' === $cell->getColumn()) {
                        $types[$currentTypeName][$typeIndex] = [
                            'baseType' => $currentBaseType,
                        ];
                        $types[$currentTypeName][$typeIndex]['name'] = $cell->getValue();
                    }
                    if ('D' === $cell->getColumn()) {
                        $value = $cell->getValue();
                        // @phpstan-ignore-next-line
                        $types[$currentTypeName][$typeIndex]['value'] = str_contains((string) $value, '0x') ? hexdec($value) : $value;
                        ++$typeIndex;
                    }
                }
            }
        }

        return $types;
    }

    /** @phpstan-ignore-next-line */
    private function parseMessages(Spreadsheet $spreadsheet): array
    {
        $typesContent = file_get_contents('data/types.json');

        if (false === $typesContent) {
            throw new \RuntimeException('Types needs to be parsed before parsing messages');
        }

        $types = json_decode($typesContent, true);

        $sheet = $spreadsheet->getSheetByName('Messages');

        if (null === $sheet) {
            throw new \RuntimeException('Unable to read Messages spreadsheet');
        }

        $messages = [];
        $currentMessageNum = 0;

        // Loop through each row in the sheet
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            if (1 === $row->getRowIndex()) {
                continue; // skip header
            }

            foreach ($cellIterator as $cell) {
                if ('A' === $cell->getColumn() && '' !== $cell->getValue()) {
                    $currentMessageName = $cell->getValue();
                    // @phpstan-ignore-next-line
                    foreach ($types['mesg_num'] as $msgNum) {
                        // @phpstan-ignore-next-line
                        if ($currentMessageName === $msgNum['name']) {
                            /** @phpstan-ignore-next-line */
                            $currentMessageNum = (int) $msgNum['value'];
                            $messages[$currentMessageNum] = [
                                'name' => $currentMessageName,
                                // @phpstan-ignore-next-line
                                'num' => $msgNum['value'],
                                'fields' => [],
                            ];

                            break;
                        }
                    }
                }

                if (true === \in_array($cell->getColumn(), ['B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'], true)) {
                    // TODO subFields
                    if (isset($messages[$currentMessageNum]['fields'][$row->getRowIndex()])) {
                        $messages[$currentMessageNum]['fields'][$row->getRowIndex()] = [];
                    }

                    $key = match ($cell->getColumn()) {
                        'B' => 'fieldDef',
                        'C' => 'fieldName',
                        'D' => 'fieldType',
                        'E' => 'array',
                        'F' => 'components',
                        'G' => 'scale',
                        'H' => 'offset',
                        'I' => 'units',
                        'J' => 'bits',
                        'K' => 'accumulate',
                    };

                    if ('fieldDef' === $key && !isset($messages[$currentMessageNum]['fields'][$cell->getValue()])) {
                        $index = $cell->getValue();
                        if ('' === $index) {
                            continue 2;
                        }
                    }

                    $value = match ($key) {
                        // @phpstan-ignore-next-line
                        'array' => json_decode($cell->getValue()) ?? [],
                        'bits',
                        'components',
                        // @phpstan-ignore-next-line
                        'offset' => (int) $cell->getValue(),
                        // @phpstan-ignore-next-line
                        'scale' => '' === $cell->getValue() ? 1 : (int) $cell->getValue(),
                        'accumulate' => (bool) $cell->getValue(),
                        default => $cell->getValue(),
                    };

                    // @phpstan-ignore-next-line
                    $messages[$currentMessageNum]['fields'][$index][$key] = $value;
                }
            }
        }

        return $messages;
    }

    private function buildClassesFromJson(): void
    {
        $nettePrinter = new Printer();
        $nettePrinter->linesBetweenMethods = 1;
        $nettePrinter->bracesOnNextLine = true;
        $nettePrinter->indentation = '    ';

        $messagesJsonContent = file_get_contents('data/messages.json');
        if (false === $messagesJsonContent) {
            throw new \RuntimeException('Messages needs to be parsed before generating classes');
        }

        $messages = json_decode($messagesJsonContent, true);

        $properties = [
            'type' => ['type' => 'string', 'key' => 'fieldType'],
            'def' => ['type' => 'int', 'key' => 'fieldDef'],
            'array' => ['type' => 'array', 'key' => 'array', 'phpdoc' => '@param int[] $array'],
            'components' => ['type' => 'int', 'key' => 'components'],
            'scale' => ['type' => 'int', 'key' => 'scale'],
            'offset' => ['type' => 'int', 'key' => 'offset'],
            'units' => ['type' => 'string', 'key' => 'units'],
            'bits' => ['type' => 'int', 'key' => 'bits'],
            'accumulate' => ['type' => 'bool', 'key' => 'accumulate'],
        ];

        $messageClasses = [];

        /**
         * @var array<string, array{
         *     name: string,
         *     num: int,
         *     fields: array{}|array{
         *           array{
         *               fieldDef: int,
         *               fieldName: string,
         *               fieldType: string,
         *               array: int[],
         *               components: int,
         *               scale: int,
         *               offset: int,
         *               units: string,
         *               accumulate: bool,
         *           }|array{}
         *      }
         *  }> $messages
         */
        foreach ($messages as $message) {
            $messageNamespace = new PhpNamespace('FitParser\Messages\Profile\Generated');

            $messageName = (new UnicodeString($message['name']))->camel()->title()->toString();
            $fieldNamespace = new PhpNamespace(
                \sprintf(
                    'FitParser\Messages\Profile\Generated\%s',
                    $messageName
                )
            );

            if (false === file_exists(\sprintf('src/Messages/Profile/Generated/%s', $messageName))) {
                mkdir(\sprintf('src/Messages/Profile/Generated/%s', $messageName));
            }

            $messageFile = new PhpFile();

            $messageFile->setStrictTypes();
            $messageFile->addComment('Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.');
            $messageFile->addNamespace($messageNamespace);

            $messageClass = new ClassType($messageName);
            $messageNamespace->add($messageClass);

            $messageClass->setFinal();
            $messageClass->setReadOnly();

            $messageNamespace->addUse(MessageInterface::class);
            $messageClass->addImplement(MessageInterface::class);

            $messageClassConstruct = $messageClass->addMethod('__construct');
            $messageClassConstruct->setPrivate();

            $createMethod = $messageClass->addMethod('create');
            $createMethod->setPublic();
            $createMethod->setReturnType('self');
            $createMethod->setStatic();
            $createMethod->addBody('return new self(');

            foreach ($message['fields'] as $field) {
                if ([] === $field) {
                    continue;
                }
                if ('array' === $field['fieldName']) {
                    $field['fieldName'] = 'field_array';
                }

                $file = new PhpFile();

                $file->setStrictTypes();
                $file->addComment('Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.');
                $file->addNamespace($fieldNamespace);

                $className = (new UnicodeString($field['fieldName']))->camel()->title()->toString();
                $class = new ClassType($className);
                $fieldNamespace->add($class);

                $class->setReadOnly();
                $class->setFinal();

                $fieldNamespace->addUse(FieldInterface::class);
                $class->addImplement(FieldInterface::class);

                $constructor = $class->addMethod('__construct');

                foreach ($properties as $propertyName => $propertyDefinition) {
                    $constructParam = $constructor->addPromotedParameter($propertyName, $field[$propertyDefinition['key']]);
                    $constructParam->setType($propertyDefinition['type']);
                    if (\array_key_exists('phpdoc', $propertyDefinition)) {
                        $constructor->addComment($propertyDefinition['phpdoc']);
                    }
                }

                $fieldGetDefinitionNumberMethod = $class->addMethod('getDefinitionNumber');
                $fieldGetDefinitionNumberMethod->setPublic();
                $fieldGetDefinitionNumberMethod->setReturnType('int');
                $fieldGetDefinitionNumberMethod->setBody('return $this->def;');

                $fieldGetDefinitionNumberMethod = $class->addMethod('getType');
                $fieldGetDefinitionNumberMethod->setPublic();
                $fieldGetDefinitionNumberMethod->setReturnType('string');
                $fieldGetDefinitionNumberMethod->setBody('return $this->type;');

                $fieldGetDefinitionNumberMethod = $class->addMethod('getScale');
                $fieldGetDefinitionNumberMethod->setPublic();
                $fieldGetDefinitionNumberMethod->setReturnType('int');
                $fieldGetDefinitionNumberMethod->setBody('return $this->scale;');

                $fieldGetDefinitionNumberMethod = $class->addMethod('getOffset');
                $fieldGetDefinitionNumberMethod->setPublic();
                $fieldGetDefinitionNumberMethod->setReturnType('int');
                $fieldGetDefinitionNumberMethod->setBody('return $this->offset;');

                file_put_contents(\sprintf('src/Messages/Profile/Generated/%s/%s.php', $messageName, $className), $nettePrinter->printFile($file));

                $fieldNamespace->removeClass($className);

                $messageNamespace->addUse(\sprintf('%s\%s', $fieldNamespace->getName(), $class->getName()));
                $messageClassConstructParam = $messageClassConstruct->addPromotedParameter(lcfirst($className));
                $messageClassConstructParam->setType(\sprintf('%s\%s', $fieldNamespace->getName(), $class->getName()));
                $messageClassConstructParam->setPublic();

                $classAlias = $class->getName();
                foreach ($messageNamespace->getUses() as $alias => $use) {
                    if ($use === \sprintf('%s\%s', $fieldNamespace->getName(), $class->getName())) {
                        $classAlias = $alias;

                        break;
                    }
                }

                $createMethod->addBody(<<<PHP
                    new {$classAlias}(),
                PHP);
            }

            $createMethod->addBody(');');

            $messageClassGetIteratorMethod = $messageClass->addMethod('getFields');
            $messageClassGetIteratorMethod->addBody(<<<'PHP'
                /** @var FieldInterface[] $properties */
                $properties = get_object_vars($this);

                foreach ($properties as $field) {
                    yield $field->getDefinitionNumber() => $field;
                }
                PHP);

            $messageClassGetIteratorMethod->setReturnType('iterable');
            $messageNamespace->addUse(FieldInterface::class);
            $messageClassGetIteratorMethod->addComment('@return FieldInterface[]');

            file_put_contents(\sprintf('src/Messages/Profile/Generated/%s.php', $messageName), $nettePrinter->printFile($messageFile));

            $messageNamespace->removeClass($messageName);
            foreach ($messageNamespace->getUses() as $use) {
                $messageNamespace->removeUse($use);
            }

            $messageClasses[$message['num']] = ['class' => $messageClass->getName(), 'namespace' => $messageNamespace->getName()];
        }

        if([] === $messageClasses){
            throw new \RuntimeException('No message classes found');
        }

        $profileMessagesRegistryFile = new PhpFile();

        $profileMessagesRegistryFile->setStrictTypes();
        $profileMessagesRegistryFile->addComment('Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.');
        $profileMessagesRegistryFile->addNamespace($messageNamespace);

        $profileMessagesRegistryClass = new ClassType('ProfileMessagesRegistry');

        $messageNamespace->add($profileMessagesRegistryClass);
        $messageNamespace->addUse(MessageInterface::class);

        $profileMessagesRegistryClass->setFinal();

        $profileMessagesRegistryClassConstructor = $profileMessagesRegistryClass->addMethod('__construct');
        $profileMessagesRegistryClassMessagesProperty = $profileMessagesRegistryClass->addProperty('messages');
        $profileMessagesRegistryClassMessagesProperty->setPrivate();
        $profileMessagesRegistryClassMessagesProperty->setType('array');
        $profileMessagesRegistryClassMessagesProperty->addComment('@var class-string[]');

        $profileMessagesRegistryClassGetMessagesMethod = $profileMessagesRegistryClass->addMethod('getMessages');
        $profileMessagesRegistryClassGetMessagesMethod->setBody('return $this->messages;');
        $profileMessagesRegistryClassGetMessagesMethod->setComment('@return class-string[]');
        $profileMessagesRegistryClassGetMessagesMethod->setReturnType('array');

        ksort($messageClasses);

        foreach ($messageClasses as $messageNum => $messageClass) {
            $profileMessagesRegistryClassConstructor->addBody(\sprintf('$this->messages[%d] = %s::class;', $messageNum, $messageClass['class']));
        }

        file_put_contents('src/Messages/Profile/Generated/ProfileMessagesRegistry.php', $nettePrinter->printFile($profileMessagesRegistryFile));
    }
}
