<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum CategoryEnum: string
{
    use InteractWithEnum;

    case LIBRO = 'libro';
    case GIOELLO = 'gioiello';
    case ALTRO = 'altro';
}
