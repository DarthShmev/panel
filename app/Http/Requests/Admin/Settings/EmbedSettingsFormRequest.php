<?php

namespace Pterodactyl\Http\Requests\Admin\Settings;

use Pterodactyl\Http\Requests\Admin\AdminFormRequest;

class EmbedSettingsFormRequest extends AdminFormRequest
{
    /**
     * Return all of the rules to apply to this request's data.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ogp:site_name' => 'required|string|max:191',
            'ogp:description' => 'required|string|max:191',
            'ogp:theme_colour' => 'required|string|max:191|regex:/^#([0-9A-F]{3}){1,2}$/i',
            'ogp:image' => 'required|url|max:191',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'ogp:site_name' => 'Site Name',
            'ogp:description' => 'Description',
            'ogp:theme_colour' => 'Theme Colour',
            'ogp:image' => 'Image',
        ];
    }
}
