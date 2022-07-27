<?php
namespace Composer\Installers;

class EzPlatformInstaller extends BaseInstaller
{
    protected $locations = array(
        'meta-assets' => 'assets/ezplatform/',
        'assets' => 'assets/ezplatform/{$name}/',
    );
}
