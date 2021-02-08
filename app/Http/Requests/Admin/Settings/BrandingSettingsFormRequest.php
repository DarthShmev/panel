<?php

namespace Pterodactyl\Http\Requests\Admin\Settings;

use Pterodactyl\Http\Requests\Admin\AdminFormRequest;

class BrandingSettingsFormRequest extends AdminFormRequest
{
    /**
     * Return all of the rules to apply to this request's data.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'auth_logo' => 'sometimes|required|image|mimes:png,jpg,svg|max:250',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'auth_logo' => 'Auth Screen Logo',
        ];
    }
}
