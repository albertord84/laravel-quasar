<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Users;

class EmailSigninUser extends Mailable
{
    use Queueable, SerializesModels;
    public $User;
    public $Subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $User, String $Subject)
    {
      $this->User=$User;
      $this->Subject=$Subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this
            ->from('system@socialhub.pro', 'Physiback') //pegar desde o .env  env("MAIL_USERNAME")
            ->subject($this->Subject)
            ->view('mails.SigninUser', ['User' => $this->User]);
    }
}
