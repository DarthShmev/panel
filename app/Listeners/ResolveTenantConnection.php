<?php

namespace Pterodactyl\Listeners;

use Tenancy\Affects\Connections\Contracts\ProvidesConfiguration;
use Tenancy\Affects\Connections\Events\Drivers\Configuring;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Identification\Contracts\Tenant;

class ResolveTenantConnection implements ProvidesConfiguration
{
    /**
     * Get a configuration for the tenant connection.
     *
     * @param Resolving $event
     * @return ResolveTenantConnection
     */
    public function handle(Resolving $event)
    {
        return $this;
    }

    public function configure(Tenant $tenant): array
    {
        $config = [];

        event(new Configuring($tenant, $config, $this));

        return $config;
    }
}
