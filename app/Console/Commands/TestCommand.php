<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UploadFileService;

class TestCommand extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service = new UploadFileService();
        $service->uploadToProfilePictures();
        return Command::SUCCESS;
    }
}
