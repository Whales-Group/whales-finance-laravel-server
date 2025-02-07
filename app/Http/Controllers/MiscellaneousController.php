<?php

namespace App\Http\Controllers;

use App\Modules\FincraModule\FincraModuleMain;
use App\Modules\PaystackModule\PaystackModuleMain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{

    public PaystackModuleMain $moduleMain;
    public PaystackModuleMain $fincraModuleMain;

    public function __construct(
        PaystackModuleMain $moduleMain,
        FincraModuleMain $fincraModuleMain
    ) {
        $this->moduleMain = $moduleMain;
        $this->fincraModule = $fincraModuleMain;
    }

    public function handlePaystackWebhook(Request $request): ?JsonResponse
    {
        return $this->moduleMain->handleWebhook($request);
    }

    public function handleFincraWebhook(Request $request): ?JsonResponse
    {
        return $this->fincraModuleMain->handleWebhook($request);
    }
}
