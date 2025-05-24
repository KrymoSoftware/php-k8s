<?php

namespace RenokiCo\PhpK8s\Kinds;

use RenokiCo\PhpK8s\Contracts\InteractsWithK8sCluster;
use RenokiCo\PhpK8s\Contracts\Podable;
use RenokiCo\PhpK8s\Contracts\Scalable;
use RenokiCo\PhpK8s\Contracts\Watchable;
use RenokiCo\PhpK8s\Traits\Resource\CanScale;
use RenokiCo\PhpK8s\Traits\Resource\HasMinimumSurge;
use RenokiCo\PhpK8s\Traits\Resource\HasPods;
use RenokiCo\PhpK8s\Traits\Resource\HasReplicas;
use RenokiCo\PhpK8s\Traits\Resource\HasSelector;
use RenokiCo\PhpK8s\Traits\Resource\HasSpec;
use RenokiCo\PhpK8s\Traits\Resource\HasStatus;
use RenokiCo\PhpK8s\Traits\Resource\HasStatusConditions;
use RenokiCo\PhpK8s\Traits\Resource\HasTemplate;

class K8sDeployment extends K8sResource implements
    InteractsWithK8sCluster,
    Podable,
    Scalable,
    Watchable
{
    use CanScale;
    use HasMinimumSurge;
    use HasPods {
        podsSelector as protected customPodsSelector;
    }
    use HasReplicas;
    use HasSelector;
    use HasSpec;
    use HasStatus;
    use HasStatusConditions;
    use HasTemplate;

    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static ?string $kind = 'Deployment';

    /**
     * The default version for the resource.
     *
     * @var string
     */
    protected static string $defaultVersion = 'apps/v1';

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static bool $namespaceable = true;

    /**
     * Set the updating strategy for the deployment.
     *
     * @param  string  $strategy
     * @param int|string $maxUnavailable
     * @param int|string $maxSurge
     * @return $this
     */
    public function setUpdateStrategy(string $strategy, int|string $maxUnavailable = '25%', int|string $maxSurge = '25%'): self
    {
        if ($strategy === 'RollingUpdate') {
            $this->setSpec('updateStrategy.rollingUpdate.maxUnavailable', $maxUnavailable);
            $this->setSpec('updateStrategy.rollingUpdate.maxSurge', $maxSurge);
        }

        return $this->setSpec('updateStrategy.type', $strategy);
    }

    /**
     * Get the selector for the pods that are owned by this resource.
     *
     * @return array
     */
    public function podsSelector(): array
    {
        if ($podsSelector = $this->customPodsSelector()) {
            return $podsSelector;
        }

        return [
            'deployment-name' => $this->getName(),
        ];
    }

    /**
     * Get the available replicas.
     *
     * @return int
     */
    public function getAvailableReplicasCount(): int
    {
        return $this->getStatus('availableReplicas', 0);
    }

    /**
     * Get the ready replicas.
     *
     * @return int
     */
    public function getReadyReplicasCount(): int
    {
        return $this->getStatus('readyReplicas', 0);
    }

    /**
     * Get the total desired replicas.
     *
     * @return int
     */
    public function getDesiredReplicasCount(): int
    {
        return $this->getStatus('replicas', 0);
    }

    /**
     * Get the total unavailable replicas.
     *
     * @return int
     */
    public function getUnavailableReplicasCount(): int
    {
        return $this->getStatus('unavailableReplicas', 0);
    }
}
