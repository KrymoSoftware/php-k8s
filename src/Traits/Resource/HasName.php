<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasName
{
    use HasAttributes;

    /**
     * Set the name.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->setAttribute('metadata.name', $name);

        return $this;
    }

    /**
     * Alias for ->setName().
     *
     * @param  string  $name
     * @return $this
     */
    public function whereName(string $name): self
    {
        return $this->setName($name);
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('metadata.name');
    }
}
