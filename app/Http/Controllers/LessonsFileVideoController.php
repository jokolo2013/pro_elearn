<?php

namespace App\Http\Controllers;
use File;
use App\Courses;
use App\Lesson_files;
use App\Lesson_link;
use App\Lesson_video;
use App\Lessons;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonsFileVideoController extends Controller
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
    public function index($id)
    {
        if (Auth::user()->id_role == 2){
            return redirect('index')->with('error', 'ไม่มีสิธิ์เข้าถึง');
        }
        return view('admins.coursemanage.lessonsmanage.lessonsFileVideo.index');
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
        $lessonsID = Null;
        if (isset($request->Video_Type)) {
            $lessonsVideo = new Lesson_video();
            $lessonsVideo->lessons_id = $request->Video_lessons_id;
            $lessonsVideo->id_course = $request->Video_id_course;
            $lessonsVideo->lesson_video_name = $request->lesson_video_name;
            $cuteVideoLink = Str::substr($request->lesson_video_path,17,50);
            $lessonsVideo->lesson_video_path = "https://www.youtube.com/embed/$cuteVideoLink";
            $lessonsID = $request->Video_lessons_id;
            $lessonsVideo->save();
        }

        if (isset($request->Link_Type)) {
            $lessonsLink = new Lesson_link();
            $lessonsLink->lessons_id = $request->Link_lessons_id;
            $lessonsLink->id_course = $request->Link_id_course;
            $lessonsLink->lesson_link_name = $request->lesson_link_name;
            $lessonsLink->lesson_link_path = $request->lesson_link_path;
            $lessonsID = $request->Link_lessons_id;
            $lessonsLink->save();
        }

        if (isset($request->File_Type)) {
            $lessonsFile = new Lesson_files();
            $lessonsFile->lessons_id = $request->File_lessons_id;
            $lessonsID = $request->File_lessons_id;
            $lessonsFile->id_course = $request->File_id_course;
            $lessonsFile->lesson_files_name = $request->lesson_files_name;
            // $lessonsFile->lesson_files_path = $request->lesson_files_path;
            if ($request->file('lesson_files_path')->isValid()) {
                $path = $request->lesson_files_path->path();
                $extension = $request->lesson_files_path->extension();
                $clientOriginalName = $request->lesson_files_path->getClientOriginalName();
                $newFileName = time() . $clientOriginalName;
                $uploadedFile = $request->file('lesson_files_path');


                // Save File to local drive
                Storage::putFileAs('public/'.$request->Course_name, $uploadedFile, $newFileName);

                //Save File to Photo table

                $lessonsFile->lesson_files_path = $newFileName;
            }
           $lessonsFile->save();
        }

        return redirect("lessonsfilevideo/$lessonsID/edit")->with('status', 'เพิ่มข้อมูลสำเร็จ');
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
        $lessonsName = Lessons::where('id', '=', $id)->first();
        $courseName = Courses::where('id', '=', $lessonsName->id_course)->first();
        $lessonsFile = Lesson_files::where('lessons_id', '=', $id)->get();
        $lessonsVideo = Lesson_video::where('lessons_id', '=', $id)->get();
        $lesssonsLink = Lesson_link::where('lessons_id', '=', $id)->get();
        return view('admins.coursemanage.lessonsmanage.lessonsFileVideo.index', ['lessonsFile' => $lessonsFile, 'lessonsVideo' => $lessonsVideo, 'lesssonsLink' => $lesssonsLink, 'lessonsName' => $lessonsName, 'courseName' => $courseName]);
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
        $lessonsID = Null;
        if (isset($request->Video_Type)) {
            $lessonsVideo = Lesson_video::find($id);
            $lessonsVideo->lesson_video_name = $request->lesson_video_name;
            $lessonsID = $request->Video_lessons_id;
            if($lessonsVideo->lesson_video_path != $request->lesson_video_path){
            $cuteVideoLink = Str::substr($request->lesson_video_path,17,50);
            $lessonsVideo->lesson_video_path = "https://www.youtube.com/embed/$cuteVideoLink";
            }
            $lessonsVideo->save();
        }
        if (isset($request->File_Type)) {
            $lessonsFile = Lesson_files::find($id);
            $lessonsID = $request->File_lessons_id;
            $lessonsFile->lesson_files_name = $request->lesson_files_name;

            if($lessonsFile->lesson_files_path == $request->lesson_files_path){
                $lessonsFile->save();
            }else{
            if ($request->file('lesson_files_path')) {
                File::delete(public_path(). '\\storage\\'.$request->Course_name.'/'.$lessonsFile->lesson_files_path);
                $path = $request->lesson_files_path->path();
                $extension = $request->lesson_files_path->extension();
                $clientOriginalName = $request->lesson_files_path->getClientOriginalName();
                $newFileName = time() . $clientOriginalName;
                $uploadedFile = $request->file('lesson_files_path');

                // Save File to local drive
                Storage::putFileAs('public/'.$request->Course_name, $uploadedFile, $newFileName);

                //Save File to Photo table

                $lessonsFile->lesson_files_path = $newFileName;
                $lessonsFile->save();
            }
        }
        $lessonsFile->save();
        }

        if (isset($request->Link_Type)) {
            $lessonsLink = Lesson_link::find($id);
            $lessonsID = $request->Link_lessons_id;
            $lessonsLink->lesson_link_name = $request->lesson_link_name;
            $lessonsLink->lesson_link_path = $request->lesson_link_path;
            $lessonsLink->save();
        }

        return redirect("lessonsfilevideo/$lessonsID/edit")->with('status', 'อัพเดทข้อมูลสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $lessonsID = Null;
        if(isset($request->delete_Video)){
            $lessons_video = Lesson_video::find($id);
            $lessonsID = $request->Video_lessons_id;
            $lessons_video -> delete();
        }
        if(isset($request->delete_File)){
            $lessons_file = Lesson_files::find($id);
            $lessonsID = $request->File_lessons_id;
            if($lessons_file->lesson_files_path != null){
                File::delete(public_path(). '\\storage\\'.$request->Course_name.'/'.$lessons_file->lesson_files_path);
            }
            $lessons_file -> delete();
        }
        if(isset($request->delete_Link)){
            $lessons_link = Lesson_link::find($id);
            $lessonsID = $request->Link_lessons_id;
            $lessons_link -> delete();
        }
        return redirect("lessonsfilevideo/$lessonsID/edit")->with('status', 'ลบข้อมูลสำเร็จ');
    }
}
