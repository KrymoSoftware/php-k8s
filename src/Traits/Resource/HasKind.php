<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasKind
{
    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static ?string $kind = null;

    /**
     * Get the resource kind.
     *
     * @return string|null
     */
    public static function getKind(): ?string
    {
        return static::$kind;
    }
}
