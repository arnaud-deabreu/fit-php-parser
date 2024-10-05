<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\DeviceAuxBatteryInfo\BatteryIdentifier;
use FitParser\Records\Generated\DeviceAuxBatteryInfo\BatteryStatus;
use FitParser\Records\Generated\DeviceAuxBatteryInfo\BatteryVoltage;
use FitParser\Records\Generated\DeviceAuxBatteryInfo\DeviceIndex;
use FitParser\Records\Generated\DeviceAuxBatteryInfo\Timestamp;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class DeviceAuxBatteryInfo implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            DeviceIndex::class,
            BatteryVoltage::class,
            BatteryStatus::class,
            BatteryIdentifier::class,
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
