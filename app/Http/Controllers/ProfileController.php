<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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
        $userlogin = Auth::user();
        $users = User::find($userlogin->id);
        $profile = Profile::find($userlogin->id_role);
        return view('profile', ['users' => $users, 'profile' => $profile]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request   $request)
    {
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
        $users = User::with('profile')->find($id);
        return view('profile', ['users' => $users]);
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
        $user = User::find($id);
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->email = $request->email;
        $user->tel = $request->tel;

        $password_old = Hash::make($request->password_old);
        if (!empty($request->password_old)) {
            if (!($user->password == $password_old)) {
                return redirect()->action('ProfileController@index')->with('status', "รหัสไม่ตรงกัน $password_old");
            } else {
                return redirect()->action('ProfileController@index')->with('status', "รหัสตรงกัน $password_old");
            }
        }
        if ($request->hasFile('image')) {
            // delete old file before update
            if ($user->pic_profile != 'nopic.jpg') {
                File::delete(public_path() . '\\images\\' . $user->pic_profile);
                File::delete(public_path() . '\\images\\resize\\' . $user->pic_profile);
            }
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/', $filename);
            Image::make(public_path() . '/images/' . $filename)->resize(50, 50)->save(public_path() . '/images/resize/' .
                $filename);
            $user->pic_profile = $filename;
        }
        $user->save();
        return redirect()->action('ProfileController@index')->with('status', 'บันทึกข้อมูลแล้ว');
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
