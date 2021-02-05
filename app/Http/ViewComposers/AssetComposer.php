<?php

namespace Pterodactyl\Http\ViewComposers;

use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Pterodactyl\Services\Helpers\AssetHashService;

class AssetComposer
{
    /**
     * @var \Pterodactyl\Services\Helpers\AssetHashService
     */
    private $assetHashService;

    /**
     * AssetComposer constructor.
     */
    public function __construct(AssetHashService $assetHashService)
    {
        $this->assetHashService = $assetHashService;
    }

    /**
     * Provide access to the asset service in the views.
     */
    public function compose(View $view)
    {
        $view->with('asset', $this->assetHashService);
        $view->with('siteConfiguration', [
            'name' => config('app.name') ?? 'Pterodactyl',
            'version' => $this->versionData(),
            'location' => config('app.location') ?? 'develop',
            'locale' => config('app.locale') ?? 'en',
            'recaptcha' => [
                'enabled' => config('recaptcha.enabled', false),
                'siteKey' => config('recaptcha.website_key') ?? '',
            ],
            'analytics' => config('app.analytics') ?? '',
        ]);
    }

    /**
     * Return version information for the footer.
     *
     * @return array
     */
    protected function versionData()
    {
        return Cache::remember('git-version', 5, function () {
            if (file_exists(base_path('.git/HEAD'))) {
                $head = explode(' ', file_get_contents(base_path('.git/HEAD')));

                if (array_key_exists(1, $head)) {
                    $path = base_path('.git/' . trim($head[1]));
                }
            }

            if (isset($path) && file_exists($path)) {
                return [
                    'version' => substr(file_get_contents($path), 0, 8),
                    'is_git' => true,
                ];
            }

            return [
                'version' => config('app.version'),
                'is_git' => false,
            ];
        });
    }
}
