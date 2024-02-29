<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
class SendForgetPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $email;
    /**
     * Create a new job instance.
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $token = Str::random(40);
            $domain = URL::to('/');
            $url =  'http://localhost:8000/reset-password?token=' . $token;

            $data['url'] = $url;
            $data['email'] = $this->email;
            $data['title'] = trans('lang.Password_Reset');
            $data['body'] = trans('lang.Please click on below link to reset your password._');

            // dd($data);

            Mail::send('forgetPasswordMail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });

            $dateTime = Carbon::now()->format('Y-m-d H:i:s');

            PasswordReset::updateOrCreate(
                ['email' => $this->email],
                [
                    'email' => $this->email,
                    'token' => $token,
                    'created_at' => $dateTime
                ]
            );
        }
    }

}
