<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    public function getBalance(Request $request)
    {
        $user = $request->user();

        $totalDeposits = $user->transactions()
            ->where('type', 'deposit')
            ->sum('amount');

        $totalWithdrawals = $user->transactions()
            ->where('type', 'withdraw')
            ->sum('amount');

        $balance = $totalDeposits - $totalWithdrawals;

        return response()->json([
            'balance' => $balance,
        ]);
    }

    public function deposit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
        $user->transactions()->create([
            'type' => 'deposit',
            'amount' => $request->amount,
        ]);

        return response()->json(['message' => 'Deposit successful']);
    }

    public function withdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = $request->user();
        $currentBalance = $this->getBalance($request)->getData()->balance;

        if ($request->amount > $currentBalance) {
            return response()->json(['error' => 'Insufficient funds'], 422);
        }

        $user->transactions()->create([
            'type' => 'withdraw',
            'amount' => $request->amount,
        ]);

        return response()->json(['message' => 'Withdrawal successful']);
    }

    public function getTransactions(Request $request)
    {
        $user = $request->user();
        $transactions = $user->transactions()->orderByDesc('created_at')->get();

        return response()->json(['transactions' => $transactions]);
    }
}
