<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasAccessModes
{
    use HasSpec;

    /**
     * Set the access modes.
     *
     * @param  array  $accessModes
     * @return $this
     */
    public function setAccessModes(array $accessModes): self
    {
        return $this->setSpec('accessModes', $accessModes);
    }

    /**
     * Get the access modes.
     *
     * @return array
     */
    public function getAccessModes(): array
    {
        return $this->getSpec('accessModes', []);
    }
}
