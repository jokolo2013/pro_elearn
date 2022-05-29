<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Pretest;
use App\Pretest_answer;
use App\Pretest_result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultPretestController extends Controller
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
        $courses = Courses::find($id);
        $pretestQ = Pretest::where('courses_id','=',$id)->get();
        $pretedtA = Pretest_answer::all();
        foreach($pretedtA as $A){
            $pretestR[$A->id] = array("count" => Pretest_result::where('pretest_answer_id','=',$A->id)->count(),"pretest_answer_id"=>$A->id);
        }
        return view('admins.coursemanage.resultpretest.index',['courses'=>$courses,'pretestQ' => $pretestQ, 'pretestA' => $pretedtA, 'pretedtA'=> $pretedtA, 'pretestR' => $pretestR]);
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
