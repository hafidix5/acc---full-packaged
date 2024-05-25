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
use App\Http\Controllers\HousingsController;
use App\Http\Controllers\HousingsEggsortedsController;
use App\Http\Controllers\HousingsGivefeedsController;
use App\Http\Controllers\HousingsGivetreatmentsController;
use App\Http\Controllers\HousingsHasrolesController;
use App\Http\Controllers\HousingsMaterialsController;
use App\Http\Controllers\HousingsMaterialtypesController;
use App\Http\Controllers\HousingsRolesController;
use App\Http\Controllers\HousingsSellsController;
use App\Http\Controllers\HousingsStockopnamesController;
use App\Http\Controllers\HousingsStoragesController;
use App\Http\Controllers\HousingsUnitsController;

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

Route::group([
    'prefix' => 'housings',
], function () {
    Route::get('/', [HousingsController::class, 'index'])
         ->name('housings.housing.index');
    Route::get('/create', [HousingsController::class, 'create'])
         ->name('housings.housing.create');
    Route::get('/show/{housing}',[HousingsController::class, 'show'])
         ->name('housings.housing.show');
    Route::get('/{housing}/edit',[HousingsController::class, 'edit'])
         ->name('housings.housing.edit');
    Route::post('/', [HousingsController::class, 'store'])
         ->name('housings.housing.store');
    Route::put('housing/{housing}', [HousingsController::class, 'update'])
         ->name('housings.housing.update');
    Route::delete('/housing/{housing}',[HousingsController::class, 'destroy'])
         ->name('housings.housing.destroy');
});

Route::group([
    'prefix' => 'housings',
], function () {
    Route::get('/', [HousingsController::class, 'index'])
         ->name('housings.housings.index');
    Route::get('/create', [HousingsController::class, 'create'])
         ->name('housings.housings.create');
    Route::get('/show/{housings}',[HousingsController::class, 'show'])
         ->name('housings.housings.show');
    Route::get('/{housings}/edit',[HousingsController::class, 'edit'])
         ->name('housings.housings.edit');
    Route::post('/', [HousingsController::class, 'store'])
         ->name('housings.housings.store');
    Route::put('housings/{housings}', [HousingsController::class, 'update'])
         ->name('housings.housings.update');
    Route::delete('/housings/{housings}',[HousingsController::class, 'destroy'])
         ->name('housings.housings.destroy');
});

Route::group([
    'prefix' => 'housings_eggsorteds',
], function () {
    Route::get('/', [HousingsEggsortedsController::class, 'index'])
         ->name('housings_eggsorteds.housings_eggsorteds.index');
    Route::get('/create', [HousingsEggsortedsController::class, 'create'])
         ->name('housings_eggsorteds.housings_eggsorteds.create');
    Route::get('/show/{housingsEggsorteds}',[HousingsEggsortedsController::class, 'show'])
         ->name('housings_eggsorteds.housings_eggsorteds.show');
    Route::get('/{housingsEggsorteds}/edit',[HousingsEggsortedsController::class, 'edit'])
         ->name('housings_eggsorteds.housings_eggsorteds.edit');
    Route::post('/', [HousingsEggsortedsController::class, 'store'])
         ->name('housings_eggsorteds.housings_eggsorteds.store');
    Route::put('housings_eggsorteds/{housingsEggsorteds}', [HousingsEggsortedsController::class, 'update'])
         ->name('housings_eggsorteds.housings_eggsorteds.update');
    Route::delete('/housings_eggsorteds/{housingsEggsorteds}',[HousingsEggsortedsController::class, 'destroy'])
         ->name('housings_eggsorteds.housings_eggsorteds.destroy');
});

Route::group([
    'prefix' => 'housings_givefeeds',
], function () {
    Route::get('/', [HousingsGivefeedsController::class, 'index'])
         ->name('housings_givefeeds.housings_givefeeds.index');
    Route::get('/create', [HousingsGivefeedsController::class, 'create'])
         ->name('housings_givefeeds.housings_givefeeds.create');
    Route::get('/show/{housingsGivefeeds}',[HousingsGivefeedsController::class, 'show'])
         ->name('housings_givefeeds.housings_givefeeds.show');
    Route::get('/{housingsGivefeeds}/edit',[HousingsGivefeedsController::class, 'edit'])
         ->name('housings_givefeeds.housings_givefeeds.edit');
    Route::post('/', [HousingsGivefeedsController::class, 'store'])
         ->name('housings_givefeeds.housings_givefeeds.store');
    Route::put('housings_givefeeds/{housingsGivefeeds}', [HousingsGivefeedsController::class, 'update'])
         ->name('housings_givefeeds.housings_givefeeds.update');
    Route::delete('/housings_givefeeds/{housingsGivefeeds}',[HousingsGivefeedsController::class, 'destroy'])
         ->name('housings_givefeeds.housings_givefeeds.destroy');
});

Route::group([
    'prefix' => 'housings_givetreatments',
], function () {
    Route::get('/', [HousingsGivetreatmentsController::class, 'index'])
         ->name('housings_givetreatments.housings_givetreatments.index');
    Route::get('/create', [HousingsGivetreatmentsController::class, 'create'])
         ->name('housings_givetreatments.housings_givetreatments.create');
    Route::get('/show/{housingsGivetreatments}',[HousingsGivetreatmentsController::class, 'show'])
         ->name('housings_givetreatments.housings_givetreatments.show');
    Route::get('/{housingsGivetreatments}/edit',[HousingsGivetreatmentsController::class, 'edit'])
         ->name('housings_givetreatments.housings_givetreatments.edit');
    Route::post('/', [HousingsGivetreatmentsController::class, 'store'])
         ->name('housings_givetreatments.housings_givetreatments.store');
    Route::put('housings_givetreatments/{housingsGivetreatments}', [HousingsGivetreatmentsController::class, 'update'])
         ->name('housings_givetreatments.housings_givetreatments.update');
    Route::delete('/housings_givetreatments/{housingsGivetreatments}',[HousingsGivetreatmentsController::class, 'destroy'])
         ->name('housings_givetreatments.housings_givetreatments.destroy');
});

Route::group([
    'prefix' => 'housings_hasroles',
], function () {
    Route::get('/', [HousingsHasrolesController::class, 'index'])
         ->name('housings_hasroles.housings_hasroles.index');
    Route::get('/create', [HousingsHasrolesController::class, 'create'])
         ->name('housings_hasroles.housings_hasroles.create');
    Route::get('/show/{housingsHasroles}',[HousingsHasrolesController::class, 'show'])
         ->name('housings_hasroles.housings_hasroles.show');
    Route::get('/{housingsHasroles}/edit',[HousingsHasrolesController::class, 'edit'])
         ->name('housings_hasroles.housings_hasroles.edit');
    Route::post('/', [HousingsHasrolesController::class, 'store'])
         ->name('housings_hasroles.housings_hasroles.store');
    Route::put('housings_hasroles/{housingsHasroles}', [HousingsHasrolesController::class, 'update'])
         ->name('housings_hasroles.housings_hasroles.update');
    Route::delete('/housings_hasroles/{housingsHasroles}',[HousingsHasrolesController::class, 'destroy'])
         ->name('housings_hasroles.housings_hasroles.destroy');
});

Route::group([
    'prefix' => 'housings_materials',
], function () {
    Route::get('/', [HousingsMaterialsController::class, 'index'])
         ->name('housings_materials.housings_materials.index');
    Route::get('/create', [HousingsMaterialsController::class, 'create'])
         ->name('housings_materials.housings_materials.create');
    Route::get('/show/{housingsMaterials}',[HousingsMaterialsController::class, 'show'])
         ->name('housings_materials.housings_materials.show');
    Route::get('/{housingsMaterials}/edit',[HousingsMaterialsController::class, 'edit'])
         ->name('housings_materials.housings_materials.edit');
    Route::post('/', [HousingsMaterialsController::class, 'store'])
         ->name('housings_materials.housings_materials.store');
    Route::put('housings_materials/{housingsMaterials}', [HousingsMaterialsController::class, 'update'])
         ->name('housings_materials.housings_materials.update');
    Route::delete('/housings_materials/{housingsMaterials}',[HousingsMaterialsController::class, 'destroy'])
         ->name('housings_materials.housings_materials.destroy');
});

Route::group([
    'prefix' => 'housings_materialtypes',
], function () {
    Route::get('/', [HousingsMaterialtypesController::class, 'index'])
         ->name('housings_materialtypes.housings_materialtypes.index');
    Route::get('/create', [HousingsMaterialtypesController::class, 'create'])
         ->name('housings_materialtypes.housings_materialtypes.create');
    Route::get('/show/{housingsMaterialtypes}',[HousingsMaterialtypesController::class, 'show'])
         ->name('housings_materialtypes.housings_materialtypes.show');
    Route::get('/{housingsMaterialtypes}/edit',[HousingsMaterialtypesController::class, 'edit'])
         ->name('housings_materialtypes.housings_materialtypes.edit');
    Route::post('/', [HousingsMaterialtypesController::class, 'store'])
         ->name('housings_materialtypes.housings_materialtypes.store');
    Route::put('housings_materialtypes/{housingsMaterialtypes}', [HousingsMaterialtypesController::class, 'update'])
         ->name('housings_materialtypes.housings_materialtypes.update');
    Route::delete('/housings_materialtypes/{housingsMaterialtypes}',[HousingsMaterialtypesController::class, 'destroy'])
         ->name('housings_materialtypes.housings_materialtypes.destroy');
});

Route::group([
    'prefix' => 'housings_roles',
], function () {
    Route::get('/', [HousingsRolesController::class, 'index'])
         ->name('housings_roles.housings_roles.index');
    Route::get('/create', [HousingsRolesController::class, 'create'])
         ->name('housings_roles.housings_roles.create');
    Route::get('/show/{housingsRoles}',[HousingsRolesController::class, 'show'])
         ->name('housings_roles.housings_roles.show');
    Route::get('/{housingsRoles}/edit',[HousingsRolesController::class, 'edit'])
         ->name('housings_roles.housings_roles.edit');
    Route::post('/', [HousingsRolesController::class, 'store'])
         ->name('housings_roles.housings_roles.store');
    Route::put('housings_roles/{housingsRoles}', [HousingsRolesController::class, 'update'])
         ->name('housings_roles.housings_roles.update');
    Route::delete('/housings_roles/{housingsRoles}',[HousingsRolesController::class, 'destroy'])
         ->name('housings_roles.housings_roles.destroy');
});

Route::group([
    'prefix' => 'housings_sells',
], function () {
    Route::get('/', [HousingsSellsController::class, 'index'])
         ->name('housings_sells.housings_sells.index');
    Route::get('/create', [HousingsSellsController::class, 'create'])
         ->name('housings_sells.housings_sells.create');
    Route::get('/show/{housingsSells}',[HousingsSellsController::class, 'show'])
         ->name('housings_sells.housings_sells.show');
    Route::get('/{housingsSells}/edit',[HousingsSellsController::class, 'edit'])
         ->name('housings_sells.housings_sells.edit');
    Route::post('/', [HousingsSellsController::class, 'store'])
         ->name('housings_sells.housings_sells.store');
    Route::put('housings_sells/{housingsSells}', [HousingsSellsController::class, 'update'])
         ->name('housings_sells.housings_sells.update');
    Route::delete('/housings_sells/{housingsSells}',[HousingsSellsController::class, 'destroy'])
         ->name('housings_sells.housings_sells.destroy');
});

Route::group([
    'prefix' => 'housings_stockopnames',
], function () {
    Route::get('/', [HousingsStockopnamesController::class, 'index'])
         ->name('housings_stockopnames.housings_stockopnames.index');
    Route::get('/create', [HousingsStockopnamesController::class, 'create'])
         ->name('housings_stockopnames.housings_stockopnames.create');
    Route::get('/show/{housingsStockopnames}',[HousingsStockopnamesController::class, 'show'])
         ->name('housings_stockopnames.housings_stockopnames.show');
    Route::get('/{housingsStockopnames}/edit',[HousingsStockopnamesController::class, 'edit'])
         ->name('housings_stockopnames.housings_stockopnames.edit');
    Route::post('/', [HousingsStockopnamesController::class, 'store'])
         ->name('housings_stockopnames.housings_stockopnames.store');
    Route::put('housings_stockopnames/{housingsStockopnames}', [HousingsStockopnamesController::class, 'update'])
         ->name('housings_stockopnames.housings_stockopnames.update');
    Route::delete('/housings_stockopnames/{housingsStockopnames}',[HousingsStockopnamesController::class, 'destroy'])
         ->name('housings_stockopnames.housings_stockopnames.destroy');
});

Route::group([
    'prefix' => 'housings_storages',
], function () {
    Route::get('/', [HousingsStoragesController::class, 'index'])
         ->name('housings_storages.housings_storages.index');
    Route::get('/create', [HousingsStoragesController::class, 'create'])
         ->name('housings_storages.housings_storages.create');
    Route::get('/show/{housingsStorages}',[HousingsStoragesController::class, 'show'])
         ->name('housings_storages.housings_storages.show');
    Route::get('/{housingsStorages}/edit',[HousingsStoragesController::class, 'edit'])
         ->name('housings_storages.housings_storages.edit');
    Route::post('/', [HousingsStoragesController::class, 'store'])
         ->name('housings_storages.housings_storages.store');
    Route::put('housings_storages/{housingsStorages}', [HousingsStoragesController::class, 'update'])
         ->name('housings_storages.housings_storages.update');
    Route::delete('/housings_storages/{housingsStorages}',[HousingsStoragesController::class, 'destroy'])
         ->name('housings_storages.housings_storages.destroy');
});

Route::group([
    'prefix' => 'housings_units',
], function () {
    Route::get('/', [HousingsUnitsController::class, 'index'])
         ->name('housings_units.housings_units.index');
    Route::get('/create', [HousingsUnitsController::class, 'create'])
         ->name('housings_units.housings_units.create');
    Route::get('/show/{housingsUnits}',[HousingsUnitsController::class, 'show'])
         ->name('housings_units.housings_units.show');
    Route::get('/{housingsUnits}/edit',[HousingsUnitsController::class, 'edit'])
         ->name('housings_units.housings_units.edit');
    Route::post('/', [HousingsUnitsController::class, 'store'])
         ->name('housings_units.housings_units.store');
    Route::put('housings_units/{housingsUnits}', [HousingsUnitsController::class, 'update'])
         ->name('housings_units.housings_units.update');
    Route::delete('/housings_units/{housingsUnits}',[HousingsUnitsController::class, 'destroy'])
         ->name('housings_units.housings_units.destroy');
});
