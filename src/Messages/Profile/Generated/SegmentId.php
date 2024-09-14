<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\SegmentId\DefaultRaceLeader;
use FitParser\Messages\Profile\Generated\SegmentId\DeleteStatus;
use FitParser\Messages\Profile\Generated\SegmentId\DeviceId;
use FitParser\Messages\Profile\Generated\SegmentId\Enabled;
use FitParser\Messages\Profile\Generated\SegmentId\Name;
use FitParser\Messages\Profile\Generated\SegmentId\SelectionType;
use FitParser\Messages\Profile\Generated\SegmentId\Sport;
use FitParser\Messages\Profile\Generated\SegmentId\UserProfilePrimaryKey;
use FitParser\Messages\Profile\Generated\SegmentId\Uuid;
use FitParser\Messages\Profile\MessageInterface;

final readonly class SegmentId implements MessageInterface
{
    private function __construct(
        public Name $name,
        public Uuid $uuid,
        public Sport $sport,
        public Enabled $enabled,
        public UserProfilePrimaryKey $userProfilePrimaryKey,
        public DeviceId $deviceId,
        public DefaultRaceLeader $defaultRaceLeader,
        public DeleteStatus $deleteStatus,
        public SelectionType $selectionType,
    ) {}

    public static function create(): self
    {
        return new self(
            new Name(),
            new Uuid(),
            new Sport(),
            new Enabled(),
            new UserProfilePrimaryKey(),
            new DeviceId(),
            new DefaultRaceLeader(),
            new DeleteStatus(),
            new SelectionType(),
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
