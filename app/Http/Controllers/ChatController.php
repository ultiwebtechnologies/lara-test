<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Hash;


class ChatController extends Controller
{
    public function chat(Request $request, $name = null){

		if($request->input('chatMessage')){
			
			$post 			= new Posts;
			$post->user 	= $request->input('user');
			$post->status 	= '1';
			$post->subject 	= 'ChatMessage';
			$post->message 	= $request->input('chatMessage');
			$post->save();
		}

		$data['whoami'] = $name;

		
		

		$data['chats'] = Posts::orderBy('id', 'asc')->get();
		return view('chat', $data);
	}

	public function vedaChat(){

		return view('vedaChat');
	}

	public function vedaChatApp(Request $request, $name = null){

		if($request->input('name')){
			
			$post 			= new Posts;
			$post->user 	= $request->input('name');
			$post->status 	= '1';
			$post->subject 	= 'ChatMessage';
			$post->message 	= $request->input('message');
			$post->save();
		}

		$data['whoami'] = $name;	
		$data['chats'] = Posts::orderBy('id', 'asc')->get();
		$data['a'] = $name;
		return view('vedaChat', $data);
		
	}


	public function registrationGet(Request $request){
	
		return view('reg');
	}

	public function registrationPost(Request $request){


		if($request->input('username')){
			
			$user 			= new UserAuth;
			$user->fullname 	= $request->input('fullname');
			$user->usename 		= $request->input('username');
			$user->password 	= Hash::make($request->input('password'));
			$result = $user->save();
		}

		dd("registration completed");
	}


	public function loginGet(Request $request){
		return view('login');
	}


	public function loginPost(Request $request){

		$data = UserAuth::where(['usename' => $request->input('username')])->first();

		$result['db_username'] = $data->usename;
		$result['db_password'] = $data->password;

		$result['given_username'] =  $request->input('username');
		$result['given_password'] =  $request->input('password');
		
		$result['outcome'] = Hash::check($result['given_password'], $result['db_password']);

		if($result['outcome'] == true){
			$result['message'] = "Success, you will be redirected to the account";

		}else{
			$result['message'] = "Username & password are incorrect, please try again";

		}


		dd($result);
	}

}
