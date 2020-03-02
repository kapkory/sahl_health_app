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

Route::get('/','Frontend\MenuController@index');
Route::get('hospitals','Frontend\MenuController@hospitals');
Route::view('about','core.frontend.about');
Route::view('product','core.frontend.product');
Route::view('partners','core.frontend.partners');
Route::get('institution/{slug}','Frontend\MenuController@hospital');
Route::get('about-us','Frontend\MenuController@aboutUs');
//Route::get('/', function () {
//    return view('welcome');
//});

//dummy pages
Route::view('packages','core.frontend.packages.index');
Route::view('corporate','core.frontend.packages.corporate');
Route::view('corporate-membership','core.frontend.packages.corporate-membership');
Route::post('corporate-packages','Frontend\IndexController@savePackageRequests');

Route::view('hospital','core.frontend.hospital');

Route::get('privacy-policy','Frontend\OtherPagesController@privacyPolicy')->name('privacy');
Route::get('advertising-policy','Frontend\OtherPagesController@advertisingPolicy')->name('advertising');
Route::get('cookie-policy','Frontend\OtherPagesController@cookiePolicy');
Route::get('terms','Frontend\OtherPagesController@terms');


Route::get('hospitals/discounts','Frontend\GeneralController@discounts');


//Route::view('/','core.frontend.home');
Route::get('logout',function (){
   Auth::logout();
});

Auth::routes();

Route::get('register','Frontend\IndexController@memberRegistration');
Route::post('contact-us','Frontend\IndexController@saveContacts');
Route::post('member-register','Auth\RegisterController@memberRegistration');
Route::get('member-packages','Frontend\IndexController@memberPackages');
Route::view('member-complete-registration','core.member.complete_registration');
Route::post('member/complete-registration','Member\IndexController@completeRegistration');

Route::get('member-referral/{referral_id}/{referral_code}','Frontend\IndexController@referredMember');

Route::get('home', 'HomeController@index');

Route::get('logout',function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect('/');
});

//updated member routes
Route::get('member-register/{referral_code?}','Frontend\IndexController@memberRegister');
Route::post('member/register','Auth\RegisterController@registerMember');
Route::post('create-account','Auth\RegisterController@createAccount');
Route::view('complete-registration','auth.complete_registration');
Route::post('member-complete-registration','Member\IndexController@completeMemberRegistration');

Route::post('hospitals','Frontend\SearchController@searchHospitals');


Route::get('/{provider}/login', 'Auth\SocialProviderController@redirect');
Route::get('/{provider}/callback/{role?}', 'Auth\SocialProviderController@callback');

//Route::get('complete-registration','Auth\RegisterController@completeRegistration');

Route::get('provider-register','Provider\IndexController@registration');
Route::post('provider-register','Auth\ProviderRegisterController@registerProvider');


Route::get('agent-register','Agent\IndexController@registration');
Route::post('agent-register','Agent\IndexController@registerAgent');

//Route::redirect('cookie-policy','blog/cookie-policy',301);
//Route::redirect('advertising-policy','blog/advertising-policy',301);
Route::redirect('/advert','blog/advertising-policy',301);

//Route::redirect('privacy-policy','blog/privacy-policy',301);
//Route::redirect('privacy','blog/privacy-policy',301);

//Route::redirect('/terms','blog/terms',301);
Route::redirect('/diseases','blog/diseases',301);
Route::redirect('/diseases/{disease}','blog/diseases/{disease}',301);

Route::redirect('categories/{articleCategory}','blog/categories/{articleCategory}',301);
Route::redirect('article.category','blog/categories/{articleCategory}',301);

Route::redirect('article-categories/{articleCategory}','blog/article-categories/{articleCategory}',301);
Route::redirect('main.category','blog/article-categories/{articleCategory}',301);

Route::redirect('search','blog/search',301);
Route::redirect('letter/{q}','blog/letter/{q}',301);

Route::redirect('autocomplete','blog/autocomplete',301);
Route::redirect('medical-support','blog/medical-support',301);

//Route::redirect('about','blog/about');
//Route::redirect('about','blog/about');
Route::redirect('international-patients','blog/international-patients',301);
Route::redirect('tools/bmi','blog/tools/bmi',301);
Route::redirect('bmi','blog/bmi',301);
Route::redirect('tools/ovulation-calculator','blog/tools/ovulation-calculator',301);
Route::redirect('ovulation','blog/tools/ovulation-calculator',301);

Route::redirect('contact','blog/contact',301);


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
