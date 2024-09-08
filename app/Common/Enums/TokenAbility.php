<?php

namespace App\Common\Enums;

enum TokenAbility: string
{
    case ISSUE_ACCESS_TOKEN = "issue-access-token";
    case ACCESS_API = "access-api";
    case ADMIN_ACCESS_API = "admin-access-api";
}