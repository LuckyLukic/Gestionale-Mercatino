<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum RoleEnum: string {
    use InteractWithEnum;

    case USER = 'user';
    case ADMIN = 'admin';
    case SUPERADMIN = 'superadmin';
}
