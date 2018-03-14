<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
Use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
            $this->middleware('admin');
    }

    public function index()
    {
        $users=User::all();

        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'

        ]);
//        $user=new User;
//
//        $user->name=$request->input('name');
//        $user->email=$request->input('email');
//        $user->password=$request->input('password');
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

       $user->save();
        $profile=Profile::create([
            'user_id'=>$user->id
        ]);

       return redirect('/users');
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
        //
    }
    public function admin($id){
            $user=User::find($id);

            $user->admin=1;
            $user->save();
            Session::flash('success', 'Successfully changed user permisssion');
            return redirect()->back();
    }
    public function notAdmin($id){
        $user=User::find($id);

        $user->admin=0;
        $user->save();
        Session::flash('success', 'Successfully changed user permisssion');
        return redirect()->back();
    }
}
