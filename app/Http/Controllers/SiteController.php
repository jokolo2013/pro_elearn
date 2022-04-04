<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Courses_type;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $courses = Courses::with('courses_type')->orderBy('created_at', 'desc')->paginate(9);
        return view('index', ['courses' =>  $courses]);
    }

    public function login(){
        return view('/login');
    }
}
