<?php

namespace App\Http\Controllers;

use App\Modules\AccountModule\AccountModuleMain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected AccountModuleMain $accountModuleMain;


    public function __construct(AccountModuleMain $accountModuleMain)
    {
        $this->accountModuleMain = $accountModuleMain;
    }


    public function getAccounts()
    {
        return $this->accountModuleMain->getAccounts();
    }

    public function getAccountDetails(Request $request)
    {
        return $this->accountModuleMain->getAccountDetails($request);
    }

    public function updateAccount(Request $request)
    {
        return $this->accountModuleMain->toggleEnabled($request);
    }

    public function updateIn(Request $request)
    {
        return $this->accountModuleMain->updateIn($request);
    }


    public function createAccount(Request $request)
    {
        return $this->accountModuleMain->createAccount($request);
    }


}