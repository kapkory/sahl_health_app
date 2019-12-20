<?php

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
Route::get('logout',function (){
   Auth::logout();
});

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect('/');
});
Route::get('/{provider}/login', 'Auth\SocialProviderController@redirect');
Route::get('/{provider}/callback', 'Auth\SocialProviderController@callback');

Route::get('complete-registration','Auth\RegisterController@completeRegistration');

Route::get('provider-register','Provider\IndexController@registration');
Route::post('provider-register','Auth\ProviderRegisterController@registerProvider');

Route::group(['middleware' => ['auth', 'web', 'member']], function () {
//    Route::get('/', 'HomeController@index');
//    Route::get('/home', 'HomeController@index')->name('home');

    $routes_path = base_path('routes');
    $route_files = File::allFiles(base_path('routes'));
    foreach ($route_files as $file) {
        $path = $file->getPath();
        if ($path != $routes_path) {
            $file_name = $file->getFileName();
            $prefix = str_replace($file_name, '', $path);
            $prefix = str_replace($routes_path, '', $prefix);
            $file_path = $file->getPathName();
            $this->route_path = $file_path;
            $arr = explode('/', $prefix);
            $len = count($arr);
            $main_file = $arr[$len - 1];
            $arr = array_map('ucwords', $arr);
            $arr = array_filter($arr);
            $ext_route = str_replace('index.route.php', '', $file_name);
            $ext_route = str_replace($main_file, '', $ext_route);
            $ext_route = str_replace('.route.php', '', $ext_route);
            $ext_route = str_replace('web', '', $ext_route);
            if ($ext_route)
                $ext_route = '/' . $ext_route;
            Route::group(['namespace' => implode('\\', $arr), 'prefix' => strtolower($prefix . $ext_route)], function () {
                require $this->route_path;
            });
        }
    }
});
