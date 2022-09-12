<?php

use App\Http\Controllers\backend\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\SupplierController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\SalaryController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PurchaseController;
use App\Http\Controllers\backend\StockController;
// frontend
use App\Http\Controllers\frontend\EshopController;

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

Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // logout
    //Logout
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');

    // purchase
    Route::get('create/purchase', [PurchaseController::class, 'create'])->name('create.purchase');
    Route::get('detail/purchase', [PurchaseController::class, 'detail'])->name('detail.purchase');
    Route::post('addcart/purchase', [PurchaseController::class, 'addCart'])->name('addCart/purchase');
    Route::post('cart/update2{rowId}', [PurchaseController::class, 'cartUpdate2'])->name('cart.update2');
    Route::get('cart/delete{rowId}', [PurchaseController::class, 'destroy'])->name('cart.delete');
    Route::post('invoice/purchase', [PurchaseController::class, 'invoicePurchase'])->name('invoice.purchase');
    Route::post('store/purchase', [PurchaseController::class, 'storePurchase'])->name('store.purchase');
    Route::get('purchase.history{id}', [PurchaseController::class, 'purchaseHistory'])->name('purchase.history');
    Route::get('dailyPurchases', [PurchaseController::class, 'dailyPurchases'])->name('dailyPurchases');
    //product
    Route::get('create/product', [ProductController::class, 'create'])->name('create.product');
    Route::post('store/product', [ProductController::class, 'store'])->name('store.product');
    Route::get('index/product',  [ProductController::class, 'index'])->name('index.product');
    Route::get('view/product{id}', [ProductController::class, 'view'])->name('view.product');
    Route::post('delete/product', [ProductController::class, 'destroy'])->name('delete.product');
    Route::get('edit/product{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('update/product{id}', [ProductController::class, 'update'])->name('update.product');
    Route::post('update/product{id}', [ProductController::class, 'update'])->name('update.product');

    // catagories
    Route::get('create/category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('store/category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('index/category', [CategoryController::class, 'index'])->name('index.category');
    Route::post('delete/category', [CategoryController::class, 'destroy'])->name('delete.category');

    // supplier 
    Route::get('create/supplier', [SupplierController::class, 'create'])->name('create.supplier');
    Route::post('store/supplier', [SupplierController::class, 'store'])->name('store.supplier');
    Route::get('index/supplier',  [SupplierController::class, 'index'])->name('index.supplier');
    Route::get('view/supplier{id}', [SupplierController::class, 'view'])->name('view.supplier');
    Route::post('delete/supplier', [SupplierController::class, 'destroy'])->name('delete.supplier');
    Route::get('edit/supplier{id}', [SupplierController::class, 'edit'])->name('edit.supplier');
    Route::post('update/supplier{id}', [SupplierController::class, 'update'])->name('update.supplier');

    // brand
    Route::get('create/brand', [BrandController::class, 'create'])->name('create.brand');
    Route::post('store/brand', [BrandController::class, 'store'])->name('store.brand');
    Route::get('index/brand', [BrandController::class, 'index'])->name('index.brand');
    Route::post('delete/Brand', [BrandController::class, 'destroy'])->name('delete.brand');


    // employee
    Route::get('create/employee', [EmployeeController::class, 'create'])->name('create.employee');
    Route::post('store/employee', [EmployeeController::class, 'store'])->name('store.employee');
    Route::get('index/employee',  [EmployeeController::class, 'index'])->name('index.employee');
    Route::get('view/employee{id}', [EmployeeController::class, 'view'])->name('view.employee');
    Route::post('delete/employee', [EmployeeController::class, 'destroy'])->name('delete.employee');
    Route::get('edit/employee{id}', [EmployeeController::class, 'edit'])->name('edit.employee');
    Route::post('update/employee{id}', [EmployeeController::class, 'update'])->name('update.employee');

    // Salary
    Route::get('pay/salary', [SalaryController::class, 'paySalary'])->name('pay.salary');
    Route::post('pay/salarySuccess', [SalaryController::class, 'paySalarySuccess'])->name('pay.salarySuccess');
    Route::get('lastmonth/salary', [SalaryController::class, 'lastmonthSalary'])->name('lastmonth.salary');

    // Expense 
    Route::get('create/expense', [ExpenseController::class, 'create'])->name('create.expense');
    Route::post('store/expense', [ExpenseController::class, 'store'])->name('store.expense');
    Route::get('daily/expense',  [ExpenseController::class, 'daily'])->name('daily.expense');
    Route::get('dailyEdit/expense{id}',  [ExpenseController::class, 'dailyEdit'])->name('dailyEdit.expense');
    Route::post('update.dailyexpense{id}', [ExpenseController::class, 'dailyUpdate'])->name('update.dailyexpense');
    Route::post('delete/dailyEx', [ExpenseController::class, 'destroyDaily'])->name('delete.dailyEx');
    Route::get('monthly/expense',  [ExpenseController::class, 'monthly'])->name('monthly.expense');
    Route::get('yearly/expense',  [ExpenseController::class, 'yearly'])->name('yearly.expense');
    Route::get('dailyExpensiveList',  [ExpenseController::class, 'dailyExpensiveList'])->name('dailyExpensiveList');
});




Route::group(['middleware' => 'guest'], function () {
    //Login
    Route::get('/', [LoginController::class, 'showlogin'])->name('/');
    Route::post('admin/login', [LoginController::class, 'loginprocess'])->name('login');


    // frontend 
    Route::get('/eshop', [EshopController::class, 'eshop']);
});