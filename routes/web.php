<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [authController::class, 'login']);
Route::post('/login', [authController::class, 'postAdminLogin'])->name('login');
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('/logout', [authController::class, 'logout'])->name('logout');
    //Branch views
    Route::get('/add_transfer', [BranchController::class, 'addTransferUI'])->name('add_transfer');

    Route::get('/dashboard', [BranchController::class, 'dashboard'])->name('/dashboard');
    Route::post('/post_transfer', [BranchController::class, 'post_transfer'])->name('post_transfer');
    Route::get('/transfer_details/{id}', [BranchController::class, 'transfer_details'])->name('transfer_details');
    Route::post('/update_transfer', [BranchController::class, 'update_transfer'])->name('update_transfer');


    Route::get('/transfer_list', [BranchController::class, 'transferListUI'])->name('transfer_list');
    Route::get('/branch_transaction', [BranchController::class, 'branchTransactionUI'])->name('branch_transaction');
    Route::get('/fullfill_transfer', [BranchController::class, 'fullfillTransferUI'])->name('fullfill_transfer');

    // Income
    Route::get('/add_income', [IncomeController::class, 'addIncomeUI'])->name('add_income');
    Route::Post('/post_income', [IncomeController::class, 'postIncome'])->name('post_income');

    //Expense
    Route::get('/add_expense', [ExpenseController::class, 'addExpense'])->name('add_expense');
    Route::post('/post_expense', [ExpenseController::class, 'postExpense'])->name('post_expense');
    Route::get('/profile', [BranchController::class, 'profile'])->name('profile');
    Route::post('/update_profile', [BranchController::class, 'update_profile'])->name('update_profile');


});