<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Posttest;
use App\Posttest_answer;
use Illuminate\Http\Request;

class AnsPosttestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
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
        $posttest = Posttest::where('id', '=', $id)->first();
        $courses = Courses::where('id', '=', $posttest->courses_id)->first();
        $answer = Posttest_answer::where('question_id', '=', $id)->get();
        return view('admins.coursemanage.coursePosttest.editans', ['posttest' => $posttest, 'courses' => $courses, 'answer' => $answer]);
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
        $posttest = Posttest::find($id);
        $posttest->posttest_question = $request->posttest_question;

        for ($i = 1; $i <= 4; $i++) {
            $ans = Posttest_answer::find($request->input("id$i"));
            $ans->posttest_answer = $request->input("posttest_answer$i");
            if ($request->input("posttest_score$i") == null) {
                $ans->posttest_score = 0;
            } else {
                $ans->posttest_score = $request->input("posttest_score$i");
            }
            $ans->save();
        }
        $posttest->save();
        return redirect("CoursePosttestManage/$request->courses_id/edit")->with('status', 'แก้ไขสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
