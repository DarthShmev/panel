<?php

namespace Pterodactyl\Listeners;

use Pterodactyl\Providers\SettingsServiceProvider;

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
        app()->register(SettingsServiceProvider::class);
    }
}
