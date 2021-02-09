<?php

namespace Pterodactyl\Listeners;

use Tenancy\Hooks\Migration\Events\ConfigureMigrations;

class ConfigureTenantMigrations
{
    /**
     * Configure migrations for the tenant.
     *
     * @param ConfigureMigrations $event
     * @return void
     */
    public function handle(ConfigureMigrations $event)
    {
        $event->path(database_path('migrations/tenant'));
    }
}
