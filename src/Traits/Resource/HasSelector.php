<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasSelector
{
    /**
     * Set the selectors.
     *
     * @param  array  $selectors
     * @return $this
     */
    public function setSelectors(array $selectors = []): self
    {
        return $this->setSpec('selector', $selectors);
    }

    /**
     * Get the selectors.
     *
     * @return array
     */
    public function getSelectors(): array
    {
        return $this->getSpec('selector', []);
    }
}
