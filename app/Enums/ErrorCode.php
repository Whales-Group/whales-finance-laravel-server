<?php

namespace App\Enums;

enum ErrorCode: int
{
    case INVALID_TRANSFER_TYPE = 1001;
    case ACCOUNT_NOT_FOUND = 1002;
    case INVALID_SERVICE_PROVIDER = 1003;
    case VALIDATION_CODE_FAILED = 1004;
    case GENERAL_ERROR = 9999;

    /**
     * Get the error message associated with the code.
     *
     * @return string
     */
    public function message(): string
    {
        return match ($this) {
            self::INVALID_TRANSFER_TYPE => 'Invalid transfer type provided.',
            self::ACCOUNT_NOT_FOUND => 'Account not found.',
            self::INVALID_SERVICE_PROVIDER => 'Invalid service provider.',
            self::VALIDATION_CODE_FAILED => 'Failed to generate validation code.',
            self::GENERAL_ERROR => 'An unexpected error occurred.',
        };
    }

    /**
     * Get the error code value.
     *
     * @return int
     */
    public function code(): int
    {
        return $this->value;
    }
}