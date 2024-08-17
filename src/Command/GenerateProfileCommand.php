<?php

declare(strict_types=1);

namespace FitParser\Command;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

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

        // TODO: generate PHP classes with nette
        $types = $this->parseTypes($spreadsheet);
        file_put_contents('data/types.json', json_encode($types));

        $io->success('Successfully generated types file.');

        $messages = $this->parseMessages($spreadsheet);
        file_put_contents('data/messages.json', json_encode($messages));

        $io->success('Successfully generated messages file.');

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
}
