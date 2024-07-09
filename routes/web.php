<?php

use App\Http\Controllers\budgetController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//HOME
Route::get('privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('help', [HomeController::class, 'help'])->name('help');
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

//TRANSACTIONS
Route::get('/transactions', [HomeController::class, 'transactions'])->name('transactions')->middleware('auth');
//Route::get('/transactions', [HomeController::class, 'allTransactions'])->name('all-transactions')->middleware('auth');
Route::get('/transactions/{slug}', [HomeController::class, 'withCategory'])->name('transactions.category')->middleware
('auth');

//REPORTS
Route::get('/reports', [HomeController::class, 'report'])->name('reports')->middleware('auth');

//USER REGISTER
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
Route::patch('user/update/{id}', [RegisterController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('newPassword', [RegisterController::class, 'newPassword'])->name('newPassword')->middleware('auth');
Route::patch('password/update/{id}', [RegisterController::class, 'updatePassword'])->name('password.update')->middleware
('auth');
Route::delete('delete/{id}', [RegisterController::class, 'destroy'])->name('user.delete')->middleware('auth');

//SESSIONS
Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('login.store')->middleware('guest');
Route::get('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');

//CATEGORY
Route::get('category', [CategoryController::class, 'index'])->name('category.index')->middleware('auth');
Route::post('category', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('auth');
Route::get('category', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');

//EXPENSE
Route::get('expense', [ExpenseController::class, 'create'])->name('expense.create')->middleware('auth');
Route::post('expense', [expenseController::class, 'store'])->name('expense.store')->middleware('auth');
Route::get('expense/edit/{id}', [expenseController::class, 'edit'])->name('expense.edit')->middleware('auth');
Route::post('expense/update/{id}', [expenseController::class, 'update'])->name('expense.update')->middleware('auth');
Route::get('expense/delete/{id}', [expenseController::class, 'destroy'])->name('expense.destroy')->middleware('auth');

//BUDGET
Route::post('budget', [budgetController::class, 'store'])->name('budget.store')->middleware('auth');
Route::get('budget', [budgetController::class, 'show'])->name('budget.show')->middleware('auth');
Route::get('budget/edit/{id}', [budgetController::class, 'edit'])->name('budget.edit')->middleware('auth');
Route::get('budget', [budgetController::class, 'create'])->name('budget.create')->middleware('auth');

//PROFILE
Route::get('profile', [profileController::class, 'index'])->name('profile.index')->middleware('auth');
