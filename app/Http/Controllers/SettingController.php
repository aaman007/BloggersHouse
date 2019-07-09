<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('settings.index')->with('user',$user);
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
        $this->validate($request,[
            'name' => 'required',
            'currentPassword' => 'required',
            'newPassword' => 'nullable|min:8',
            'institution' => 'nullable|min:0'
        ]);

        $user = User::find($id);
        $currentPassword = $request->input('currentPassword');
        $newPassword = $request->input('newPassword');

        if(Hash::check($currentPassword,$user->password)){
            $user->name = $request->input('name');
            if($request->input('institution') != '')
                $user->institution = $request->input('institution');
            else
                $user->institution = '';
            if($newPassword != '')
                $user->password = Hash::make($newPassword);
            $user->save();
            return redirect('/settings')->with('success','Profile Updated');
        }
        else
            return redirect('/settings')->with('error','Wrong Current Password');
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

// $2y$10$ZkJ7m0yg/7KAbWhXfxW5TOm7d6rU4KIy8NureE6P3AuW.3/tGTKe6
// $2y$10$TcNyQtdhoegyi2pLvB2isO8L7.6teDPM0fzbK963pq9VZcbFQytm.