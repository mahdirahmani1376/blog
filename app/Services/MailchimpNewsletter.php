<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(
        public ApiClient $mailchimp
    )
    {}

    public function subscribe(string $email,string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->mailchimp->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
