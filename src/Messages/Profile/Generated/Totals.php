<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Totals\ActiveTime;
use FitParser\Messages\Profile\Generated\Totals\Calories;
use FitParser\Messages\Profile\Generated\Totals\Distance;
use FitParser\Messages\Profile\Generated\Totals\ElapsedTime;
use FitParser\Messages\Profile\Generated\Totals\MessageIndex;
use FitParser\Messages\Profile\Generated\Totals\Sessions;
use FitParser\Messages\Profile\Generated\Totals\Sport;
use FitParser\Messages\Profile\Generated\Totals\SportIndex;
use FitParser\Messages\Profile\Generated\Totals\TimerTime;
use FitParser\Messages\Profile\Generated\Totals\Timestamp;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Totals implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Timestamp $timestamp,
        public TimerTime $timerTime,
        public Distance $distance,
        public Calories $calories,
        public Sport $sport,
        public ElapsedTime $elapsedTime,
        public Sessions $sessions,
        public ActiveTime $activeTime,
        public SportIndex $sportIndex,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Timestamp(),
            new TimerTime(),
            new Distance(),
            new Calories(),
            new Sport(),
            new ElapsedTime(),
            new Sessions(),
            new ActiveTime(),
            new SportIndex(),
        );
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields(): iterable
    {
        /** @var FieldInterface[] $properties */
        $properties = get_object_vars($this);

        foreach ($properties as $field) {
            yield $field->getDefinitionNumber() => $field;
        }
    }
}
