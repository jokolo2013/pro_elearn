<?php

namespace App\Http\Controllers;
use PDF;
use App\Certificate;
use App\Certificate_setting;
use App\Certificate_template;
use App\Courses;
use App\Posttest;
use App\Pretest;
use App\Register_courses;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class Register_coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $register_course = Register_courses::where('id_users' , '=' , Auth::user()->id)->get();
        $certificate = null;
        $pretestQmax = null;
        $posttestQmax =null;
        $register_course = DB::table('courses')
        ->join('register_courses', 'courses.id', '=', 'register_courses.id_course')
        ->where('register_courses.id_users', '=', Auth::user()->id)
        ->orderByDesc('register_courses.created_at')
        ->get();
        $register_course_count = $register_course->count();

        $resultmaxPretest = Pretest::all();
        $resultmaxPosttest = Posttest::all();
        foreach($register_course as $register){
            $pretestQmax[$register->id_course] = ["count" => Pretest::where('courses_id','=',$register->id_course)->count(),"courses_id" => $register->id_course];
            $posttestQmax[$register->id_course] = ["count" => Posttest::where('courses_id','=',$register->id_course)->count(),"courses_id" => $register->id_course];
            $certificate[$register->id_course] = ["certificate" => Certificate::where('user_id','=',Auth::user()->id)->where('courses_id','=',$register->id_course)->first()];
        }
        // return $certificate;
        return view('register-courses',['register_course' => $register_course, 'register_course_count' => $register_course_count, 'certificate' => $certificate,"pretestQmax" => $pretestQmax, 'posttestQmax' => $posttestQmax]);
    }

    public function Viewcertificate($id)
    {
        $certificate = Certificate::find($id);
        $user = User::find($certificate->user_id);
        $course = Courses::find($certificate->courses_id);
        $certificate_setting = Certificate_setting::where('courses_id','=',$certificate->courses_id)->first();
        $certificate_template = Certificate_template::find($certificate_setting->certificate_template_id);
        $pdf = PDF::loadView('certificate',['course'=>$course,'user'=>$user,'certificate'=>$certificate,'certificate_setting' => $certificate_setting,'certificate_template'=>$certificate_template])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $register_course = Register_courses::find($id);
        $certificate = Certificate::where("courses_id","=",$id)->where("user_id","=",Auth::user()->id);
        $certificate-> delete();
        $register_course -> delete();
        return redirect("register_courses")->with('delete', "ยกเลิกการลงทะเบียนสำเร็จ");
    }
}
