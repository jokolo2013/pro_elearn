<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Courses_type;
use App\Lesson_files;
use App\Lesson_video;
use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {

        // $courses = Courses::with('courses_type')->where('publish','=','1')->orderBy('created_at', 'desc')->paginate(9); // จำกัดเปิดดูเฉพาะคอร์สที่เปิด
        $courses = Courses::with('courses_type')->orderBy('created_at', 'desc')->paginate(9);
        $lesson = Lessons::all();
        // foreach($courses as $course){
        //     echo
        //     $lesson = DB::table('lessons')
        //     ->join('courses', 'lessons.id_course', '=', 'courses.id')
        //     ->where('lessons.id_course', '=', $course->id)
        //     ->select('lessons.*')
        //     ->get();
        // }
        // $lessonCount = $lesson->count();
        return view('index', ['courses' =>  $courses, 'lesson' => $lesson]);
        //  return  $courses;
    }

    public function courses_page($id)
    {
        $lessonFile = null;
        $lessonVideo = null;
        $courses_page = Courses::find($id);
        $courses_page_type = $courses_page->courses_type;
        $lesson = DB::table('courses')
            ->join('lessons', 'courses.id', '=', 'lessons.id_course')
            ->where('courses.id', '=', $id)
            ->select('lessons.*')
            ->get();
        $lessonCount = $lesson->count();
        foreach ($lesson as $les) {
            $lessonFile = DB::table('lessons')
                ->join('lesson_files', 'lessons.id', '=', 'lesson_files.lessons_id')
                ->where('lessons.id_course', '=', $id)
                ->orWhere('lessons.id', '=', $les->id)
                ->select('lesson_files.*',)
                ->get();
            $lessonVideo = DB::table('lessons')
                ->join('lesson_video', 'lessons.id', '=', 'lesson_video.lessons_id')
                ->where('lessons.id_course', '=', $id)
                ->orWhere('lessons.id', '=', $les->id)
                ->select('lesson_video.*')
                ->get();
        }
        return view(
            'courses-page',
            [
                'courses_page' => $courses_page,
                'courses_page_type' => $courses_page_type,
                'lesson' => $lesson,
                'lessonCount' => $lessonCount,
                'lessonFile' =>  $lessonFile,
                'lessonVideo' => $lessonVideo,
            ]
        );
    }

    public function login()
    {
        return view('/login');
    }
}
