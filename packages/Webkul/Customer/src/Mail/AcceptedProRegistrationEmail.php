<?php

namespace Webkul\Customer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\Debugbar\Facades\Debugbar;

class AcceptedProRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new mailable instance.
     *
     * @param  array  $data
     * @param  string  $mailType
     * @return void
     */
    public function __construct(
        public $data
    )
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->mailToCustomer();
    }

    /**
     * Mail to customer.
     *
     * @return $this
     */
    public function mailToCustomer()
    {
        return $this->from(core()->getSenderEmailDetails()['email'], core()->getSenderEmailDetails()['name'])
            ->to($this->data['email'])
            ->subject(trans('shop::app.mail.customer.registration.customer-pro-registration-accepted'))
            ->view('shop::emails.customer.pro-registration-accepted')->with('data', $this->data);
    }
}
