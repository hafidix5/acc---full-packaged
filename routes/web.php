<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\CriteriasController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CoasController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\ExpendituresController;
use App\Http\Controllers\GeneralLedgersController;
use App\Http\Controllers\InvoicesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'vendors',
], function () {
    Route::get('/', [VendorsController::class, 'index'])
         ->name('vendors.vendors.index');
    Route::get('/create', [VendorsController::class, 'create'])
         ->name('vendors.vendors.create');
    Route::get('/show/{vendors}',[VendorsController::class, 'show'])
         ->name('vendors.vendors.show');
    Route::get('/{vendors}/edit',[VendorsController::class, 'edit'])
         ->name('vendors.vendors.edit');
    Route::post('/', [VendorsController::class, 'store'])
         ->name('vendors.vendors.store');
    Route::put('vendors/{vendors}', [VendorsController::class, 'update'])
         ->name('vendors.vendors.update');
    Route::delete('/vendors/{vendors}',[VendorsController::class, 'destroy'])
         ->name('vendors.vendors.destroy');
});

Route::group([
    'prefix' => 'departments',
], function () {
    Route::get('/', [DepartmentsController::class, 'index'])
         ->name('departments.departments.index');
    Route::get('/create', [DepartmentsController::class, 'create'])
         ->name('departments.departments.create');
    Route::get('/show/{departments}',[DepartmentsController::class, 'show'])
         ->name('departments.departments.show');
    Route::get('/{departments}/edit',[DepartmentsController::class, 'edit'])
         ->name('departments.departments.edit');
    Route::post('/', [DepartmentsController::class, 'store'])
         ->name('departments.departments.store');
    Route::put('departments/{departments}', [DepartmentsController::class, 'update'])
         ->name('departments.departments.update');
    Route::delete('/departments/{departments}',[DepartmentsController::class, 'destroy'])
         ->name('departments.departments.destroy');
});

Route::group([
    'prefix' => 'criterias',
], function () {
    Route::get('/', [CriteriasController::class, 'index'])
         ->name('criterias.criterias.index');
    Route::get('/create', [CriteriasController::class, 'create'])
         ->name('criterias.criterias.create');
    Route::get('/show/{criterias}',[CriteriasController::class, 'show'])
         ->name('criterias.criterias.show');
    Route::get('/{criterias}/edit',[CriteriasController::class, 'edit'])
         ->name('criterias.criterias.edit');
    Route::post('/', [CriteriasController::class, 'store'])
         ->name('criterias.criterias.store');
    Route::put('criterias/{criterias}', [CriteriasController::class, 'update'])
         ->name('criterias.criterias.update');
    Route::delete('/criterias/{criterias}',[CriteriasController::class, 'destroy'])
         ->name('criterias.criterias.destroy');
});

Route::group([
    'prefix' => 'subjects',
], function () {
    Route::get('/', [SubjectsController::class, 'index'])
         ->name('subjects.subjects.index');
    Route::get('/create', [SubjectsController::class, 'create'])
         ->name('subjects.subjects.create');
    Route::get('/show/{subjects}',[SubjectsController::class, 'show'])
         ->name('subjects.subjects.show');
    Route::get('/{subjects}/edit',[SubjectsController::class, 'edit'])
         ->name('subjects.subjects.edit');
    Route::post('/', [SubjectsController::class, 'store'])
         ->name('subjects.subjects.store');
    Route::put('subjects/{subjects}', [SubjectsController::class, 'update'])
         ->name('subjects.subjects.update');
    Route::delete('/subjects/{subjects}',[SubjectsController::class, 'destroy'])
         ->name('subjects.subjects.destroy');
});

Route::group([
    'prefix' => 'coas',
], function () {
    Route::get('/', [CoasController::class, 'index'])
         ->name('coas.coas.index');
    Route::get('/create', [CoasController::class, 'create'])
         ->name('coas.coas.create');
    Route::get('/show/{coas}',[CoasController::class, 'show'])
         ->name('coas.coas.show');
    Route::get('/{coas}/edit',[CoasController::class, 'edit'])
         ->name('coas.coas.edit');
    Route::post('/', [CoasController::class, 'store'])
         ->name('coas.coas.store');
    Route::put('coas/{coas}', [CoasController::class, 'update'])
         ->name('coas.coas.update');
    Route::delete('/coas/{coas}',[CoasController::class, 'destroy'])
         ->name('coas.coas.destroy');
});

Route::group([
    'prefix' => 'products',
], function () {
    Route::get('/', [ProductsController::class, 'index'])
         ->name('products.products.index');
    Route::get('/create', [ProductsController::class, 'create'])
         ->name('products.products.create');
    Route::get('/show/{products}',[ProductsController::class, 'show'])
         ->name('products.products.show');
    Route::get('/{products}/edit',[ProductsController::class, 'edit'])
         ->name('products.products.edit');
    Route::post('/', [ProductsController::class, 'store'])
         ->name('products.products.store');
    Route::put('products/{products}', [ProductsController::class, 'update'])
         ->name('products.products.update');
    Route::delete('/products/{products}',[ProductsController::class, 'destroy'])
         ->name('products.products.destroy');
});

Route::group([
    'prefix' => 'units',
], function () {
    Route::get('/', [UnitsController::class, 'index'])
         ->name('units.units.index');
    Route::get('/create', [UnitsController::class, 'create'])
         ->name('units.units.create');
    Route::get('/show/{units}',[UnitsController::class, 'show'])
         ->name('units.units.show');
    Route::get('/{units}/edit',[UnitsController::class, 'edit'])
         ->name('units.units.edit');
    Route::post('/', [UnitsController::class, 'store'])
         ->name('units.units.store');
    Route::put('units/{units}', [UnitsController::class, 'update'])
         ->name('units.units.update');
    Route::delete('/units/{units}',[UnitsController::class, 'destroy'])
         ->name('units.units.destroy');
});

Route::group([
    'prefix' => 'expenditures',
], function () {
    Route::get('/', [ExpendituresController::class, 'index'])
         ->name('expenditures.expenditures.index');
    Route::get('/create', [ExpendituresController::class, 'create'])
         ->name('expenditures.expenditures.create');
    Route::get('/show/{expenditures}',[ExpendituresController::class, 'show'])
         ->name('expenditures.expenditures.show');
    Route::get('/{expenditures}/edit',[ExpendituresController::class, 'edit'])
         ->name('expenditures.expenditures.edit');
    Route::post('/', [ExpendituresController::class, 'store'])
         ->name('expenditures.expenditures.store');
    Route::put('expenditures/{expenditures}', [ExpendituresController::class, 'update'])
         ->name('expenditures.expenditures.update');
    Route::delete('/expenditures/{expenditures}',[ExpendituresController::class, 'destroy'])
         ->name('expenditures.expenditures.destroy');
});

Route::group([
    'prefix' => 'general_ledgers',
], function () {
    Route::get('/', [GeneralLedgersController::class, 'index'])
         ->name('general_ledgers.general_ledgers.index');
    Route::get('/create', [GeneralLedgersController::class, 'create'])
         ->name('general_ledgers.general_ledgers.create');
    Route::get('/show/{generalLedgers}',[GeneralLedgersController::class, 'show'])
         ->name('general_ledgers.general_ledgers.show');
    Route::get('/{generalLedgers}/edit',[GeneralLedgersController::class, 'edit'])
         ->name('general_ledgers.general_ledgers.edit');
    Route::post('/', [GeneralLedgersController::class, 'store'])
         ->name('general_ledgers.general_ledgers.store');
    Route::put('general_ledgers/{generalLedgers}', [GeneralLedgersController::class, 'update'])
         ->name('general_ledgers.general_ledgers.update');
    Route::delete('/general_ledgers/{generalLedgers}',[GeneralLedgersController::class, 'destroy'])
         ->name('general_ledgers.general_ledgers.destroy');
});

Route::group([
    'prefix' => 'invoices',
], function () {
    Route::get('/', [InvoicesController::class, 'index'])
         ->name('invoices.invoices.index');
    Route::get('/create', [InvoicesController::class, 'create'])
         ->name('invoices.invoices.create');
    Route::get('/show/{invoices}',[InvoicesController::class, 'show'])
         ->name('invoices.invoices.show');
    Route::get('/{invoices}/edit',[InvoicesController::class, 'edit'])
         ->name('invoices.invoices.edit');
    Route::post('/', [InvoicesController::class, 'store'])
         ->name('invoices.invoices.store');
    Route::put('invoices/{invoices}', [InvoicesController::class, 'update'])
         ->name('invoices.invoices.update');
    Route::delete('/invoices/{invoices}',[InvoicesController::class, 'destroy'])
         ->name('invoices.invoices.destroy');
});
