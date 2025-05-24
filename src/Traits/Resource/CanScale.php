<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait CanScale
{
    /**
     * Scale the current resource to a specific number of replicas.
     *
     * @param  int  $replicas
     * @return \RenokiCo\PhpK8s\Kinds\K8sScale
     */
    public function scale(int $replicas): \RenokiCo\PhpK8s\Kinds\K8sScale
    {
        $scaler = $this->scaler();

        $scaler->setReplicas($replicas)->update();

        return $scaler;
    }
}
