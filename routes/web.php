<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/itc91', function () {
    return view('Hola Soy Goku');
});

Route::get('/ITC91', function () {
    return view('vistaItc91');
});

Route::get('/bocinas', function () {
    return view('vistabocinas');
});
Route::get('/bajos', function () {
    return view('vistabajos');
});
Route::get('/amplis', function () {
    return view('vistaamplis');
});


Route::get('/itc91bd', 'controladoritc91bd@mostrar');










/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductosController@index')->name('index');
            Route::get('/create',                                       'ProductosController@create')->name('create');
            Route::post('/',                                            'ProductosController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductosController@update')->name('update');
            Route::delete('/{producto}',                                'ProductosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('registros')->name('registros/')->group(static function() {
            Route::get('/',                                             'RegistrosController@index')->name('index');
            Route::get('/create',                                       'RegistrosController@create')->name('create');
            Route::post('/',                                            'RegistrosController@store')->name('store');
            Route::get('/{registro}/edit',                              'RegistrosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RegistrosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{registro}',                                  'RegistrosController@update')->name('update');
            Route::delete('/{registro}',                                'RegistrosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('alumnos')->name('alumnos/')->group(static function() {
            Route::get('/',                                             'AlumnosController@index')->name('index');
            Route::get('/create',                                       'AlumnosController@create')->name('create');
            Route::post('/',                                            'AlumnosController@store')->name('store');
            Route::get('/{alumno}/edit',                                'AlumnosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AlumnosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{alumno}',                                    'AlumnosController@update')->name('update');
            Route::delete('/{alumno}',                                  'AlumnosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('vehiculos')->name('vehiculos/')->group(static function() {
            Route::get('/',                                             'VehiculosController@index')->name('index');
            Route::get('/create',                                       'VehiculosController@create')->name('create');
            Route::post('/',                                            'VehiculosController@store')->name('store');
            Route::get('/{vehiculo}/edit',                              'VehiculosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VehiculosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{vehiculo}',                                  'VehiculosController@update')->name('update');
            Route::delete('/{vehiculo}',                                'VehiculosController@destroy')->name('destroy');
        });
    });
});

'Auth'::routes();

Route::get('/home', 'HomeController@index')->name('home');
