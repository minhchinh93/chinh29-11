<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\regmail;
use Illuminate\Http\Request;

class queueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    protected $input;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$input)
    {
        //
        $this->email= $email;
        $this->input= $input;


    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Request $request)
    {
        //
        Mail::to($this->email)->send(new regmail($this->input));
    }
}
