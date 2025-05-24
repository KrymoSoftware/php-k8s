<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasVersion
{
    use HasAttributes;

    /**
     * The default version for the resource.
     *
     * @var string
     */
    protected static $defaultVersion = 'v1';

    /**
     * Overwrite, at runtime, the stable version of the resource.
     *
     * @param  string  $version
     * @return void
     */
    public static function setDefaultVersion(string $version): void
    {
        static::$defaultVersion = $version;
    }

    /**
     * Get the default version of the resource.
     *
     * @return string
     */
    public static function getDefaultVersion(): string
    {
        return static::$defaultVersion;
    }

    /**
     * Get the API version of the resource.
     * This function can be overwritten at the resource
     * level, depending which are the defaults.
     *
     * @return string
     */
    public function getApiVersion(): string
    {
        return $this->getAttribute('apiVersion', static::$defaultVersion);
    }
}
