<?php

namespace Laratube\Http\Controllers;

use Illuminate\Http\Request;
use Laratube\Channel;

class UploadVideoController extends Controller
{
    /**
     * UploadVideoController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('channels.upload');
    }

    public function store(Channel $channel)
    {
        return $channel->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channels/{$channel->id}"),

        ]);
    }
}
