<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArraysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:arrays {messages?*} {--emails=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $messages = $this->input->getArgument('messages');
        $emails = $this->input->getOption('emails');

        dd($messages, $emails);
    }
}
