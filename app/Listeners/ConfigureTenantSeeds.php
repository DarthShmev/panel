<?php

namespace Pterodactyl\Listeners;

use Database\Seeders\EggSeeder;
use Database\Seeders\NestSeeder;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;

class ConfigureTenantSeeds
{
    /**
     * Configure seeds for the tenant.
     *
     * @param ConfigureSeeds $event
     * @return void
     */
    public function handle(ConfigureSeeds $event)
    {
        $event->seed(NestSeeder::class);
        $event->seed(EggSeeder::class);
    }
}
