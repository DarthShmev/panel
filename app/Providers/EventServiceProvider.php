<?php

namespace Pterodactyl\Providers;

use Tenancy\Identification\Events\Identified;
use Pterodactyl\Listeners\NoTenantIdentified;
use Pterodactyl\Listeners\ConfigureTenantSeeds;
use Pterodactyl\Listeners\RegisterTenantSettings;
use Tenancy\Affects\Connections\Events\Resolving;
use Pterodactyl\Listeners\ConfigureTenantDatabase;
use Pterodactyl\Listeners\ResolveTenantConnection;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;
use Pterodactyl\Listeners\ConfigureTenantConnection;
use Pterodactyl\Listeners\ConfigureTenantMigrations;
use Tenancy\Identification\Events\NothingIdentified;
use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use Pterodactyl\Events\Server\Installed as ServerInstalledEvent;
use Pterodactyl\Notifications\ServerInstalled as ServerInstalledNotification;
use Tenancy\Hooks\Database\Events\Drivers\Configuring as ConfiguringTenantDatabase;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Tenancy\Affects\Connections\Events\Drivers\Configuring as ConfiguringTenantConnection;
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
        NothingIdentified::class => [
            NoTenantIdentified::class,
        ],
    ];
}
