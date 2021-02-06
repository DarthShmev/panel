<?php

namespace Pterodactyl\Providers;

use Pterodactyl\Events\Server\Installed as ServerInstalledEvent;
use Pterodactyl\Listeners\ConfigureTenantConnection;
use Pterodactyl\Listeners\ConfigureTenantDatabase;
use Pterodactyl\Listeners\ResolveTenantConnection;
use Pterodactyl\Notifications\ServerInstalled as ServerInstalledNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Tenancy\Affects\Connections\Events\Drivers\Configuring as ConfiguringTenantConnection;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Hooks\Database\Events\Drivers\Configuring as ConfiguringTenantDatabase;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ServerInstalledEvent::class => [
            ServerInstalledNotification::class,
        ],
        ConfiguringTenantDatabase::class => [
            ConfigureTenantDatabase::class,
        ],
        Resolving::class => [
            ResolveTenantConnection::class,
        ],
        ConfiguringTenantConnection::class => [
            ConfigureTenantConnection::class,
        ],
    ];
}
