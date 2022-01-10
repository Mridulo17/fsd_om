<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Common\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Auth::routes(['verify' => true]);

/*--------------ADMIN ROUTES---------------*/
Route::group(['middleware' => 'auth', 'prefix' => '/admin', 'namespace' => 'Admin'], function () {
    Route::group(['middleware'=>'menu_permission'],function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::post('menu/action/status', 'UserMenuActionController@status')->name('user_menu_action.status');
        Route::get('/menu/action/deleted-list/{menu_id}', 'UserMenuActionController@deletedListIndex')->name('user_menu_action.deleted_list');
        Route::get('/menu/action/restore/{id}', 'UserMenuActionController@restore')->name('user_menu_action.restore');
        Route::delete('/menu/action/force-delete/{id}', 'UserMenuActionController@forceDelete')->name('user_menu_action.force_destroy');
        Route::get('menu/action/{menu_id}', 'UserMenuActionController@index')->name('user_menu_action.index');
        Route::get('menu/action/create/{menu_id}', 'UserMenuActionController@create')->name('user_menu_action.create');
        Route::post('menu/action/store/{menu_id}', 'UserMenuActionController@store')->name('user_menu_action.store');
        Route::get('menu/action/edit/{menu_id}/{id}', 'UserMenuActionController@edit')->name('user_menu_action.edit');
        Route::delete('menu/action/destroy/{menu_id}/{id}', 'UserMenuActionController@destroy')->name('user_menu_action.destroy');
        Route::post('menu/action/update/{menu_id}/{id}', 'UserMenuActionController@update')->name('user_menu_action.update');

        Route::post('menu/status', 'MenuController@status')->name('menu.status');
        Route::get('/menu/deleted-list', 'MenuController@deletedListIndex')->name('menu.deleted_list');
        Route::get('/menu/restore/{id}', 'MenuController@restore')->name('menu.restore');
        Route::delete('/menu/force-delete/{id}', 'MenuController@forceDelete')->name('menu.force_destroy');
        Route::post('/menu/multiple-delete', 'MenuController@multipleDelete')->name('menu.multiple_delete');
        Route::post('/menu/multiple-restore', 'MenuController@multipleRestore')->name('menu.multiple_restore');
        Route::resource('menu', 'MenuController');

        Route::post('menu_action/status', 'MenuActionController@status')->name('menu_action.status');
        Route::get('/menu-action/deleted-list', 'MenuActionController@deletedListIndex')->name('menu_action.deleted_list');
        Route::get('/menu-action/restore/{id}', 'MenuActionController@restore')->name('menu_action.restore');
        Route::delete('/menu-action/force-delete/{id}', 'MenuActionController@forceDelete')->name('menu_action.force_destroy');
        Route::resource('menu_action', 'MenuActionController');

        Route::post('division/status', 'DivisionController@status')->name('division.status');
        Route::get('/division/deleted-list', 'DivisionController@deletedListIndex')->name('division.deleted_list');
        Route::get('/division/restore/{id}', 'DivisionController@restore')->name('division.restore');
        Route::delete('/division/force-delete/{id}', 'DivisionController@forceDelete')->name('division.force_destroy');
        Route::resource('division', 'DivisionController');

        Route::post('district/status', 'DistrictController@status')->name('district.status');
        Route::get('/district/deleted-list', 'DistrictController@deletedListIndex')->name('district.deleted_list');
        Route::get('/district/restore/{id}', 'DistrictController@restore')->name('district.restore');
        Route::delete('/district/force-delete/{id}', 'DistrictController@forceDelete')->name('district.force_destroy');
        Route::resource('district', 'DistrictController');

        Route::post('thana/status', 'ThanaController@status')->name('thana.status');
        Route::get('/thana/deleted-list', 'ThanaController@deletedListIndex')->name('thana.deleted_list');
        Route::get('/thana/restore/{id}', 'ThanaController@restore')->name('thana.restore');
        Route::delete('/thana/force-delete/{id}', 'ThanaController@forceDelete')->name('thana.force_destroy');
        Route::resource('thana', 'ThanaController');

        Route::post('fire_station_type/status', 'FireStationTypeController@status')->name('fire_station_type.status');
        Route::get('/fire_station_type/deleted-list', 'FireStationTypeController@deletedListIndex')->name('fire_station_type.deleted_list');
        Route::get('/fire_station_type/restore/{id}', 'FireStationTypeController@restore')->name('fire_station_type.restore');
        Route::delete('/fire_station_type/force-delete/{id}', 'FireStationTypeController@forceDelete')->name('fire_station_type.force_destroy');
        Route::resource('fire_station_type', 'FireStationTypeController');

        Route::post('fire_station/status', 'FireStationController@status')->name('fire_station.status');
        Route::get('/fire_station/deleted-list', 'FireStationController@deletedListIndex')->name('fire_station.deleted_list');
        Route::get('/fire_station/restore/{id}', 'FireStationController@restore')->name('fire_station.restore');
        Route::delete('/fire_station/force-delete/{id}', 'FireStationController@forceDelete')->name('fire_station.force_destroy');
        Route::resource('fire_station', 'FireStationController');

        Route::post('designation/status', 'DesignationController@status')->name('designation.status');
        Route::get('/designation/deleted-list', 'DesignationController@deletedListIndex')->name('designation.deleted_list');
        Route::get('/designation/restore/{id}', 'DesignationController@restore')->name('designation.restore');
        Route::delete('/designation/force-delete/{id}', 'DesignationController@forceDelete')->name('designation.force_destroy');
        Route::resource('designation', 'DesignationController');

        Route::post('employee/status', 'EmployeeController@status')->name('employee.status');
        Route::get('/employee/deleted-list', 'EmployeeController@deletedListIndex')->name('employee.deleted_list');
        Route::get('/employee/restore/{id}', 'EmployeeController@restore')->name('employee.restore');
        Route::delete('/employee/force-delete/{id}', 'EmployeeController@forceDelete')->name('employee.force_destroy');
        Route::resource('employee', 'EmployeeController');

        Route::post('country/status', 'CountryController@status')->name('country.status');
        Route::get('/country/deleted-list', 'CountryController@deletedListIndex')->name('country.deleted_list');
        Route::get('/country/restore/{id}', 'CountryController@restore')->name('country.restore');
        Route::delete('/country/force-delete/{id}', 'CountryController@forceDelete')->name('country.force_destroy');
        Route::resource('country', 'CountryController');


        Route::get('/category/deleted-list', 'CategoryController@deletedListIndex')->name('category.deleted_list');
        Route::get('/category/restore/{id}', 'CategoryController@restore')->name('category.restore');
        Route::delete('/category/force-delete/{id}', 'CategoryController@forceDelete')->name('category.force_destroy');
        Route::resource('category', 'CategoryController');

        Route::get('/brand-create-modal', 'BrandController@createModal')->name('brand_create_modal');
        Route::post('/brand-store-from-modal', 'BrandController@storeFromModal')->name('brand_store_from_modal');
        Route::get('/brand/deleted-list', 'BrandController@deletedListIndex')->name('brand.deleted_list');
        Route::get('/brand/restore/{id}', 'BrandController@restore')->name('brand.restore');
        Route::delete('/brand/force-delete/{id}', 'BrandController@forceDelete')->name('brand.force_destroy');
        Route::resource('brand', 'BrandController');


        Route::get('/model-create-modal', 'ModelController@createModal')->name('model_create_modal');
        Route::post('/model-store-from-modal', 'ModelController@storeFromModal')->name('model_store_from_modal');
        Route::get('/model/deleted-list', 'ModelController@deletedListIndex')->name('model.deleted_list');
        Route::get('/model/restore/{id}', 'ModelController@restore')->name('model.restore');
        Route::delete('/model/force-delete/{id}', 'ModelController@forceDelete')->name('model.force_destroy');
        Route::resource('model', 'ModelController');



        Route::post('role/status', 'RoleController@status')->name('role.status');
        Route::any('role/permission/{id}', 'RoleController@permission')->name('role.permission');
        Route::get('/role/deleted-list', 'RoleController@deletedListIndex')->name('role.deleted_list');
        Route::get('/role/restore/{id}', 'RoleController@restore')->name('role.restore');
        Route::delete('/role/force-delete/{id}', 'RoleController@forceDelete')->name('role.force_destroy');
        Route::resource('role', 'RoleController');

        Route::post('user/status', 'UserController@status')->name('user.status');
        Route::get('user/permission/{id}', 'UserController@permission')->name('user.permission');
        Route::post('user/permission-update/{id}', 'UserController@permissionUpdate')->name('user.permission_update');
        Route::post('get_role_permission', 'RoleController@getRolePermission')->name('get_role_permission');
        Route::get('/profile', 'UserController@profile')->name('user.profile');
        Route::post('/profile/{id}', 'UserController@profileUpdate')->name('user.profile_update');
        Route::get('/user/deleted-list', 'UserController@deletedListIndex')->name('user.deleted_list');
        Route::get('/user/restore/{id}', 'UserController@restore')->name('user.restore');
        Route::delete('/user/force-delete/{id}', 'UserController@forceDelete')->name('user.force_destroy');
        Route::resource('user', 'UserController');

        Route::post('content/status', 'ContentController@status')->name('content.status');
        Route::get('/content/deleted-list', 'ContentController@deletedListIndex')->name('content.deleted_list');
        Route::get('/content/restore/{id}', 'ContentController@restore')->name('content.restore');
        Route::delete('/content/force-delete/{id}', 'ContentController@forceDelete')->name('content.force_destroy');
        Route::resource('content', 'ContentController');

        Route::get('/activity_log/deleted-list', 'ActivityLogController@deletedListIndex')->name('activity_log.deleted_list');
        Route::get('/activity_log/restore/{id}', 'ActivityLogController@restore')->name('activity_log.restore');
        Route::delete('/activity_log/force-delete/{id}', 'ActivityLogController@forceDelete')->name('activity_log.force_destroy');
        Route::resource('activity_log', 'ActivityLogController');

        Route::post('fire-accident-reason/status', 'FireAccidentReasonController@status')->name('fire_accident_reason.status');
        Route::get('/fire-accident-reason/deleted-list', 'FireAccidentReasonController@deletedListIndex')->name('fire_accident_reason.deleted_list');
        Route::get('/fire-accident-reason/restore/{id}', 'FireAccidentReasonController@restore')->name('fire_accident_reason.restore');
        Route::delete('/fire-accident-reason/force-delete/{id}', 'FireAccidentReasonController@forceDelete')->name('fire_accident_reason.force_destroy');
        Route::resource('fire-accident-reason','FireAccidentReasonController',['names' => 'fire_accident_reason']);

        Route::post('damaged-property/status', 'DamagedPropertyController@status')->name('damaged_property.status');
        Route::get('/damaged-property/deleted-list', 'DamagedPropertyController@deletedListIndex')->name('damaged_property.deleted_list');
        Route::get('/damaged-property/restore/{id}', 'DamagedPropertyController@restore')->name('damaged_property.restore');
        Route::delete('/damaged-property/force-delete/{id}', 'DamagedPropertyController@forceDelete')->name('damaged_property.force_destroy');
        Route::resource('damaged-property','DamagedPropertyController',['names' => 'damaged_property']);

        Route::post('accident-type/status', 'AccidentTypeController@status')->name('accident_type.status');
        Route::get('/accident-type/deleted-list', 'AccidentTypeController@deletedListIndex')->name('accident_type.deleted_list');
        Route::get('/accident-type/restore/{id}', 'AccidentTypeController@restore')->name('accident_type.restore');
        Route::delete('/accident-type/force-delete/{id}', 'AccidentTypeController@forceDelete')->name('accident_type.force_destroy');
        Route::resource('accident-type','AccidentTypeController',['names' => 'accident_type']);

        Route::post('assigned-vehicle/status', 'AssignedVehicleController@status')->name('assigned_vehicle.status');
        Route::get('/assigned-vehicle/deleted-list', 'AssignedVehicleController@deletedListIndex')->name('assigned_vehicle.deleted_list');
        Route::get('/assigned-vehicle/restore/{id}', 'AssignedVehicleController@restore')->name('assigned_vehicle.restore');
        Route::delete('/assigned-vehicle/force-delete/{id}', 'AssignedVehicleController@forceDelete')->name('assigned_vehicle.force_destroy');
        Route::resource('assigned-vehicle','AssignedVehicleController',['names' => 'assigned_vehicle']);
        Route::post('/find-product', [CommonController::class,'FindProduct'])->name('find_product');

        Route::post('type/status', 'TypeController@status')->name('type.status');
        Route::get('/type/deleted-list', 'TypeController@deletedListIndex')->name('type.deleted_list');
        Route::get('/type/restore/{id}', 'TypeController@restore')->name('type.restore');
        Route::delete('/type/force-delete/{id}', 'TypeController@forceDelete')->name('type.force_destroy');
        Route::resource('type','TypeController',['names' => 'type']);

        Route::post('department/status', 'DepartmentController@status')->name('department.status');
        Route::get('/department/deleted-list', 'DepartmentController@deletedListIndex')->name('department.deleted_list');
        Route::get('/department/restore/{id}', 'DepartmentController@restore')->name('department.restore');
        Route::delete('/department/force-delete/{id}', 'DepartmentController@forceDelete')->name('department.force_destroy');
        Route::resource('department','DepartmentController',['names' => 'department']);

        Route::post('sub-department/status', 'SubDepartmentController@status')->name('sub_department.status');
        Route::get('/sub-department/deleted-list', 'SubDepartmentController@deletedListIndex')->name('sub_department.deleted_list');
        Route::get('/sub-department/restore/{id}', 'SubDepartmentController@restore')->name('sub_department.restore');
        Route::delete('/sub-department/force-delete/{id}', 'SubDepartmentController@forceDelete')->name('sub_department.force_destroy');
        Route::resource('sub-department','SubDepartmentController',['names' => 'sub_department']);


        Route::get('/operational-maintenance-report/deleted-list', 'OperationalMaintenanceReportController@deletedListIndex')->name('operational_maintenance_report.deleted_list');
        Route::get('/operational-maintenance-report/restore/{id}', 'OperationalMaintenanceReportController@restore')->name('operational_maintenance_report.restore');
        Route::delete('/operational-maintenance-report/force-delete/{id}', 'OperationalMaintenanceReportController@forceDelete')->name('operational_maintenance_report.force_destroy');
        Route::get('/operational-maintenance-report/print/{id}', 'OperationalMaintenanceReportController@print')->name('operational_maintenance_report.print');
        Route::resource('operational-maintenance-report','OperationalMaintenanceReportController',['names' => 'operational_maintenance_report']);

        Route::get('/monthly-fuel-report/deleted-list', 'MonthlyFuelReportController@deletedListIndex')->name('monthly_fuel_report.deleted_list');
        Route::get('/monthly-fuel-report/restore/{id}', 'MonthlyFuelReportController@restore')->name('monthly_fuel_report.restore');
        Route::delete('/monthly-fuel-report/force-delete/{id}', 'MonthlyFuelReportController@forceDelete')->name('monthly_fuel_report.force_destroy');
        Route::get('/monthly-fuel-report/print/{id}', 'MonthlyFuelReportController@print')->name('monthly_fuel_report.print');
        Route::resource('monthly-fuel-report','MonthlyFuelReportController',['names' => 'monthly_fuel_report']);

        Route::get('/master-roll-report/deleted-list', 'MasterRollReportController@deletedListIndex')->name('master_roll_report.deleted_list');
        Route::get('/master-roll-report/restore/{id}', 'MasterRollReportController@restore')->name('master_roll_report.restore');
        Route::delete('/master-roll-report/force-delete/{id}', 'MasterRollReportController@forceDelete')->name('master_roll_report.force_destroy');
        Route::get('/master-roll-report/print/{id}', 'MasterRollReportController@print')->name('master_roll_report.print');
        Route::resource('master-roll-report','MasterRollReportController',['names' => 'master_roll_report']);

        Route::get('/attach-staff-record/deleted-list', 'AttachStaffRecordController@deletedListIndex')->name('attach_staff_record.deleted_list');
        Route::get('/attach-staff-record/restore/{id}', 'AttachStaffRecordController@restore')->name('attach_staff_record.restore');
        Route::delete('/attach-staff-record/force-delete/{id}', 'AttachStaffRecordController@forceDelete')->name('attach_staff_record.force_destroy');
        Route::get('/attach-staff-record/print/{id}', 'AttachStaffRecordController@print')->name('attach_staff_record.print');
        Route::resource('attach-staff-record','AttachStaffRecordController',['names' => 'attach_staff_record']);

        Route::get('/situation-report/deleted-list', 'SituationReportController@deletedListIndex')->name('situation_report.deleted_list');
        Route::get('/situation-report/restore/{id}', 'SituationReportController@restore')->name('situation_report.restore');
        Route::delete('/situation-report/force-delete/{id}', 'SituationReportController@forceDelete')->name('situation_report.force_destroy');
        Route::get('/situation-report/print/{id}', 'SituationReportController@print')->name('situation_report.print');
        Route::resource('situation-report','SituationReportController',['names' => 'situation_report']);

        Route::get('/octane-cost-report/deleted-list', 'OctaneCostReportController@deletedListIndex')->name('octane_cost_report.deleted_list');
        Route::get('/octane-cost-report/restore/{id}', 'OctaneCostReportController@restore')->name('octane_cost_report.restore');
        Route::delete('/octane-cost-report/force-delete/{id}', 'OctaneCostReportController@forceDelete')->name('octane_cost_report.force_destroy');
        Route::get('/octane-cost-report/print/{id}', 'OctaneCostReportController@print')->name('octane_cost_report.print');
        Route::resource('octane-cost-report','OctaneCostReportController',['names' => 'octane_cost_report']);
//        Route::get('/octane-create-wheeler', 'OctaneCostReportController@createModal')->name('octane_create_wheeler');
//        Route::post('/octane-store-from-wheeler', 'OctaneCostReportController@storeFromModal')->name('octane_store_from_wheeler');

        Route::post('/upload-image', 'ImageController@uploadImage')->name('upload_image');

    });
});

Route::group(['middleware' => 'auth'], function () {
    //common data route here
    Route::group(['namespace' => 'Common'], function () {
        //get dependent data
        Route::post('get_district', [CommonController::class,'GetDistrict'])->name('get_district');
        Route::post('get_thana', [CommonController::class,'GetThana'])->name('get_thana');
        Route::post('get_district_from_division', [CommonController::class,'GetDistrictFromDivision'])->name('get_district_from_division');
        Route::post('get_fire_station_from_district', [CommonController::class,'GetFireStationFromDistrict'])->name('get_fire_station_from_district');
        Route::post('get_fire_station_from_code', [CommonController::class,'GetFireStationFromCode'])->name('get_fire_station_from_code');
        Route::post('get_workshop_from_division', [CommonController::class,'GetWorkshopFromDivision'])->name('get_workshop_from_division');
        Route::post('/get-products', [CommonController::class,'GetProducts'])->name('get_products');
        Route::post('/get_assigned_vehicles', [CommonController::class,'GetAssignedVehicles'])->name('get_assigned_vehicles');
        Route::post('get_employee', [CommonController::class,'GetEmployee'])->name('get_employee');
        Route::post('get_employee_from_pin', [CommonController::class,'GetEmployeeFromPin'])->name('get_employee_from_pin');
        Route::post('number-validation', [CommonController::class,'NumberValidation'])->name('number_validation');
        Route::get('/model-create-modal', 'ModelController@createModal')->name('model_create_modal');
        Route::post('/get-models', [CommonController::class,'GetModels'])->name('get_models');
        Route::post('/find-assigned_vehicle', [CommonController::class,'FindAssignedVehicle'])->name('find_assigned_vehicle');
        Route::post('/find-fire-station', [CommonController::class,'FindFireStation'])->name('find_fire_station');
        Route::post('/get-districts', [CommonController::class,'GetDistricts'])->name('get_districts');
        Route::post('/get-fire-stations', [CommonController::class,'GetFireStations'])->name('get_fire_stations');
        Route::post('get_fire_station_from_thana', [CommonController::class,'GetFireStationFromThana'])->name('get_fire_station_from_thana');
        Route::post('/get-item-qty-type', [CommonController::class,'getItemQtyByType'])->name('get_item_qty_by_type');
        Route::post('/get-categories-by-type', [CommonController::class,'getCategoriesByType'])->name('get_categories_by_type');
        Route::post('/get-thanas', [CommonController::class,'GetThanas'])->name('get_thanas');
    });

    Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function () {
        Route::get('/fire_station', 'FireStationController@index')->name('fire_station.index');
    });
});

Route::get('/', function () {
    return redirect(route('login'));
});

/*--------------GENERAL ROUTES---------------*/
Route::get('contact', [CommonController::class,'contact'])->name('contact');
Route::any('email_verify', 'Auth\EmailVerifyController@emailVerify')->name('email_verify');
Route::get('email_verification_check/{email}/{verification_code}', 'Auth\EmailVerifyController@emailVerificationCheck')->name('email_verification_check');
Route::get('registration_verify/{email}/{verification_code}', 'Auth\RegisterController@registrationVerify')->name('registration_verify');

Route::post('/temp_route', [\App\Http\Controllers\HomeController::class,'null'])->name('temp_route');
