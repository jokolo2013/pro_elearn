<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $id;
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
        $lessons = new Lessons();
        $lessons->id_course = $request->id_course;
        $lessons->lesson_sort = $request->lesson_sort;
        $lessons->lesson_name = $request->lesson_name;
        $lessons->save();
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

        $lessons = DB::table('courses')
        ->join('lessons', 'courses.id', '=', 'lessons.id_course')
        ->where('lessons.id_course', '=', $id)
        ->orderBy('lesson_sort', 'asc')
        ->get();
        // $lessons = Lessons::where('id_course','=',$id)->orderBy('lesson_sort', 'asc')->get();
        $lsID = $id;
        $cname = DB::table('courses')->where('id','=',$id)->first();
        return view('admins.coursemanage.lessonsmanage.edit',['lessons'=>$lessons, 'id' => $lsID, 'cname'=>$cname]);
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
        $lessons = Lessons::find($id);
        $lessons->lesson_sort = $request->lesson_sort;
        $lessons->lesson_name = $request->lesson_name;
        $lessons->save();
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
        $lessons = Lessons::find($id);
        $lessons -> delete();
        return redirect()->back();
    }
}
