<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class MailChimpController extends Controller
{
    public function __construct(
        public Newsletter $newsletter
    )
    {
    }

    public function ping()
    {
        $response = $this->newsletter->mailchimp->lists->getAllLists();
        ddd($response);
    }

    public function signUp(Request $request)
    {
        $data = $request->validate([
            'email' => ['email', 'required']
        ]);

        try {
            $response = $this->newsletter->subscribe($request->email);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
               'email' => 'this email could not be added to out newsletter list',
            ]);
        }

        return redirect(route('home'))->with('success', 'you are signed up for our newsletter');
    }
}
