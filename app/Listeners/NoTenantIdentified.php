<?php

namespace Pterodactyl\Listeners;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tenancy\Identification\Events\NothingIdentified;
use Pterodactyl\Exceptions\Http\InvalidDomainProvidedException;

class NoTenantIdentified
{
    private Request $request;

    /**
     * NoTenantIdentified Constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param NothingIdentified $event
     * @return RedirectResponse|void
     */
    public function handle(NothingIdentified $event)
    {
        // For API calls return an exception which gets rendered nicely in the API response.
        $uri = rtrim($this->request->getRequestUri(), '/') . '/';
        if ($this->request->isJson() || Str::startsWith($uri, '/api')) {
            throw new InvalidDomainProvidedException();
        }
    }
}
