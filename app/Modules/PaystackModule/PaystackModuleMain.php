<?php

namespace App\Modules\PaystackModule;

use App\Common\Helpers\ResponseHelper;
use App\Modules\PaystackModule\Handlers\BaseHandler;
use App\Modules\PaystackModule\Services\PaystackService;
use GuzzleHttp\Psr7\Request;

class PaystackModuleMain
{
    public BaseHandler $baseHandler;
    public PaystackService $paystackService;

    public function __construct(
        BaseHandler $baseHandler,
    ) {
        $this->baseHandler = $baseHandler;
        $this->paystackService = PaystackService::getInstance();
    }
    public function handleWebhook(Request $request)
    {
        return $this->baseHandler->handle($request);
    }

    public function generatePaymentLink()
    {
        try {
            $email = auth()->user()->email;
            $amount = request()->get('amount') * 100;

            if (is_null($email) || is_null($amount)) {
                throw new \InvalidArgumentException('Amount and description are required.');
            }

            return ResponseHelper::success($this->paystackService->generatePaymentLink($email, $amount));
        } catch (\Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }
}
