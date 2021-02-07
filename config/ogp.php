<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Site Name
    |--------------------------------------------------------------------------
    | Header or name of your panel.
    */

    'site_name' => env('OG_SITE_NAME', 'Start your dream host'),

    /*
    |--------------------------------------------------------------------------
    | Description
    |--------------------------------------------------------------------------
    | A one to two sentence description of your panel.
    */

    'description' => env('OG_DESCRIPTION', 'Pterodactyl is an open-source game server management panel design with security in mind.'),

    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    | An image URL which should represent your panel within the embed.
    */

    'image' => env('OG_IMAGE', 'https://cdn.pterodactyl.io/logos/new/pterodactyl_logo_transparent.png'),

    /*
    |--------------------------------------------------------------------------
    | Theme Colour
    |--------------------------------------------------------------------------
    | A hex code for the embed colour.
    */

    'theme_colour' => env('OG_THEME_COLOUR', '#0e4688'),
];
