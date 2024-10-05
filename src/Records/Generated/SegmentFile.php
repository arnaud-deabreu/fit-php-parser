<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\SegmentFile\DefaultRaceLeader;
use FitParser\Records\Generated\SegmentFile\Enabled;
use FitParser\Records\Generated\SegmentFile\FileUuid;
use FitParser\Records\Generated\SegmentFile\LeaderActivityId;
use FitParser\Records\Generated\SegmentFile\LeaderActivityIdString;
use FitParser\Records\Generated\SegmentFile\LeaderGroupPrimaryKey;
use FitParser\Records\Generated\SegmentFile\LeaderType;
use FitParser\Records\Generated\SegmentFile\MessageIndex;
use FitParser\Records\Generated\SegmentFile\UserProfilePrimaryKey;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class SegmentFile implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            FileUuid::class,
            Enabled::class,
            UserProfilePrimaryKey::class,
            LeaderType::class,
            LeaderGroupPrimaryKey::class,
            LeaderActivityId::class,
            LeaderActivityIdString::class,
            DefaultRaceLeader::class,
            UnknownValue::class,
        ], true)) {
            throw new \InvalidArgumentException(
                \sprintf('%s is not an expected value for this record.', $value::class)
            );
        }

        $this->values[] = $value;
    }

    /**
     * @return ValueInterface[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
