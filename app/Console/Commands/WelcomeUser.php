<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeUser extends Command
{
    protected $signature = 'welcome:user {name?}';

    
    public function handle(\App\User $user)
    {
        //dd($user);

        // Get current user and other operation goes here


        $message = "Welcome ". $this->argument("name");
        \Log::info($message);
    }
}
