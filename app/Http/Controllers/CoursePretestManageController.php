<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Pretest;
use App\Pretest_answer;
use Illuminate\Http\Request;

class CoursePretestManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $pretest = new Pretest();
        $pretest->courses_id = $request->courses_id;
        $pretest->pretest_question = $request->pretest_question;
        $pretest->save();

        $answer = new Pretest_answer();
        $answer->question_id = $pretest->id;
        $answer->pretest_answer = $request->pretest_answer;
        $answer->pretest_score = $request->pretest_score;
        $answer->save();
        return $answer;
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
        $cname = Courses::find($id)->first();
        $pretest = Pretest::where('courses_id','=',$id)->get();
        return view('admins.coursemanage.coursePretest.index',['cname' => $cname, 'pretest' => $pretest]);
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
        //
    }
}
