<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\role\RoleController;
use App\Http\Controllers\admin\user\UserController;
use App\Http\Controllers\admin\department\DepartmentController;
use App\Http\Controllers\admin\designation\DesignationController;
use App\Http\Controllers\admin\permission\PermissionController;
use App\Http\Controllers\admin\permission\AssignPermissionController;
use App\Http\Controllers\admin\vehicle\VehicleController;
use App\Http\Controllers\admin\vehicle\group\VehiclegroupController;
use App\Http\Controllers\admin\vehicle\type\VehicleTypeController;
use App\Http\Controllers\admin\vehicle\status\VehicleStatusController;
use App\Http\Controllers\admin\vehicle\ownership\VehicleOwnershipController;
use App\Http\Controllers\admin\vehicle\staff\VehicleStaffController;
use App\Http\Controllers\admin\vehicle\staff\StaffTypeController;
use App\Http\Controllers\admin\vendor\VendorTypeController;

  
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
  
Auth::routes();
  
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('designation', DesignationController::class);
    Route::resource('permit', PermissionController::class);
    Route::resource('assign-permit', AssignPermissionController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('vehicle-group', VehiclegroupController::class);
    Route::resource('vehicle-type', VehicleTypeController::class);
    Route::resource('vehicle-status', VehicleStatusController::class);
    Route::resource('vehicle-ownership', VehicleOwnershipController::class);
    Route::resource('vehicle-staff', VehicleStaffController::class);
    Route::resource('staff-type', StaffTypeController::class);
    Route::resource('vendor-type', VendorTypeController::class);
});