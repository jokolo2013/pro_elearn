<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Pretest;
use App\Pretest_answer;
use Illuminate\Http\Request;

class AnsManageController extends Controller
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
        $pretest = Pretest::where('id', '=', $id)->first();
        $courses = Courses::where('id', '=', $pretest->courses_id)->first();
        $answer = Pretest_answer::where('question_id', '=', $id)->get();
        return view('admins.coursemanage.coursePretest.editans', ['pretest' => $pretest, 'courses' => $courses, 'answer' => $answer]);
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

        $pretest = Pretest::find($id);
        $pretest->pretest_question = $request->pretest_question;

        $ans1 = Pretest_answer::find($request->id1);
        $ans1->pretest_answer = $request->pretest_answer1;

        if ($request->pretest_score1 == null) {
            $ans1->pretest_score = 0;
        } else {
            $ans1->pretest_score = $request->pretest_score1;
        }

        $ans2 = Pretest_answer::find($request->id2);
        $ans2->pretest_answer = $request->pretest_answer2;

        if ($request->pretest_score2 == null) {
            $ans2->pretest_score = 0;
        } else {
            $ans2->pretest_score = $request->pretest_score2;
        }

        $ans3 = Pretest_answer::find($request->id3);
        $ans3->pretest_answer = $request->pretest_answer3;

        if ($request->pretest_score3 == null) {
            $ans3->pretest_score = 0;
        } else {
            $ans3->pretest_score = $request->pretest_score3;
        }

        $ans4 = Pretest_answer::find($request->id4);
        $ans4->pretest_answer = $request->pretest_answer4;

        if ($request->pretest_score4 == null) {
            $ans4->pretest_score = 0;
        } else {
            $ans4->pretest_score = $request->pretest_score4;
        }


        $pretest->save();
        $ans1->save();
        $ans2->save();
        $ans3->save();
        $ans4->save();
        return redirect()->back();
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
