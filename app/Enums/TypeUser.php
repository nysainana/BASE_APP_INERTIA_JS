<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;

enum TypeUser: string
{
    use InteractWithEnum;

    case ADMINISTRATEUR = 'ADMINISTRATEUR';
}
