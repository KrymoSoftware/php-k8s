<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasStatusPhase
{
    use HasStatus;

    /**
     * Get the status phase for the current resource.
     *
     * @return string|null
     */
    public function getPhase(): ?string
    {
        return $this->getStatus('phase', null);
    }
}
