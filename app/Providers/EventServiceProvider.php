<?php

namespace Pterodactyl\Providers;

use Pterodactyl\Events\Server\Installed as ServerInstalledEvent;
use Pterodactyl\Listeners\ConfigureTenantConnection;
use Pterodactyl\Listeners\ConfigureTenantDatabase;
use Pterodactyl\Listeners\ConfigureTenantMigrations;
use Pterodactyl\Listeners\ConfigureTenantSeeds;
use Pterodactyl\Listeners\RegisterTenantSettings;
use Pterodactyl\Listeners\ResolveTenantConnection;
use Pterodactyl\Notifications\ServerInstalled as ServerInstalledNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Tenancy\Affects\Connections\Events\Drivers\Configuring as ConfiguringTenantConnection;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Hooks\Database\Events\Drivers\Configuring as ConfiguringTenantDatabase;
use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;
use Tenancy\Identification\Events\Switched;

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
        ConfigureMigrations::class => [
            ConfigureTenantMigrations::class,
        ],
        ConfigureSeeds::class => [
            ConfigureTenantSeeds::class,
        ],
        Switched::class => [
            RegisterTenantSettings::class,
        ],
    ];
}
