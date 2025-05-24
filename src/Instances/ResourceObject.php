<?php

namespace RenokiCo\PhpK8s\Instances;

use RenokiCo\PhpK8s\Kinds\K8sResource;

class ResourceObject extends ResourceMetric
{
    /**
     * The resource metric type.
     *
     * @var string
     */
    protected static string $type = 'Object';

    /**
     * Attach a resource to the object.
     *
     * @param  \RenokiCo\PhpK8s\Kinds\K8sResource  $resource
     * @return $this
     */
    public function setResource(K8sResource $resource): self
    {
        return $this->setAttribute('object.describedObject', [
            'apiVersion' => $resource->getApiVersion(),
            'kind' => $resource::getKind(),
            'name' => $resource->getName(),
        ]);
    }

    /**
     * Set average utilization for the metric.
     *
     * @param int|string $utilization
     * @return $this
     */
    public function averageUtilization(int|string $utilization = 50): self
    {
        return $this->setAttribute('object.target.type', 'Utilization')
            ->setAttribute('object.target.averageUtilization', $utilization);
    }

    /**
     * Get the average utilization.
     *
     * @return string|int|float
     */
    public function getAverageUtilization(): float|int|string
    {
        return $this->getAttribute('object.target.averageUtilization', 0);
    }

    /**
     * Set average value for the metric.
     *
     * @param float|int|string $value
     * @return $this
     */
    public function averageValue(float|int|string $value): self
    {
        return $this->setAttribute('object.target.type', 'AverageValue')
            ->setAttribute('object.target.averageValue', $value);
    }

    /**
     * Get the average value size.
     *
     * @return string|int|float
     */
    public function getAverageValue(): float|int|string
    {
        return $this->getAttribute('object.target.averageValue');
    }

    /**
     * Set the specific value for the metric.
     *
     * @param float|int|string $value
     * @return $this
     */
    public function value(float|int|string $value): self
    {
        return $this->setAttribute('object.target.type', 'Value')
            ->setAttribute('object.target.value', $value);
    }

    /**
     * Get the value size.
     *
     * @return string|int|float
     */
    public function getValue(): float|int|string
    {
        return $this->getAttribute('object.target.value');
    }

    /**
     * Get the resource target type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->getAttribute('object.target.type', 'Utilization');
    }

    /**
     * Set the resource metric name.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): self
    {
        return $this->setAttribute('object.metric.name', $name);
    }

    /**
     * Get the resource metric name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('object.metric.name');
    }
}
