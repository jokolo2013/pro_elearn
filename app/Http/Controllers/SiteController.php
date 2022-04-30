<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Courses_type;
use App\Lesson_files;
use App\Lesson_video;
use App\Lessons;
use App\Pretest;
use App\Pretest_answer;
use App\Pretest_result;
use App\Register_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class SiteController extends Controller
{
    public function index()
    {

        $courses = Courses::with('courses_type')->where('publish', '=', '1')->orderBy('created_at', 'desc')->paginate(9); // จำกัดเปิดดูเฉพาะคอร์สที่เปิด
        // $courses = Courses::with('courses_type')->orderBy('created_at', 'desc')->paginate(9);
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
        $register_course = null;
        if (Auth::user()) {
            $register_course = Register_courses::where('id_course', '=', $id)->where('id_users', '=', Auth::user()->id)->first();
        }
        $lessonFile = null;
        $lessonVideo = null;
        $courses_page = Courses::find($id);
        $courses_page_type = $courses_page->courses_type;
        $lesson = DB::table('courses')
            ->join('lessons', 'courses.id', '=', 'lessons.id_course')
            ->where('courses.id', '=', $id)
            ->orderBy('lesson_sort', 'asc')
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

        $pretest = Pretest::where('courses_id', '=', $id)->get();
        foreach ($pretest as $pt) {
            $pretest_ans = Pretest_answer::all();
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
                'register_course' => $register_course,
                'pretest' => $pretest,
                'pretest_ans' => $pretest_ans,
            ]
        );
    }

    public function registercourses(Request $request)
    {
        $register_courses = new Register_courses();
        $register_courses->id_course = $request->id_course;
        $register_courses->id_users = $request->id_users;
        $register_courses->save();

        return redirect()->back();
    }

    public function sendPretest(Request $request)
    {
        $score = 0;
        for ($i = 0; $i <= $request->loop; $i++) {
            $ans = DB::table('pretest')
                ->join('pretest_answer', 'pretest.id', '=', 'pretest_answer.question_id')
                ->where('pretest.id', '=', $request->input("quest_pretest$i"))
                ->where('pretest_answer.id', '=', $request->input("ans_pretest$i"))
                ->get();
            foreach ($ans as $value) {
                $pretest_result = new Pretest_result();
                $pretest_result->user_id = Auth::user()->id;
                $pretest_result->courses_id = $value->courses_id;
                $pretest_result->question_id = $value->question_id;
                $pretest_result->pretest_answer_id = $value->id;
                if ($value->pretest_score == 1) {
                    $score++;
                }
                $pretest_result->save();
            }
        }
        $pt_score = Register_courses::where('id_course', '=', $request->courses_id)->first();
        $pt_score->pretest_score = $score;
        $pt_score->save();
        return redirect()->back();
    }

    public function login()
    {
        return view('/login');
    }
}
