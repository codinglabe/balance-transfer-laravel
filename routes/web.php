<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BalanceTransfer;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserVerifyController;
use App\Models\Order;
use App\Models\VerifiedUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

Route::get('/sss', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/',[UserLoginController::class, 'index'])->name('Login-UI')->middleware('AlreyautCheck');
Route::post('/user-login',[UserLoginController::class, 'User_Login'])->name('user-login');

Route::get('/Code',function(){return view('AuthEmail.Email-code');})->name('code')->middleware('autCheck','afeterCodeVerify');
Route::post('/code-verify',[UserLoginController::class, 'CodeVerify'])->name('CodeVerify');

Route::get('/Log-Out',[UserVerifyController::class, 'User_Logout'])->name('UserLogout');

// Route::get('/dashboard',[UserLoginController::class, 'Dashboard'])->name('dashboard')->middleware('autCheck');
Route::prefix('dashboard')->group(function(){
    Route::get('/personal-infor',[UserLoginController::class, 'Personal_infor']);
    Route::get('/order-history',[UserLoginController::class, 'Order_history'])->name('dashboard.order-history')->middleware('autCheck','is_verified');
    Route::get('/account',[BalanceTransfer::class, 'UserBalance'])->name('account')->middleware('autCheck','is_verified');
    Route::get('/balance-transfer',[BalanceTransfer::class, 'BalanceTransfer'])->middleware('autCheck','is_verified');
    Route::post('/transfer',[BalanceTransfer::class, 'Transfer'])->name('transfer')->middleware('autCheck','is_verified');
});

Route::get('/verify',[UserVerifyController::class, 'VerifyUser'])->name('VerifyUser');

Route::get('/Registration',[UserLoginController::class, 'Registration'])->name('RegistrationUI');

Route::post('/user-registration',[UserVerifyController::class, 'User_Registration'])->name('user-registration');

Route::post('/User-Info-update',[UserVerifyController::class, 'UserInfoUpdate'])->name('UserInfoUpdate');


Route::get('/randoom-code',function(){
    $sixDigit = random_int(100000, 999999);
    return view('random',compact('sixDigit'));
})->middleware('afeterCodeVerify');

Route::post('/Random',[UserLoginController::class, 'Random']);

Route::prefix('admin')->group(function(){
    Route::get('/home',function(){
        $user = VerifiedUser::where(['is_verified_user'=>1, 'status'=> 0])->get();
        $users = VerifiedUser::where('status',1)->get();
        $order = Order::all();
        return view('admin.home',['user'=>$user,'users'=>$users,'order'=>$order]);
    });
    Route::post('/delete-user',[UserVerifyController::class, 'UserDelete'])->name('delete.user');
    Route::post('/block',[UserVerifyController::class, 'Block'])->name('block');
    Route::post('/unblock',[UserVerifyController::class, 'UnBlock'])->name('unblock');
    Route::post('/changetask', function(Request $request){
        return dd($request->all());
    })->name('changetask');

    

});

Route::post('/order-status',[UserVerifyController::class, 'OrderStatus']);


Route::get('/user-login',function (){
    return view('home.admin');
});

Route::get('/admin-view',function () {
        return view('home.admin-view');
})->name('adminView');

Route::post('/user-in',[AdminController::class, 'guradLogin'])->name('user-in');

