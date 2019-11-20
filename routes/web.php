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

Route::get('NguyenNhan/Laravel', function () {
    return "<h1>This is My Project</h1>";
});

// truyen tham so
Route::get('HoTen/{ten}', function ($ten) {
    echo "<h3>Ten cua toi la: $ten</h3>";
});

Route::get('Time/{time}', function ($time) {
    // $time = date('d/m/Y');
    echo "Time is: $time";
})->where(['time' => '[0-9]+'])->name('Time');

//Dinh danh (dat ten) cho route

Route::get('Route1', ['as' => 'Route1', function () {
    return ('day la route 1');
}]); //ko nen dung`

Route::get('Route2', function () {
    echo 'day la route 2';
})->name('Route2');

Route::get('GoiRoute', function () {
    // $url = route('Route1');
    // return redirect($url);
    // return redirect()->route('Route2');
    $url = route('Time', ['time' => '2001']);
    return redirect($url);
});

//Group Route
Route::group(['prefix' => 'MyGroup'], function () {
    Route::get('User1', function () {
        return 'user1';
    });
    Route::get('User2', function () {
        return 'user2';
    });
    Route::get('User3', function () {
        return 'user3';
    });
    Route::get('{user}/{id}', function ($user, $id) {
        echo "Xin chao $user co id: $id";
    });
});
// Goi controller
Route::get('GoiController/{ten}', 'MyController@hamXinChao');
Route::get('GoiController', 'MyController@ham1');
Route::get('GetURL/Test', 'MyController@getUrl');

//Gửi nhận tham số trên Request
Route::get('getForm', function () {
    return view('postForm');
});
Route::post('postForm', 'MyController@postForm')->name('postForm');

//gọi hàm đặt Cookie  
Route::get('setCookie', 'MyController@setCookie');
//gọi hàm hiển thị Cookie 
Route::get('getCookie', 'MyController@getCookie')->name('getCookie');

//Upload File
Route::get('uploadFile', function () {
    return view('postFile');
});
Route::post('postFile', 'MyController@postFile')->name('postFile');
// Json
Route::get('getJson', 'MyController@getJson');
