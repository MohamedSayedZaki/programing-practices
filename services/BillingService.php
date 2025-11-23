<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\User;

class BillingService
{
    public function createBill(User $user, string $description, float $amount): void
    {
        $bill = new Bill;
        $bill->user_id = $user->id;
        $bill->amount = $amount;
        $bill->description = $description;
        $bill->save();
    }
}
