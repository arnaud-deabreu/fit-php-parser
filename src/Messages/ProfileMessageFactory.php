<?php

declare(strict_types=1);

namespace FitParser\Messages;

use FitParser\Messages\Profile\Message;

final readonly class ProfileMessageFactory
{
    /**
     * @return Message[]
     */
    public static function fromJsonFile(): array
    {
        $file = \dirname(__DIR__, 2).'/data/messages.json';
        $contentMessages = file_get_contents($file);

        if (false === $contentMessages) {
            throw new \RuntimeException('Unable to read messages.json file');
        }

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
         *  }> $assocMessageProfiles
         */
        $assocMessageProfiles = json_decode($contentMessages, true);

        $messages = [];
        foreach ($assocMessageProfiles as $assocMessageProfile) {
            $messageProfile = Message::fromArray($assocMessageProfile);
            $messages[$messageProfile->num] = $messageProfile;
        }

        return $messages;
    }
}
