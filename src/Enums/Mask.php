<?php

declare(strict_types=1);

namespace FitParser\Enums;

enum Mask: int
{
    case DEV_MESG_MASK = 0x20;
    case LOCAL_MESG_NUM_MASK = 0x0F;
}
