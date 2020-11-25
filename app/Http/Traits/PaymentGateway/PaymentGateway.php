<?php

namespace App\Http\Traits\PaymentGateway;

use App\Models\TransactionManagement\Transaction;

class PaymentType
{
    const CURRENT = 0;
    const SAVING = 1;
    const VITCOIN = 2;
}

// Semi-Finish, roughly oo design
class PaymentGateway
{
    public static function createTransaction(Payment $type, float $amount, string $header)
    {
        if ($type::isSufficientBalance($amount)) {
            $balance = $type::expense($amount);
            $transaction = Transaction::create([
                'header'    =>  $header,
                'amount'    =>  $amount,
                'balance'   =>  $balance,
                'currency'  =>  (string)$type   // Not finish
            ]);
            return ['stateCode' => 0, 'transaction' => $transaction];
        } else {
            return ['stateCode' => 1, 'message' => 'Insufficient Balance'];
        }
    }
}
