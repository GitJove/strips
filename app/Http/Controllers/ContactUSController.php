<?php

namespace App\Http\Controllers;

use App\ContactUS;
use Illuminate\Http\Request;
use Mail;

class ContactUSController extends Controller
{
    public function contactUS()
	{
	    return view('contactUS');
	}

	public function contactUSPost(Request $request)
	{
		$this->validate($request, [
				'name' => 'required',
				'email' => 'required|email',
				'message' => 'required'
			]);

		ContactUS::create($request->all());

		Mail::send('email',
		       array(
		           'name' => $request->get('name'),
		           'email' => $request->get('email'),
		           'user_message' => $request->get('message')
		       ), function($message)
		   {
		       // $message->from('profimak@gmail.com');
		       $message->to('profimak.admin@cloudways.com', 'Админ')->subject('Профимак Клиент контакт');
		   });

		return back()->with('status', 'Вашата порака ќе биде земена во предвид! Профимак ви благодари.');
	}
}
