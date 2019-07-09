<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;

class ProfileController extends Controller
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
        $user = auth()->user();
        $posts = Post::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(7);

        $data = [
            'user' => $user ,
            'posts' => $posts
        ];
        return view('profile.index')->with($data);
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
        /// Not Required for these website

        $this->validate($request,[
            'profile_picture' => 'required|image|max:1999'
        ]);
          // Filename with extension
        $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
        // JustFilename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Just Extention
        $extension = $request->file('profile_picture')->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload Image
        $path = $request->file('profile_picture')->storeAs('public/profile_pictures',$filenameToStore);
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $user->profile_picture = $filenameToStore;
        $user->save();
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
            'profile_picture' => 'required|image|max:1999'
        ]);
          // Filename with extension
        $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
        // JustFilename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        // Just Extention
        $extension = $request->file('profile_picture')->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $filename . '_' . time() . '.' . $extension;
        // Upload Image
        $path = $request->file('profile_picture')->storeAs('public/profile_pictures',$filenameToStore);
        
        $user = User::find($id);
        if($user->profile_pricture != 'noname.jpg'){
            Storage::delete('public/profile_pictures/'.$user->profile_picture);
        }
        $user->profile_picture = $filenameToStore;
        $user->save();

        return redirect('/profile')->with('success','Profile Picture Updated');
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
