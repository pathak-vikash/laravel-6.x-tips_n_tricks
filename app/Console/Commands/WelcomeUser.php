<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WelcomeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'welcome:user {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Greeting to user.';


    protected $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(\App\User $user)
    {
        parent::__construct();

        $this->user = $user;
        \Log::info("welcome command reloaded");
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //dd($this->user);

        // Get current user and other operation goes here

        
        $message = "Welcome ". $this->argument("name");
        \Log::info($message);
    }
}
