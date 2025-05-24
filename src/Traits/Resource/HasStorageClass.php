<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

use RenokiCo\PhpK8s\Kinds\K8sStorageClass;

trait HasStorageClass
{
    /**
     * Set the storageClassName parameter.
     *
     * @param \RenokiCo\PhpK8s\Kinds\K8sStorageClass|string $storageClass
     * @return $this
     */
    public function setStorageClass(K8sStorageClass|string $storageClass): self
    {
        if ($storageClass instanceof K8sStorageClass) {
            $storageClass = $storageClass->getName();
        }

        return $this->setSpec('storageClassName', $storageClass);
    }

    /**
     * Get the storageClassName parameter.
     *
     * @return string|null
     */
    public function getStorageClass(): ?string
    {
        return $this->getSpec('storageClassName', null);
    }
}
