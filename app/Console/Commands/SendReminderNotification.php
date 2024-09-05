<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\RemindUsers;
use Illuminate\Console\Command;

class SendReminderNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:remind-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily reminders to all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $users->notify(new RemindUsers());
        }

        $this->info('Daily reminders have been sent');
    }
}
