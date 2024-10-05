<?php

namespace App\Enums;

use ArchTech\Enums\Values;

enum AgeRating: int
{
    use Values;

    case AR0 = 0;
    case AR6 = 6;
    case AR12 = 12;
    case AR16 = 16;
    case AR18 = 18;
}
