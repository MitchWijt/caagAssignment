<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class HourlyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a hourly email to specified email address';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        mail(env('TEMP_EMAIL'), 'Hourly email', 'This is an hourly email');
    }
}
