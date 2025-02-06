<?php

namespace App\Listeners;

use App\Events\TransactionMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogTransaction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransactionMade  $event
     * @return void
     */
    public function handle(TransactionMade $event)
    {
        $transaction = $event->transaction;

        Log::info('Transaction Made:', [
            'type' => $transaction->type,
            'amount' => $transaction->amount,
            'user_id' => $transaction->user_id,
        ]);
    }
}
