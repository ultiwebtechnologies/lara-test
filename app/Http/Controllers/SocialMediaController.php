<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class SocialMediaController extends Controller
{
    public function sendTelegramMessage(Request $request){
		$data['subject'] = $request->input('subject');
		$data['message'] = $request->input('message');
		$data['posts']	 = Posts::get()->orderBy('id', 'DESC');


		$post 			= new Posts;
		$post->user 	= '1';
		$post->status 	= '1';
		$post->subject 	= $request->input('subject');
		$post->message 	= $request->input('message');
		$post->save();



		return view('post', $data);
	}

	public function listTweets(){
		$data['posts'] = Posts::orderBy('id', 'DESC')->get();
		// dd($data['posts']);
		return view('post', $data);
	}
}
