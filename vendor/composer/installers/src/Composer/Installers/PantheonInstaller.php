<?php

namespace Composer\Installers;

class PantheonInstaller extends BaseInstaller
{
    /** @var array<string, string> */
    protected $locations = array(
        'script' => 'private/scripts/quicksilver/{$name}',
        'module' => 'private/scripts/quicksilver/{$name}',
    );
}
