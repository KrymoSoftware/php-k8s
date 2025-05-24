<?php

namespace RenokiCo\PhpK8s\Kinds;

class K8sClusterRole extends K8sRole
{
    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static ?string $kind = 'ClusterRole';

    /**
     * Whether the resource has a namespace.
     *
     * @var bool
     */
    protected static bool $namespaceable = false;
}
