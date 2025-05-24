<?php

namespace RenokiCo\PhpK8s\Kinds;

use RenokiCo\PhpK8s\Contracts\InteractsWithK8sCluster;
use RenokiCo\PhpK8s\Contracts\Watchable;

class K8sEvent extends K8sResource implements InteractsWithK8sCluster, Watchable
{
    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static ?string $kind = 'Event';

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static bool $namespaceable = true;

    /**
     * Attach the given resource to the event.
     *
     * @param  \RenokiCo\PhpK8s\Kinds\K8sResource  $resource
     * @return $this
     */
    public function setResource(K8sResource $resource): self
    {
        $object = [
            'apiVersion' => $resource->getApiVersion(),
            'kind' => $resource::getKind(),
            'name' => $resource->getName(),
            'namespace' => $resource->getNamespace(),
        ];

        if ($resourceVersion = $resource->getResourceVersion()) {
            $object['resourceVersion'] = $resourceVersion;
        }

        return $this->setAttribute('involvedObject', $object);
    }

    /**
     * Emit or update the event with the given name.
     *
     * @param  array  $query
     * @return \RenokiCo\PhpK8s\Kinds\K8sResource
     *
     * @throws \RenokiCo\PhpK8s\Exceptions\KubernetesAPIException
     */
    public function emitOrUpdate(array $query = ['pretty' => 1]): K8sResource
    {
        return $this->createOrUpdate($query);
    }
}
