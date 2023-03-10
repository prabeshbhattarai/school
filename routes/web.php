<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\StudentController;
use App\Models\User;



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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//For Admin Dashboard
Route::middleware(['auth','usertype:admin'])->group(function(){
    //route to admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //route to admin login
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    //route to admin user view
    Route::get('/admin/view', [AdminController::class, 'AdminView'])->name('admin.view');

    //route to admin user add
    Route::get('/admin/add', [AdminController::class, 'AdminAdd'])->name('admin.add');

    //route to admin user store
    Route::post('/admin/store', [AdminController::class, 'AdminStore'])->name('admin.store');

    //route to admin user edit
    Route::get('/admin/edit/{id}', [AdminController::class, 'AdminEdit'])->name('admin.edit');

    //route to admin user update
    Route::post('/admin/update/{id}', [AdminController::class, 'AdminUpdate'])->name('admin.update');

    //route to admin user delete
    Route::get('/admin/delete/{id}', [AdminController::class, 'AdminDelete'])->name('admin.delete');

    //route to admin user profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    //route to admin user profile store
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

     //route to admin user profile edit
     Route::get('/admin/profile/edit', [AdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    //route to admin  password
    Route::get('/admin/password', [AdminController::class, 'AdminPassword'])->name('admin.password');

    //route to admin password update
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');



    //route to admin student class
    Route::get('/admin/student/class', [AdminController::class, 'AdminStudentClass'])->name('admin.student.class');

    //route to admin student class add
    Route::get('/admin/student/class/add', [AdminController::class, 'AdminStudentClassAdd'])->name('admin.student.class.add');

    //route to admin student class store
    Route::post('/admin/store/student/class', [AdminController::class, 'AdminStoreStudentClass'])->name('admin.store.student.class');

    //route to admin student class edit
    Route::get('/admin/class/edit/{id}', [AdminController::class, 'AdminClassEdit'])->name('admin.class.edit');

    //route to admin student class update
    Route::post('/admin/update/class/{id}', [AdminController::class, 'AdminUpdateClass'])->name('admin.update.class');

    //route to admin student class delete
    Route::get('/admin/class/delete/{id}', [AdminController::class, 'AdminClassDelete'])->name('admin.class.delete');




    //route to admin student year
    Route::get('/admin/student/year', [AdminController::class, 'AdminStudentYear'])->name('admin.student.year');

    //route to admin student year add
    Route::get('/admin/year/add', [AdminController::class, 'AdminYearAdd'])->name('admin.year.add');

    //route to admin student year store
    Route::post('/admin/store/year', [AdminController::class, 'AdminStoreYear'])->name('admin.store.year');

    //route to admin student year edit
    Route::get('/admin/year/edit/{id}', [AdminController::class, 'AdminYearEdit'])->name('admin.year.edit');

    //route to admin student year update
    Route::post('/admin/update/year/{id}', [AdminController::class, 'AdminUpdateYear'])->name('admin.update.year');

    //route to admin student year delete
    Route::get('/admin/year/delete/{id}', [AdminController::class, 'AdminYearDelete'])->name('admin.year.delete');



    //route to admin student group
    Route::get('/admin/student/group', [AdminController::class, 'AdminStudentGroup'])->name('admin.student.group');

    //route to admin student group add
    Route::get('/admin/group/add', [AdminController::class, 'AdminGroupAdd'])->name('admin.group.add');

    //route to admin student group store
    Route::post('/admin/store/group', [AdminController::class, 'AdminStoreGroup'])->name('admin.store.group');

    //route to admin student group edit
    Route::get('/admin/group/edit/{id}', [AdminController::class, 'AdminGroupEdit'])->name('admin.group.edit');

    //route to admin student group update
    Route::post('/admin/update/group/{id}', [AdminController::class, 'AdminUpdateGroup'])->name('admin.update.group');

    //route to admin student group delete
    Route::get('/admin/group/delete/{id}', [AdminController::class, 'AdminGroupDelete'])->name('admin.group.delete');



    //route to admin student shift
    Route::get('/admin/student/shift', [AdminController::class, 'AdminStudentShift'])->name('admin.student.shift');

    //route to admin student shift add
    Route::get('/admin/shift/add', [AdminController::class, 'AdminShiftAdd'])->name('admin.shift.add');

    //route to admin student shift store
    Route::post('/admin/store/shift', [AdminController::class, 'AdminStoreShift'])->name('admin.store.shift');

    //route to admin student shift edit
    Route::get('/admin/shift/edit/{id}', [AdminController::class, 'AdminShiftEdit'])->name('admin.shift.edit');

    //route to admin student shift update
    Route::post('/admin/update/shift/{id}', [AdminController::class, 'AdminUpdateShift'])->name('admin.update.shift');

    //route to admin student shift delete
    Route::get('/admin/shift/delete/{id}', [AdminController::class, 'AdminShiftDelete'])->name('admin.shift.delete');


    //route to admin student fee category
    Route::get('/admin/fee/category', [AdminController::class, 'AdminFeeCategory'])->name('admin.fee.category');

    //route to admin student fee category add
    Route::get('/admin/fee/category/add', [AdminController::class, 'AdminFeeCategoryAdd'])->name('admin.fee.category.add');

    //route to admin student fee category store
    Route::post('/admin/store/fee/category', [AdminController::class, 'AdminStoreFeeCategory'])->name('admin.store.fee.category');

    //route to admin student fee category edit
    Route::get('/admin/fee/category/edit/{id}', [AdminController::class, 'AdminFeeCategoryEdit'])->name('admin.fee.category.edit');

    //route to admin student fee category update
    Route::post('/admin/update/fee/category/{id}', [AdminController::class, 'AdminUpdateFeeCategory'])->name('admin.update.fee.category');

    //route to admin student fee category delete
    Route::get('/admin/fee/category/delete/{id}', [AdminController::class, 'AdminFeeCategoryDelete'])->name('admin.fee.category.delete');
    
    

    //route to admin student fee  amount
    Route::get('/admin/fee/amount', [AdminController::class, 'AdminFeeAmount'])->name('admin.fee.amount');

    //route to admin student fee  amount add
    Route::get('/admin/fee/amount/add', [AdminController::class, 'AdminFeeAmountAdd'])->name('admin.fee.amount.add');

    //route to admin student fee  amount store
    Route::post('/admin/store/fee/amount', [AdminController::class, 'AdminStoreFeeAmount'])->name('admin.store.fee.amount');

    
    //route to admin student fee  amount edit
    Route::get('/admin/fee/amount/edit/{fee_category_id}', [AdminController::class, 'AdminFeeAmountEdit'])->name('admin.fee.amount.edit');

    //route to admin student fee  amount update
    Route::post('/admin/update/fee/amount/{fee_category_id}', [AdminController::class, 'AdminUpdateFeeAmount'])->name('admin.update.fee.amount');

    

    
});

    
    


//For Teacher Dashboard
Route::middleware(['auth','usertype:teacher'])->group(function(){
    Route::get('/teacher/dashboard', [TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard');
});

//For Parent Dashboard
Route::middleware(['auth','usertype:parent'])->group(function(){
    Route::get('/parent/dashboard', [ParentController::class, 'ParentDashboard'])->name('parent.dashboard');

});

//For Accountant Dashboard
Route::middleware(['auth','usertype:accountant'])->group(function(){
    Route::get('/accountant/dashboard', [AccountantController::class, 'AccountantDashboard'])->name('accountant.dashboard');

});


Route::get('/admin/login', [AdminController::class, 'AdminLogin']);


