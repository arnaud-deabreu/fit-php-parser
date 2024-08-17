<?php

declare(strict_types=1);

namespace FitParser\Enums;

enum MaskEnum: int
{
    case DEV_DATA_MASK = 0x20;
    case LOCAL_MESG_NUM_MASK = 0x0F;
}
