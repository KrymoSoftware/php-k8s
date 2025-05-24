<?php

namespace RenokiCo\PhpK8s\Instances;

class ResourceMetric extends Instance
{
    /**
     * The resource metric type.
     *
     * @var string
     */
    protected static string $type = 'Resource';

    /**
     * Set the resource type to CPU.
     *
     * @return $this
     */
    public function cpu(): self
    {
        return $this->setMetric('cpu');
    }

    /**
     * Set the resource type to memory.
     *
     * @return $this
     */
    public function memory(): self
    {
        return $this->setMetric('memory');
    }

    /**
     * Set average utilization for the metric.
     *
     * @param int|string $utilization
     * @return $this
     */
    public function averageUtilization(int|string $utilization = 50): self
    {
        return $this->setAttribute('resource.target.type', 'Utilization')
            ->setAttribute('resource.target.averageUtilization', $utilization);
    }

    /**
     * Get the average utilization.
     *
     * @return string|int|float
     */
    public function getAverageUtilization(): float|int|string
    {
        return $this->getAttribute('resource.target.averageUtilization', 0);
    }

    /**
     * Set average value for the metric.
     *
     * @param float|int|string $value
     * @return $this
     */
    public function averageValue(float|int|string $value): self
    {
        return $this->setAttribute('resource.target.type', 'AverageValue')
            ->setAttribute('resource.target.averageValue', $value);
    }

    /**
     * Get the average value size.
     *
     * @return string|int|float
     */
    public function getAverageValue(): float|int|string
    {
        return $this->getAttribute('resource.target.averageValue');
    }

    /**
     * Set the specific value for the metric.
     *
     * @param float|int|string $value
     * @return $this
     */
    public function value(float|int|string $value): self
    {
        return $this->setAttribute('resource.target.type', 'Value')
            ->setAttribute('resource.target.value', $value);
    }

    /**
     * Get the value size.
     *
     * @return string|int|float
     */
    public function getValue(): float|int|string
    {
        return $this->getAttribute('resource.target.value');
    }

    /**
     * Get the resource target type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->getAttribute('resource.target.type', 'Utilization');
    }

    /**
     * Alias for ->setName().
     *
     * @param  string  $name
     * @return $this
     */
    public function setMetric(string $name): self
    {
        return $this->setName($name);
    }

    /**
     * Set the resource metric name.
     *
     * @param  string  $name
     * @return $this
     */
    public function setName(string $name): self
    {
        return $this->setAttribute('resource.name', $name);
    }

    /**
     * Get the resource metric name.
     *
     * @return $this
     */
    public function getName(): self
    {
        return $this->getAttribute('resource.name');
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_merge($this->attributes, [
            'type' => static::$type,
        ]);
    }
}
