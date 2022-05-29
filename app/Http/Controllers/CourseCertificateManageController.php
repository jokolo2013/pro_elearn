<?php

namespace App\Http\Controllers;

use App\Certificate_setting;
use App\Certificate_template;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseCertificateManageController extends Controller
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
        $courses = Courses::find($id);
        $certificate_setting = Certificate_setting::where('courses_id','=',$id)->first();
        $template_public = Certificate_template::where('publish','=',1)->get();
        $template_private = Certificate_template::where('publish','=',0)->where('user_id','=',Auth::user()->id)->get();
        return view('admins.coursemanage.certificatemanage.index',['courses'=>$courses, 'certificate_setting'=>$certificate_setting , 'template_public'=>$template_public, 'template_private' => $template_private]);
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
        $certificate = Certificate_setting::find($id);
        $certificate->certificate_template_id = $request->input('certificate_template_id');
        $certificate->description = $request->input('description');
        $certificate->save();
        return redirect("CourseCertificateManage/$request->courses_id/edit")->with('success', "แก้ไขเกียรติบัตรสำเร็จ");

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
