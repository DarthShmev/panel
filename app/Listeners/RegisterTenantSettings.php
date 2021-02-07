<?php

namespace Pterodactyl\Listeners;

use Pterodactyl\Providers\SettingsServiceProvider;
use Tenancy\Identification\Events\Switched;

class RegisterTenantSettings
{
    /**
     * Register the settings for each tenant's panel only
     * once the tenant has been identified.
     *
     * @param Switched $event
     * @return void
     */
    public function handle(Switched $event)
    {
        if (!is_null($event->tenant)) {
            app()->register(SettingsServiceProvider::class);
        }
    }
}
