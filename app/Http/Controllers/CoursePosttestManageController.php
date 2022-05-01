<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Posttest;
use App\Posttest_answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursePosttestManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $posttest = new Posttest();
        $posttest->courses_id = $request->courses_id;
        $posttest->posttest_question = $request->posttest_question;
        $posttest->save();

        for($i=1;$i<=4;$i++){
        $answer = new Posttest_answer();
        $answer->question_id = $posttest->id;
        $answer->posttest_answer = $request->input("posttest_answer$i");
        if(($request->input("posttest_score$i")) == null){
        $answer->posttest_score = 0;
        }else{
            $answer->posttest_score = $request->input("posttest_score$i");
        }
        $answer->save();
        }
        return redirect("CoursePosttestManage/$request->courses_id/edit")->with('add', 'เพิ่มข้อมูลสำเร็จ');
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
        $cname = Courses::where('id',"LIKE",$id)->first();
        $crid = $id;
        $posttest = Posttest::where('courses_id','=',$id)->get();
        return view('admins.coursemanage.coursePosttest.index',['cname' => $cname, 'posttest' => $posttest, 'crid'=> $crid]);
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
        $ans = DB::table('posttest_answer')->where('question_id','=',$id);
        $posttest = DB::table('posttest')->where('id','=',$id);

        $ans -> delete();
        $posttest -> delete();

        return redirect()->back();
    }
}
