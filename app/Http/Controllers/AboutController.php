<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsAdmin;
use GeneralSettings;
use Illuminate\Http\Request;
use Mail;

class AboutController extends Controller
{
    public function index($lang) {
        app()->setLocale($lang);
        return view('about.index');
    }

    public function contact(GeneralSettings $generalSettings, Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:2000'
        ]);

        Mail::to($generalSettings->contact_email)->send(new ContactUsAdmin(request('name'), request('email'), request('message')));

        return redirect()->back()->with('status', 'Message was sent successfully');
    }
}
