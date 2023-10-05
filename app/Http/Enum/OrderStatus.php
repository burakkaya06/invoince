<?php

namespace App\Http\Enum;

enum OrderStatus: string {
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
