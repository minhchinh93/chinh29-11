<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class regmail extends Mailable
{
    use Queueable, SerializesModels;
    public $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        //
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->view('mail')
                    ->from('teamAmato@gmail.com','nguyen minh chinh')
                    ->subject('[code] thư xác nhận tài khoản' )
                    ->with($this->input);
    }
}
