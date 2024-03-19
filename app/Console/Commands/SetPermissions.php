<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-permissions {directory : The directory to set permissions for}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directory = $this->argument('directory');

        if (File::isDirectory($directory)) {
            // Set permissions for files and directories
            File::chmod($directory, 0755, true);

            $this->info("Permissions set successfully for directory: $directory");
        } else {
            $this->error("Directory '$directory' does not exist.");
        }
    }
}
