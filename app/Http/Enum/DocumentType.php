<?php

namespace App\Http\Enum;

enum DocumentType : string
{
    case CONFIRMATION = 'confirmation';
    case DELIVERY = 'delivery';
    case INVOINCE = 'invoice';
}
