<?php

namespace Pterodactyl\Listeners;

use Pterodactyl\Providers\SettingsServiceProvider;
use Tenancy\Facades\Tenancy;

class RegisterTenantSettings
{
    /**
     * Register the settings for each tenant's panel only
     * once the tenant has been identified.
     *
     * @return void
     */
    public function handle()
    {
        if (Tenancy::getTenant()) {
            app()->register(SettingsServiceProvider::class);
        }
    }
}
