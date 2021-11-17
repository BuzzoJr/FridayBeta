<?php
/** Helper to send email to reset password. **/

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //dd($details);
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS',$this->details['email']),env('MAIL_FROM_NAME',$this->details['email']))
                ->subject(trans('admiko.reset_email_subject'))
                ->view('admin/auth/passwords/sendemail');
    }
}