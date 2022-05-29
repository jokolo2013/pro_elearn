<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Pretest;
use App\Pretest_answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnsManageController extends Controller
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
        if (Auth::user()->id_role == 2){
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
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

        for ($i = 1; $i <= 4; $i++) {
            $ans = Pretest_answer::find($request->input("id$i"));
            $ans->pretest_answer = $request->input("pretest_answer$i");
            if ($request->input("pretest_score$i") == null) {
                $ans->pretest_score = 0;
            } else {
                $ans->pretest_score = $request->input("pretest_score$i");
            }
            $ans->save();
        }
        $pretest->save();
        return redirect("CoursePretestManage/$request->courses_id/edit")->with('status', 'แก้ไขสำเร็จ');
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
