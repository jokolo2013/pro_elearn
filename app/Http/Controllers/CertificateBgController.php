<?php

namespace App\Http\Controllers;

use App\Certificate_template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CertificateBgController extends Controller
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
            $certi_bg = DB::table('certificate_template')
                    ->join('users','certificate_template.user_id', '=', 'users.id')
                    ->where('certificate_template.user_id' , '=' , Auth::user()->id)
                    ->select('certificate_template.*','users.Fname','users.Lname')
                    ->get();
            return view('admins.coursemanage.certificatebackground.index',['certi_bg'=>$certi_bg]);
        }
        $certi_bg = DB::table('certificate_template')
                    ->join('users','certificate_template.user_id', '=', 'users.id')
                    ->select('certificate_template.*','users.Fname','users.Lname')
                    ->get();
        return view('admins.coursemanage.certificatebackground.index',['certi_bg'=>$certi_bg]);
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
        $certificate_background = new Certificate_template();
        $certificate_background->user_id = Auth::user()->id;
        $certificate_background->publish = $request->publish;
        if ($request->hasFile('certificate_image_background')) {
            $filename = Str::random(10) . '.' . $request->file('certificate_image_background')->getClientOriginalExtension();
            $request->file('certificate_image_background')->move(public_path() . '/images/certificate_template/', $filename);
            Image::make(public_path() . '/images/certificate_template/' . $filename);
            $certificate_background->certificate_image_background = $filename;
        }
        $certificate_background->save();
        return redirect("certificatebackground")->with('status', 'เพิ่มพื้นหลังเกียรติบัตรสำเร็จ');
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
        $certificate_background = Certificate_template::find($id);
        $certificate_background -> delete();
        return redirect("certificatebackground")->with('status', 'ลบข้อมูลสำเร็จ');
    }
}
