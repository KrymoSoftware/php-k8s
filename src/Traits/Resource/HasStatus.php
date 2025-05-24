<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasStatus
{
    /**
     * Get the status parameter with default.
     *
     * @param  string  $name
     * @param mixed|null $default
     * @return mixed
     */
    public function getStatus(string $name, mixed $default = null): mixed
    {
        return $this->getAttribute("status.{$name}", $default);
    }
}
