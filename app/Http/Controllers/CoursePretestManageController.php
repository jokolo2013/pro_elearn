<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Pretest;
use App\Pretest_answer;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class CoursePretestManageController extends Controller
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
        $pretest = new Pretest();
        $pretest->courses_id = $request->courses_id;
        $pretest->pretest_question = $request->pretest_question;
        $pretest->save();


        $answer = new Pretest_answer();
        $answer->question_id = $pretest->id;
        $answer->pretest_answer = $request->pretest_answer1;
        if($request->pretest_score1 == null){
        $answer->pretest_score = 0;
        }else{
            $answer->pretest_score = $request->pretest_score1;
        }
        $answer->save();

        $answer = new Pretest_answer();
        $answer->question_id = $pretest->id;
        $answer->pretest_answer = $request->pretest_answer2;
        if($request->pretest_score2 == null){
            $answer->pretest_score = 0;
            }else{
                $answer->pretest_score = $request->pretest_score2;
            }
        $answer->save();

        $answer = new Pretest_answer();
        $answer->question_id = $pretest->id;
        $answer->pretest_answer = $request->pretest_answer3;
        if($request->pretest_score3 == null){
            $answer->pretest_score = 0;
            }else{
                $answer->pretest_score = $request->pretest_score3;
            }
        $answer->save();

        $answer = new Pretest_answer();
        $answer->question_id = $pretest->id;
        $answer->pretest_answer = $request->pretest_answer4;
        if($request->pretest_score4 == null){
            $answer->pretest_score = 0;
            }else{
                $answer->pretest_score = $request->pretest_score4;
            }
        $answer->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Hello";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cname = Courses::where('id',"LIKE",$id)->first();
        $crid = $id;
        $pretest = Pretest::where('courses_id','=',$id)->get();
        return view('admins.coursemanage.coursePretest.index',['cname' => $cname, 'pretest' => $pretest, 'crid'=> $crid]);
    }

    public function editsecond($id)
    {
        return "Hello";
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
        $ans = DB::table('pretest_answer')->where('question_id','=',$id);
        $pretest = DB::table('pretest')->where('id','=',$id);

        $ans -> delete();
        $pretest -> delete();

        return redirect()->back();
    }
}
