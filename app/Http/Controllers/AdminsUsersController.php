<?php

namespace App\Http\Controllers;

use App\AdminsUsers;
use App\Profile;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AdminsUsersController extends Controller
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
        // $users = DB::table('users')
        // ->join('role', 'users.id_role', '=', 'role.id')
        // ->select('users.*', 'role.status_name',)
        // ->orderBy('created_at', 'desc')->paginate(10);
        $users = AdminsUsers::with('profile')->orderBy('id', 'desc')->paginate(7);
        return view('admins/editusers/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.editusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new AdminsUsers();
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->Gender = $request->Gender;
        $user->email = $request->email;
        $user->id_role = $request->id_role;
        $user->tel = $request->tel;
        $user->password = Hash::make( $request->password);

        if ($request->hasFile('image')) {
            $filename = Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/', $filename);
            Image::make(public_path() . '/images/' . $filename)->resize(50, 50)->save(public_path() . '/images/resize/' . $filename);
            $user->pic_profile = $filename;
        } else {
            $user->pic_profile = 'nopic.jpg';
        }
        $user->save();
        return redirect()->action('AdminsUsersController@index')->with('status', 'บันทึกข้อมูลแล้ว');
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
        $users = AdminsUsers::findOrFail($id);
        $se1 = '';
        $se2 = '';
        $se3 = '';
        if ($users->Gender == 1) {
            $se1 = 'checked';
        }
        if ($users->Gender == 2) {
            $se2 = 'checked';
        }
        if ($users->Gender == 3) {
            $se3 = 'checked';
        }
        return view('admins.editusers.edit', ['users' => $users,'se1'=> $se1,'se2'=>$se2,'se3'=>$se3]);
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
        $user = AdminsUsers::find($id);
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->Gender = $request->Gender;
        $user->email = $request->email;
        $user->id_role = $request->id_role;
        $user->tel = $request->tel;

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
        return redirect()->action('AdminsUsersController@index')->with('status', 'บันทึกข้อมูลแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = AdminsUsers::find($id);
        if($user->pic_profile != 'nopic.jpg'){
            File::delete(public_path(). '\\images\\'. $user->pic_profile);
            File::delete(public_path(). '\\images\\resize\\'. $user->pic_profile);
        }

        $user -> delete();
        return redirect()->action('AdminsUsersController@index');
    }
}
