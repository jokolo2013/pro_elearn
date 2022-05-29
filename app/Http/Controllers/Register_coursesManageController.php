<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Posttest;
use App\Pretest;
use App\Register_courses;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Register_coursesManageController extends Controller
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
        if (Auth::user()->id_role == 2){
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
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
        $register_courses = new Register_courses();
        $register_courses->id_course = $request->courses_id;
        $register_courses->id_users = $request->id_users;
        $register_courses->pretest_score = 0;
        $register_courses->posttest_score = 0;
        $register_courses->pretest_count = 0;
        $register_courses->posttest_count = 0;
        $register_courses->save();

        return redirect("Register_coursesManage/$request->courses_id/edit")->with('status', "ลงทะเบียนสำเร็จ");
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
        $certificate = null;
        $pretestQmax = null;
        $posttestQmax =null;
        if (Auth::user()->id_role == 2){
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        $register_course = DB::table('courses')
            ->join('register_courses', 'courses.id', '=', 'register_courses.id_course')
            ->join('users', 'register_courses.id_users', '=', 'users.id')
            ->where('register_courses.id_course', '=', $id)
            ->select(
                'users.Fname',
                'users.Lname',
                'register_courses.id',
                'register_courses.id_users',
                'register_courses.id_course',
                'register_courses.pretest_score',
                'register_courses.posttest_score',
                'register_courses.pretest_count',
                'register_courses.posttest_count',
                'register_courses.created_at',
                'courses.course_name'
                )
            ->get();
        $cname = DB::table('courses')
            ->where('id', '=', $id)
            ->first();
        $allusers = User::all();
        foreach ($register_course as $regisc) {
            $pretestQmax[$regisc->id_users] = ["count" => Pretest::where('courses_id', '=', $id)->count(), "courses_id" => $id];
            $posttestQmax[$regisc->id_users] = ["count" => Posttest::where('courses_id', '=', $id)->count(), "courses_id" => $id];
            $certificate[$regisc->id_users] = ["certificate" => Certificate::where('user_id', '=', $regisc->id_users)->where('courses_id', '=', $id)->first()];
        }
        // return  $register_course;
        return view('admins.coursemanage.register_coursesmanage.index', ['register_course' => $register_course, 'cname' =>  $cname , 'pretestQmax' => $pretestQmax , 'posttestQmax' => $posttestQmax , 'certificate' => $certificate, 'allusers'=>$allusers]);
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
    public function destroy(Request $request, $id)
    {
        $register_course = Register_courses::find($id);
        $certificate = Certificate::where("courses_id","=",$request->course_id)->where("user_id","=",$request->user_id);
        $certificate-> delete();
        $register_course -> delete();
        return redirect("Register_coursesManage/$request->course_id/edit")->with('status', "ยกเลิกการลงทะเบียนสำเร็จ");
    }
}
