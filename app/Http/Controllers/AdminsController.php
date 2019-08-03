<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Post;
use App\User;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $users = User::count();
        $posts = Post::count();
        $announcements = Announcement::count();
        $admins = User::where('admin','1')->count();

        $data = [
            'users' => $users,
            'posts' => $posts,
            'announcements' => $announcements,
            'admins' => $admins
        ];
        return view('admin.index')->with($data);
    }
    public function logs()
    {
        return view('admin.logs');
    }
    public function showPosts()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('admin.posts')->with('posts',$posts);
    }
    public function showUsers()
    {
        $users = User::orderBy('name','asc')->paginate(10);
        return view('admin.users')->with('users',$users);
    }
    public function showAnnouncements()
    {
        $announcements = Announcement::orderBy('created_at','desc')->paginate(10);
        return view('admin.announcements')->with('announcements',$announcements);
    }
    public function showAdmins()
    {
        $admins = User::where('admin',1)->orderBy('name','asc')->paginate(10);
        return view('admin.admins')->with('admins',$admins);
    }
    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        return redirect('admin-panel/users')->with('success','Admin Added Successfully');
    }
    public function removeAdmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        return redirect('admin-panel/admins')->with('success','Admin Removed Successfully');

    }
    public function banUser($id)
    {
        $user = User::find($id);
        $user->banned = 1;
        $user->save();
        return redirect('admin-panel/users')->with('success','User Banned Successfully');

    }
    public function removeBan($id)
    {
        $user = User::find($id);
        $user->banned = 0;
        $user->save();
        return redirect('admin-panel/users')->with('success','Ban Removed Successfully');

    }
    public function viewUser($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id',$id)->count();
        $data = [
            'user' => $user ,
            'posts' => $posts
        ];
        return view('admin.viewUser')->with($data);
    }
    public function viewAdmin($id)
    {
        $admin = User::find($id);
        $posts = Post::where('user_id',$id)->count();
        $data = [
            'admin' => $admin ,
            'posts' => $posts
        ];
        return view('admin.viewAdmin')->with($data);
    }

    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('admin.showAnnouncement')->with('announcement',$announcement);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_announcement');
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
            'title' => 'required|max:140',
            'body' => 'required' ,
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){

            // Get filename with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $filenameToStore = $filename . "_" . time() . "." . $extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        }
        else{
            $filenameToStore = "noname.jpg";
        }

        // Create Post
        $announcement = new Announcement;
        $announcement->title = $request->input('title');
        $announcement->body = $request->input('body');
        $announcement->user_id = auth()->user()->id;
        $announcement->cover_image = $filenameToStore;
        $announcement->save();

        return redirect('admin-panel/announcements')->with('success','Post Created');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement = Announcement::find($id);

        return view('admin.editAnnouncement')->with('announcement',$announcement);
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
            'title' => 'required|max:140', 
            'body' => 'required' ,
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){

            // Get filename with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get Extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $filenameToStore = $filename . "_" . time() . "." . $extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        }
        // Update Post
        $announcement = Announcement::find($id);
        $announcement->title = $request->input('title');
        $announcement->body = $request->input('body');

        if($request->hasFile('cover_image')){
            if($announcement->cover_image != 'noname.jpg')
                Storage::delete('public/cover_images/'.$announcement->cover_image);
            $announcement->cover_image = $filenameToStore;
        }
        $announcement->save();

        return redirect('/admin-panel/announcements')->with('success','Announcement Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        
        if($announcement->cover_image != 'noname.jpg'){
            Storage::delete('public/cover_images/'.$announcement->cover_image);
        }
        $announcement->delete();
        return redirect('/admin-panel/announcements')->with('success','Announcements Removed');
    }
}
