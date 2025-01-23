<?php

use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Balance Inquiry Route
Route::get('/balance', function () {
    return view('balance');
});

// Deposit Route
Route::post('/deposit', function () {
    // Process the deposit request here (e.g., validate data, update database)
    // ...

    // Redirect to a success page or display a success message
    return redirect('/deposit-success')->with('success', 'Deposit successful!');
});

// Withdraw Route
Route::post('/withdraw', function () {
    // Process the withdrawal request here (e.g., validate data, update database)
    // ...

    // Redirect to a success page or display a success message
    return redirect('/withdraw-success')->with('success', 'Withdrawal successful!');
});

// Transaction History Route
Route::get('/transactions', function () {
    return view('transactions');
});
