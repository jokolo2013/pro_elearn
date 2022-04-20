<?php

namespace App\Http\Controllers;
use File;
use App\AdminsUsers;
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
    public function index()
    {
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id','Fname','Lname')->get();
        return view('admins/coursemanage/index',['courses'=>$courses,'userProfile'=>$userProfile]);
    }

    public function coursemanageLesson()
    {
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id','Fname','Lname')->get();
        return view('admins/coursemanage/index2',['courses'=>$courses,'userProfile'=>$userProfile]);
    }

    public function coursemanageRegister()
    {
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id','Fname','Lname')->get();
        return view('admins/coursemanage/index3',['courses'=>$courses,'userProfile'=>$userProfile]);
    }

    public function coursemanageTest()
    {
        $courseUser = null;
        $courses = Courses::with('AdminsUsers')->orderBy('id', 'desc')->paginate(7);
        $userProfile = AdminsUsers::select('id','Fname','Lname')->get();
        return view('admins/coursemanage/index4',['courses'=>$courses,'userProfile'=>$userProfile]);
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
        $cuteVideoLink = Str::substr($request->course_videos,17,50);
        $course->course_videos = "https://www.youtube.com/embed/$cuteVideoLink";
        $course->course_detail = $request->course_detail;
        $course->course_difficulty = $request->course_difficulty;
        $course->course_times = $request->course_times;
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
        if($course->course_videos != $request->course_videos){
        $cuteVideoLink = Str::substr($request->course_videos,17,50);
        $course->course_videos = "https://www.youtube.com/embed/$cuteVideoLink";
        }else{
        $course->course_videos = $request->course_videos;
        }
        $course->publish = $request->publish;
        $course->course_detail = $request->course_detail;
        $course->course_difficulty = $request->course_difficulty;
        $course->course_times = $request->course_times;
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
        return redirect()->action('CoursemanageController@index')->with('status', 'บันทึกข้อมูลแล้ว');
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
        $lesson = DB::table('lessons')->where('id_course','=',$id);
        $lesson_file = DB::table('lesson_files')->where('id_course','=',$id);
        $lesson_video = DB::table('lesson_video')->where('id_course','=',$id);

        if($courses->course_images != null){
            File::delete(public_path(). '\\images\\course\\cover\\'. $courses->course_images);
        }

        $lesson_file -> delete();
        $lesson_video -> delete();
        $lesson -> delete();
        $courses -> delete();

        return redirect()->action('CoursemanageController@index');
    }
}
