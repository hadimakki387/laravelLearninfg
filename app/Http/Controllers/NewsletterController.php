<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function newsLetter()
    {
        request()->validate([
            'email' => ['required', 'email'],
        ]);

        $mailchimp = new \MailchimpMarketing\ApiClient();
        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us21',
        ]);
        try {
            $response = $mailchimp->lists->addListMember('a4407b043e', [
                'email_address' => request('email'),
                'status' => 'subscribed',
            ]);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' =>
                    'This email could not be added to our newsletter list.',
            ]);
        }
        return redirect('/')->with(
            'success',
            'successfully signed up to the newsletter'
        );
    }
}
