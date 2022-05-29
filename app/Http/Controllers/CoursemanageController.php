<?php

namespace App\Http\Controllers;

use File;
use PDF;

use App\AdminsUsers;
use App\Certificate;
use App\Certificate_setting;
use App\Certificate_template;
use App\Courses;
use App\Lesson_files;
use App\Lesson_video;
use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CoursemanageController extends Controller
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
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function coursemanageLesson()
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index2', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index2', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function coursemanageRegister()
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index3', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index3', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function coursemanageTest()
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index4', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index4', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function CourseCertificate()
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index5', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index5', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function Resultpreposttest()
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        if (Auth::user()->id_role == 1) {
            $courseUser = null;
            $courses = Courses::where('id_users','=',Auth::user()->id)->orderBy('id', 'desc')->get();
            $userProfile = DB::table('users')->where('id','=',Auth::user()->id)->select('id', 'Fname', 'Lname')->get();
            return view('admins/coursemanage/index6', ['courses' => $courses, 'userProfile' => $userProfile]);
        }
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id', 'Fname', 'Lname')->get();
        return view('admins/coursemanage/index6', ['courses' => $courses, 'userProfile' => $userProfile]);
    }

    public function CourseCertificateManageView($id)
    {
        if (Auth::user()->id_role == 2) {
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        $certificate_setting = Certificate_setting::where('courses_id', '=', $id)->first();
        $certificate_template = Certificate_template::where('id', '=', $certificate_setting->certificate_template_id)->first();
        $pdf = PDF::loadView('admins.coursemanage.certificatemanage.viewExample', ['certificate_setting' => $certificate_setting, 'certificate_template' => $certificate_template])->setPaper('a4', 'landscape');
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
        $course = new Courses();
        $course->id_users = Auth::user()->id;
        $course->viewer = 0;
        $course->publish = 0; // 0 ปิด /1 เปิด
        $course->course_type_id = $request->course_type_id;
        $course->course_name = $request->course_name;
        $cuteVideoLink = Str::substr($request->course_videos, 17, 50);
        $course->course_videos = "https://www.youtube.com/embed/$cuteVideoLink";
        $course->course_detail = $request->course_detail;
        $course->course_difficulty = $request->course_difficulty;
        $course->course_times = $request->course_times;
        $course->courses_passed = $request->courses_passed;
        $course->course_will_learn = $request->course_will_learn;
        $course->course_objective = $request->course_objective;

        if ($request->hasFile('course_images')) {
            $filename = Str::random(10) . '.' . $request->file('course_images')->getClientOriginalExtension();
            $request->file('course_images')->move(public_path() . '/images/course/cover/', $filename);
            Image::make(public_path() . '/images/course/cover/' . $filename)->resize(50, 50)->save(public_path() . '/images//course/resize/' . $filename);
            $course->course_images = $filename;
        } else {
            $course->course_images = 'nopic.jpg';
        }
        $course->save();

        $certificate_setting = new Certificate_setting();
        $certificate_setting->courses_id = $course->id;
        $certificate_setting->certificate_template_id = 1;
        $certificate_setting->description = "ได้ผ่านการอบรมหลักสูตรออนไลน์ $course->course_name";
        $certificate_setting->save();

        return redirect()->action('CoursemanageController@index')->with('status', 'สร้างคอร์สเรียนแล้ว');
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
        $course = Courses::find($id);
        $course->course_type_id = $request->course_type_id;
        $course->course_name = $request->course_name;
        if ($course->course_videos != $request->course_videos) {
            $cuteVideoLink = Str::substr($request->course_videos, 17, 50);
            $course->course_videos = "https://www.youtube.com/embed/$cuteVideoLink";
        } else {
            $course->course_videos = $request->course_videos;
        }
        $course->publish = $request->publish;
        $course->course_detail = $request->course_detail;
        $course->course_difficulty = $request->course_difficulty;
        $course->course_times = $request->course_times;
        $course->courses_passed = $request->courses_passed;
        $course->course_will_learn = $request->course_will_learn;
        $course->course_objective = $request->course_objective;

        if ($request->hasFile('course_images')) {
            // delete old file before update
            if ($course->course_images != 'nopic.jpg') {
                File::delete(public_path() . '\\images\\course\\cover\\' . $course->course_images);
                File::delete(public_path() . '\\images\\course\\resize\\' . $course->course_images);
            }
            $filename = Str::random(10) . '.' . $request->file('course_images')->getClientOriginalExtension();
            $request->file('course_images')->move(public_path() . '/images/course/cover/', $filename);
            Image::make(public_path() . '/images/course/cover/' . $filename)->resize(50, 50)->save(public_path() . '/images/course/resize/' .
                $filename);
            $course->course_images = $filename;
        }
        $course->save();
        return redirect()->action('CoursemanageController@index')->with('status', 'อัพเดทคอร์สเรียนสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $courses = Courses::find($id);
        $lesson = DB::table('lessons')->where('id_course', '=', $id);
        $lesson_file = DB::table('lesson_files')->where('id_course', '=', $id);
        $lesson_video = DB::table('lesson_video')->where('id_course', '=', $id);
        $lesson_link = DB::table('lesson_link')->where('id_course', '=', $id);
        $regiscourse = DB::table('register_courses')->where('id_course','=', $id);
        $certificate = Certificate::where("courses_id","=",$id);
        $certificate_setting = DB::table('certificate_setting')->where('courses_id', '=', $id);

        if ($courses->course_images != null) {
            if($courses->course_images != 'nopic.jpg'){
                File::delete(public_path() . '\\images\\course\\cover\\' . $courses->course_images);
            }
        }
        $certificate_setting->delete();
        $certificate->delete();
        $lesson_file->delete();
        $lesson_video->delete();
        $lesson_link->delete();
        $regiscourse->delete();
        $lesson->delete();
        $courses->delete();

        return redirect("coursemanage")->with('status', 'ลบคอร์สเรียนสำเร็จ');
    }
}
