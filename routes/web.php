<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::get('/clear-cache', function() {
$exitCode = Artisan::call('config:clear');
$exitCode = Artisan::call('cache:clear');
$exitCode = Artisan::call('config:cache');
return 'DONE'; //Return anything
});

Route::get('/','SiteController@index')->name('index');
Route::get('/index','SiteController@index')->name('index');

Route::get('courses-page/','SiteController@index')->name('index');
Route::get('courses-page/{id}','SiteController@courses_page')->name('courses_page','courses_page');
Route::post('courses-page/','SiteController@registercourses')->name('courses_page','courses_page');
Route::post('courses-page/sendPretest','SiteController@sendPretest')->name('courses_page','courses_page');
Route::post('courses-page/sendPosttest','SiteController@sendPosttest')->name('courses_page','courses_page');

Auth::routes();
Route::resource('profile','ProfileController')->name('index','profile');
Route::resource('register_courses','Register_coursesController')->name('index','register_courses');
Route::get('Viewcertificate/',function(){ return redirect()->back();});
Route::get('Viewcertificate/{id}','Register_coursesController@Viewcertificate')->name('index','Viewcertificate');

Route::resource('editusers','AdminsUsersController')->name('index','editusers');

Route::resource('managetypecourses','TypecourseManageController')->name('index','managetypecourses');

Route::resource('certificatebackground','CertificateBgController')->name('index','certificatebackground');

Route::resource('coursemanage','CoursemanageController')->name('index','coursemanage');
Route::get('coursemanageLesson','CoursemanageController@coursemanageLesson')->name('index','coursemanageLesson');
Route::get('coursemanageRegister','CoursemanageController@coursemanageRegister')->name('index','coursemanageRegister');
Route::get('coursemanageTest','CoursemanageController@coursemanageTest')->name('index','coursemanageTest');


Route::get('Resultpreposttest','CoursemanageController@Resultpreposttest')->name('index','Resultpreposttest');
Route::resource('ResultPretest','ResultPretestController')->name('index','ResultPretest');
Route::resource('ResultPosttest','ResultPosttestController')->name('index','ResultPosttest');

Route::get('CourseCertificate','CoursemanageController@CourseCertificate')->name('index','CourseCertificate');
Route::get('CourseCertificateManageView/{id}','CoursemanageController@CourseCertificateManageView')->name('index','CourseCertificateManageView');
Route::get('CourseCertificateManageView/',function(){ return redirect()->back();});

Route::resource('CourseCertificateManage','CourseCertificateManageController')->name('index','CourseCertificateManage');

Route::resource('CoursePretestManage','CoursePretestManageController')->name('index','CoursePretestManage');

Route::resource('CoursePosttestManage','CoursePosttestManageController')->name('index','CoursePretestManage');



Route::resource('AnsManageController','AnsManageController')->name('index','AnsManageController');

Route::resource('AnsPosttestController','AnsPosttestController')->name('index','AnsPosttestController');

Route::resource('Register_coursesManage','Register_coursesManageController')->name('index','Register_coursesManage');

Route::resource('lessonsmanage','LessonsController')->name('index','lessonsmanage');

Route::resource('lessonsfilevideo','LessonsFileVideoController')->name('index','lessonsfilevideo');

Route::get('admins','AdminPageController@index')->name('admins');

Route::get('/home', 'HomeController@index')->name('home');
