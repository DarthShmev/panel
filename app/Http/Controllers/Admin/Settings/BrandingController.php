<?php

namespace Pterodactyl\Http\Controllers\Admin\Settings;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Prologue\Alerts\AlertsMessageBag;
use Illuminate\Contracts\Console\Kernel;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Contracts\Repository\SettingsRepositoryInterface;
use Pterodactyl\Http\Requests\Admin\Settings\BrandingSettingsFormRequest;

class BrandingController extends Controller
{
    /**
     * @var \Prologue\Alerts\AlertsMessageBag
     */
    private $alert;

    /**
     * @var \Illuminate\Contracts\Console\Kernel
     */
    private $kernel;

    /**
     * @var \Pterodactyl\Contracts\Repository\SettingsRepositoryInterface
     */
    private $settings;

    /**
     * BrandingController constructor.
     */
    public function __construct(
        AlertsMessageBag $alert,
        Kernel $kernel,
        SettingsRepositoryInterface $settings
    ) {
        $this->alert = $alert;
        $this->kernel = $kernel;
        $this->settings = $settings;
    }

    /**
     * Render the UI for embed Panel settings.
     */
    public function index(): View
    {
        return view('admin.settings.branding');
    }

    /**
     * Handle settings update.
     *
     * @throws \Pterodactyl\Exceptions\Model\DataValidationException
     * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
     */
    public function update(BrandingSettingsFormRequest $request): RedirectResponse
    {
        if ($request->hasFile('auth_logo')) {
            $image = $request->file('auth_logo');

            if ($image->isValid()) {
                $imageName = time() . '.' . $image->extension();

                if (app()->environment('local')) {
                    $uploadedLogo = $image->move(public_path('uploaded_assets/logos'), $imageName);
                } else {
                    // TODO - Handle storage in production (s3)
                }

                // Save the logo's path as a panel setting for future use.
                $this->settings->set('settings::branding:auth_logo', '/uploaded_assets/logos/' . $imageName);
            }
        }

        $this->kernel->call('queue:restart');
        $this->alert->success('Panel settings have been updated successfully and the queue worker was restarted to apply these changes.')->flash();

        return redirect()->route('admin.settings.branding');
    }
}
