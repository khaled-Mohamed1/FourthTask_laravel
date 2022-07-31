<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TemporaryWorkforceController;
use App\Http\Controllers\PermanentWorkforceController;
use App\Http\Controllers\PoultryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\VegetableController;
use App\Http\Controllers\WaterSourceController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\VisitController;

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

Route::controller(FarmerController::class)->group(function () {
    Route::get('farmers', 'index')->name('farmers');
    Route::get('farmer/show/{id}', 'show')->name('farmer.show');
    Route::post('farmers/add-farmer', 'addFarmer')->name('add.farmer');
    Route::post('farmers/update-farmer', 'updateFarmer')->name('update.farmer');
    Route::post('farmers/delete-farmer', 'deleteFarmer')->name('delete.farmer');
    Route::get('farmers/pagination/paginate-data', 'pagination');
    Route::post('farmers/search', 'search')->name('search');
    Route::get('farmers/getRegion', 'getRegion')->name('getRegion');
});

Route::controller(EquipmentController::class)->group(function () {
    Route::post('farmers/add-equipment', 'addEquipment')->name('add.equipment');
    Route::post('farmers/update-equipment', 'updateEquipment')->name('update.equipment');
    Route::post('farmers/delete-equipment', 'deleteEquipment')->name('delete.equipment');
});

Route::controller(LandController::class)->group(function () {
    Route::post('farmers/add-land', 'addLand')->name('add.land');
    Route::get('farmer/lands/show/{id}', 'show')->name('land.show');
    Route::post('farmers/update-land', 'updateLand')->name('update.land');
    Route::post('farmers/delete-land', 'deleteLand')->name('delete.land');
    Route::get('farmers/getRegion/land', 'getRegionLand')->name('getRegionLand');
});

Route::controller(TemporaryWorkforceController::class)->group(function () {
    Route::post('farmers/add-temporaryWorkforce', 'addTemporaryWorkforce')->name('add.temporaryWorkforce');
    Route::post('farmers/update-temporaryWorkforce', 'updateTemporaryWorkforce')->name('update.temporaryWorkforce');
    Route::post('farmers/delete-temporaryWorkforce', 'deleteTemporaryWorkforce')->name('delete.temporaryWorkforce');
});

Route::controller(PermanentWorkforceController::class)->group(function () {
    Route::post('farmers/add-permanentWorkforce', 'addPermanentWorkforce')->name('add.permanentWorkforce');
    Route::post('farmers/update-permanentWorkforce', 'updatePermanentWorkforce')->name('update.permanentWorkforce');
    Route::post('farmers/delete-permanentWorkforce', 'deletePermanentWorkforce')->name('delete.permanentWorkforce');
});

Route::controller(AppController::class)->group(function () {
    Route::post('farmers/add-app', 'addApp')->name('add.app');
    Route::post('farmers/update-app/{id}', 'updateApp')->name('update.app');
    // Route::post('farmers/delete-app', 'deleteApp')->name('delete.app');
});

//lands
Route::controller(PartnerController::class)->group(function () {
    Route::post('farmer/lands/add-partner', 'addPartner')->name('add.partner');
    Route::post('farmer/lands/update-partner', 'updatePartner')->name('update.partner');
    Route::post('farmer/lands/delete-partner', 'deletePartner')->name('delete.partner');
});

Route::controller(BuildingController::class)->group(function () {
    Route::post('farmer/lands/add-building', 'addBuilding')->name('add.building');
    Route::post('farmer/lands/update-building', 'updateBuilding')->name('update.building');
    Route::post('farmer/lands/delete-building', 'deleteBuilding')->name('delete.building');
});

Route::controller(WaterSourceController::class)->group(function () {
    Route::post('farmer/lands/add-waterSource', 'addWaterSource')->name('add.waterSource');
    Route::post('farmer/lands/update-waterSource', 'updateWaterSource')->name('update.waterSource');
    Route::post('farmer/lands/delete-waterSource', 'deleteWaterSource')->name('delete.waterSource');
});

Route::controller(CropController::class)->group(function () {
    Route::post('farmer/lands/add-crop', 'addCrop')->name('add.crop');
    Route::post('farmer/lands/update-crop', 'updateCrop')->name('update.crop');
    Route::post('farmer/lands/delete-crop', 'deleteCrop')->name('delete.crop');
});

Route::controller(VegetableController::class)->group(function () {
    Route::post('farmer/lands/add-vegetable', 'addVegetable')->name('add.vegetable');
    Route::post('farmer/lands/update-vegetable', 'updateVegetable')->name('update.vegetable');
    Route::post('farmer/lands/delete-vegetable', 'deleteVegetable')->name('delete.vegetable');
});

Route::controller(TreeController::class)->group(function () {
    Route::post('farmer/lands/add-tree', 'addTree')->name('add.tree');
    Route::post('farmer/lands/update-tree', 'updateTree')->name('update.tree');
    Route::post('farmer/lands/delete-tree', 'deleteTree')->name('delete.tree');
});

Route::controller(CattleController::class)->group(function () {
    Route::post('farmer/lands/add-cattle', 'addCattle')->name('add.cattle');
    Route::post('farmer/lands/update-cattle', 'updateCattle')->name('update.cattle');
    Route::post('farmer/lands/delete-cattle', 'deleteCattle')->name('delete.cattle');
});


Route::controller(PoultryController::class)->group(function () {
    Route::post('farmer/lands/add-poultry', 'addPoultry')->name('add.poultry');
    Route::post('farmer/lands/update-poultry', 'updatePoultry')->name('update.poultry');
    Route::post('farmer/lands/delete-poultry', 'deletePoultry')->name('delete.poultry');
});


//////////////////////////////

// taks five

Route::controller(TourController::class)->group(function () {
    Route::get('tours', 'index')->name('tours');
    Route::post('tours/add-tour', 'addTour')->name('add.tour');
    Route::get('tour/show/{id}', 'show')->name('tour.show');
    Route::post('tours/update-tour', 'updateTour')->name('update.tour');
    Route::post('tours/delete-tour', 'deleteTour')->name('delete.tour');
    Route::post('tours/search', 'search')->name('tours.search');
    Route::get('tours/autocomplete/name', 'fetchname')->name('tour.autocompletename');
    Route::get('tours/getRegion', 'getRegion')->name('tour.getRegion');
});

Route::controller(VisitController::class)->group(function () {
    Route::post('tours/add-visit', 'addVisit')->name('add.visit');
    Route::post('tours/delete-visit', 'deleteVisit')->name('delete.visit');
    Route::post('tours/searchvisit', 'search')->name('visit.search');
    Route::get('tours/autocomplete/fetch', 'fetch')->name('visit.autocomplete');
    Route::post('tours/getAgricultural', 'getAgricultural')->name('getAgricultural');
    Route::post('tours/getAnimal', 'getAnimal')->name('getAnimal');
});
