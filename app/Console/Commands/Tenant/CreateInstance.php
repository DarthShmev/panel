<?php

namespace Pterodactyl\Console\Commands\Tenant;

use Illuminate\Console\Command;
use Pterodactyl\Models\Tenant;

class CreateInstance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'p:instance:create {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new tenant instance.';

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
     */
    public function handle()
    {
        $tenant = Tenant::firstOrCreate([
            'domain' => $this->argument('domain'),
        ]);

        $this->info('Created a tenant with the domain: ' . $tenant->domain);
    }
}
