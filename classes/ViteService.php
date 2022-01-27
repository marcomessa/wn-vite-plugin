<?php

namespace Marcomessa\Vite\Classes;

use Winter\Storm\Support\Facades\Http;
use Winter\Storm\Support\Facades\Config;

class ViteService
{
    /** @var string */
    protected $manifestPath;

    /** @var mixed */
    protected $viteInput;

    /** @var array */
    protected $files;

    public function __construct()
    {
        $this->manifestPath = env(
            'VITE_MANIFEST',
            Config::get('marcomessa.vite::manifest', false)
        );
        $this->viteInput = env(
            'VITE_INPUT',
            Config::get('marcomessa.vite::input', false)
        );
    }

    /**
     * @return array|null
     */
    public function cssPaths(): ?array
    {
        return isset($this->getFiles()['css'])
            ? $this->getFiles()['css']
            : null;
    }

    /**
     * @return string|null
     */
    public function jsPath(): ?string
    {
        return $this->getFiles()['file'];
    }

    /**
     * @return array|null
     */
    protected function parseManifest(): ?array
    {
        return json_decode(file_get_contents($this->manifestPath), true)[$this->viteInput];
    }

    /**
     * @return array|null
     */
    protected function getFiles(): ?array
    {
        if (!$this->files) {
            $this->files = $this->parseManifest();
        }

        return $this->files;
    }

    public function isDevServerRunning(): bool
    {
        try {
            if (Http::get("http://localhost:3000")->code) {
                return true;
            };
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
