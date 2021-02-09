<?php

namespace Pterodactyl\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant as BaseTenant;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;

class Tenant extends Model implements BaseTenant, IdentifiesByHttp
{
    use AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => \Tenancy\Tenant\Events\Created::class,
        'updated' => \Tenancy\Tenant\Events\Updated::class,
        'deleted' => \Tenancy\Tenant\Events\Deleted::class,
    ];

    /**
     * Fields that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain'
    ];

    /**
     * Specify whether the tenant model is matching the request.
     *
     * @param Request $request
     * @return Tenant
     */
    public function tenantIdentificationByHttp(Request $request): ?BaseTenant
    {
        return $this->query()
            ->where('domain', $request->getHttpHost())
            ->first();
    }
}
