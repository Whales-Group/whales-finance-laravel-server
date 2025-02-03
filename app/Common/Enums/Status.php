<?php

namespace App\Common\Enums;

enum Status: string
{
    case PENDING = 'Pending';
    case REJECTED = 'Rejected';
    case FAILED = 'Failed';
    case VERIFIED = 'Verified';
    case NONE = 'None';
}