<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');


Route::middleware([

    ])->group(function () {
         Route::get('/dashboard', function () {
           if (auth()->user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
           }else{
            return redirect()->route('user-dashboard');
           }
         })->name('userdashboard');

    });

    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::get('/Admindashboard', function(){
            return view('admin.index');
        })->name('Admindashboard');

        Route::get('/Add-Attendance', function(){
            return view('admin.add-attendance');
        })->name('addattendance');

        Route::get('/Attendance-List', function(){
            return view('admin.attendance-list');
        })->name('attendancelist');

        Route::get('/Student-List', function(){
            return view('admin.studentlist');
        })->name('studentlist');

     });

     Route::prefix('user')->middleware('user')->group(function(){
        Route::get('/dashboard', function(){
               return view('user.index');
           })->name('user-dashboard');

           Route::get('/Attendanceform', function(){
            return view('user.atteendanceform');
        })->name('attendanceform');

        Route::get('/Profile', function(){
            return view('user.profile');
        })->name('userprofile');



        });


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
