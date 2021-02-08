<?php

namespace Pterodactyl\Http\Controllers\Admin\Settings;

use Illuminate\View\View;
use Pterodactyl\Http\Controllers\Controller;

class BrandingController extends Controller
{
    /**
     * Render the UI for branding Panel settings.
     */
    public function index(): View
    {
        return view('admin.settings.branding');
    }
}
