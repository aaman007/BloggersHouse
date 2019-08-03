<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Log;

class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('banned');
    }
    public function index()
    {
        $announcements = Announcement::orderBy('created_at','desc')->paginate(7);
        return view('announcements.index')->with('announcements',$announcements);
    }
    public function show($id)
    {
        $announcement = Announcement::find($id);

        return view('announcements.show')->with('announcement',$announcement);
    }
}
