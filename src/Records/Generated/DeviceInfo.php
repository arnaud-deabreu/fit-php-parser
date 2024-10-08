<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\DeviceInfo\AntDeviceNumber;
use FitParser\Records\Generated\DeviceInfo\AntNetwork;
use FitParser\Records\Generated\DeviceInfo\AntTransmissionType;
use FitParser\Records\Generated\DeviceInfo\BatteryLevel;
use FitParser\Records\Generated\DeviceInfo\BatteryStatus;
use FitParser\Records\Generated\DeviceInfo\BatteryVoltage;
use FitParser\Records\Generated\DeviceInfo\CumOperatingTime;
use FitParser\Records\Generated\DeviceInfo\Descriptor;
use FitParser\Records\Generated\DeviceInfo\DeviceIndex;
use FitParser\Records\Generated\DeviceInfo\DeviceType;
use FitParser\Records\Generated\DeviceInfo\HardwareVersion;
use FitParser\Records\Generated\DeviceInfo\Manufacturer;
use FitParser\Records\Generated\DeviceInfo\Product;
use FitParser\Records\Generated\DeviceInfo\ProductName;
use FitParser\Records\Generated\DeviceInfo\SensorPosition;
use FitParser\Records\Generated\DeviceInfo\SerialNumber;
use FitParser\Records\Generated\DeviceInfo\SoftwareVersion;
use FitParser\Records\Generated\DeviceInfo\SourceType;
use FitParser\Records\Generated\DeviceInfo\Timestamp;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class DeviceInfo implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            DeviceIndex::class,
            DeviceType::class,
            Manufacturer::class,
            SerialNumber::class,
            Product::class,
            SoftwareVersion::class,
            HardwareVersion::class,
            CumOperatingTime::class,
            BatteryVoltage::class,
            BatteryStatus::class,
            SensorPosition::class,
            Descriptor::class,
            AntTransmissionType::class,
            AntDeviceNumber::class,
            AntNetwork::class,
            SourceType::class,
            ProductName::class,
            BatteryLevel::class,
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
