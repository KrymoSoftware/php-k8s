<?php

namespace RenokiCo\PhpK8s\Kinds;

use RenokiCo\PhpK8s\Contracts\InteractsWithK8sCluster;
use RenokiCo\PhpK8s\Contracts\Watchable;
use RenokiCo\PhpK8s\Traits\Resource\HasSelector;
use RenokiCo\PhpK8s\Traits\Resource\HasSpec;
use RenokiCo\PhpK8s\Traits\Resource\HasStatus;

class K8sPodDisruptionBudget extends K8sResource implements InteractsWithK8sCluster, Watchable
{
    use HasSelector;
    use HasSpec;
    use HasStatus;

    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static $kind = 'PodDisruptionBudget';

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static $namespaceable = true;

    /**
     * The default version for the resource.
     *
     * @var string
     */
    protected static $defaultVersion = 'policy/v1';

    /**
     * Set the maximum unavailable pod budget and
     * remove the minAvailable field.
     *
     * @param int|string $amount
     * @return $this
     */
    public function setMaxUnavailable(int|string $amount): self
    {
        return $this->setSpec('maxUnavailable', $amount)
            ->removeSpec('minAvailable');
    }

    /**
     * Get the maximum unavilable pod budget.
     *
     * @return string|int|null
     */
    public function getMaxUnavailable(): int|string|null
    {
        return $this->getSpec('maxUnavailable');
    }

    /**
     * Set the minimum available pod budget and
     * remove the maxUnavailable field.
     *
     * @param int|string $amount
     * @return $this
     */
    public function setMinAvailable(int|string $amount): self
    {
        return $this->setSpec('minAvailable', $amount)
            ->removeSpec('maxUnavailable');
    }

    /**
     * Get the minimum avilable pod budget.
     *
     * @return string|int|null
     */
    public function getMinAvailable(): int|string|null
    {
        return $this->getSpec('minAvailable');
    }
}
