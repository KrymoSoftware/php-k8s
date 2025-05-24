<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasMountOptions
{
    use HasSpec;

    /**
     * Set the mount options.
     *
     * @param  array  $mountOptions
     * @return $this
     */
    public function setMountOptions(array $mountOptions): self
    {
        return $this->setSpec('mountOptions', $mountOptions);
    }

    /**
     * Get the mount options.
     *
     * @return array
     */
    public function getMountOptions(): array
    {
        return $this->getSpec('mountOptions', []);
    }
}
