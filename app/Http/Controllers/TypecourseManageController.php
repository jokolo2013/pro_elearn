<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses_type;
use Illuminate\Support\Facades\Auth;

class TypecourseManageController extends Controller
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
        if (Auth::user()->id_role == 1){
            return redirect('admins')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        $Courses_type = Courses_type::all();
        return view('admins.typecoursemanage.index',['Courses_type'=> $Courses_type]);
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
        $type_course = Courses_type::where('courses_type_name','LIKE',$request->input('courses_type_name'))->first();
        if($type_course == NULL){
            $type = new Courses_type();
            $type->courses_type_name = $request->input('courses_type_name');
            $type->save();
            return redirect("managetypecourses")->with('add', "เพิ่มประเภทคอร์สสำเร็จ");
        }else{
            return redirect("managetypecourses")->with('faile', "ประเภทคอร์สนี้มีอยู่แล้ว");
        }
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
        //
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
        $type_course = Courses_type::where('courses_type_name','LIKE',$request->input('courses_type_name'))->first();
        if($type_course == NULL){
            $type = Courses_type::find($id);
            $type->courses_type_name = $request->input('courses_type_name');
            $type->save();
            return redirect("managetypecourses")->with('add', "แก้ไขประเภทคอร์สสำเร็จ");
        }else{
            return redirect("managetypecourses")->with('faile', "ประเภทคอร์สนี้มีอยู่แล้ว");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Courses_type::find($id);
        $type -> delete();
        return redirect("managetypecourses")->with('delete', "ลบประเภทคอร์สนี้แล้ว");
    }
}
