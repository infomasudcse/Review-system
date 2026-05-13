<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:deletenull {--dry-run : Only show the count, do not delete}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes users who have not verified their email within 10 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting cleanup of unverified users...');

        // 1. Build the query
        $query = User::whereNull('email_verified_at')
                     ->where('created_at', '<', now()->subDays(10));

        // 2. Count them first for the report
        $count = $query->count();

        if ($count === 0) {
            $this->comment('No stale unverified users found.');
            return 0;
        }

		if ($this->option('dry-run')) {
			$this->warn("[DRY RUN] Would have deleted {$count} users.");
			return 0;
		}

        // 3. Perform the delete
        $query->delete();

        $this->info("Successfully deleted {$count} unverified users.");

        return 0;
    }
}
