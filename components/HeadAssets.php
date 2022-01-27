<?php namespace Marcomessa\Vite\Components;

use Cms\Classes\ComponentBase;
use Marcomessa\Vite\Facades\Vite;

class HeadAssets extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'HeadAssets Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['devServerIsRunning'] = Vite::isDevServerRunning();
        $this->page['cssPaths'] = Vite::cssPaths();
        $this->page['jsPath'] = Vite::jsPath();
    }
}
