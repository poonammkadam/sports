<?php

namespace App\Http\Controllers;

use App\ContactUS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUSController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUS()
    {
        return view('contactUS');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        ContactUS::create($request->all());
        Mail::send('email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'message' => $request->get('message')
            ), function ($message) use ($request) {
                $message->from($request->get('email'));
                $message->to(config('app.ADMIN_EMAIL'), 'Admin')->subject($request->get('subject'));
            });
        return back()->with('success', 'Thanks for contacting us!');
    }
}
