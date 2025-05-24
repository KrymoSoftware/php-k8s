<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

use RenokiCo\PhpK8s\Kinds\K8sNamespace;

trait HasNamespace
{
    use HasAttributes;

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static bool $namespaceable = false;

    /**
     * The default namespace for the resource.
     *
     * @var string
     */
    public static string $defaultNamespace = 'default';

    /**
     * Overwrite, at runtime, the default namespace for the resource.
     *
     * @param  string  $version
     * @return void
     */
    public static function setDefaultNamespace(string $namespace): void
    {
        static::$defaultNamespace = $namespace;
    }

    /**
     * Set the namespace of the resource.
     *
     * @param string|\RenokiCo\PhpK8s\Kinds\K8sNamespace $namespace
     * @return $this
     */
    public function setNamespace(string|K8sNamespace $namespace): self
    {
        if (! static::$namespaceable) {
            return $this;
        }

        if ($namespace instanceof K8sNamespace) {
            $namespace = $namespace->getName();
        }

        $this->setAttribute('metadata.namespace', $namespace);

        return $this;
    }

    /**
     * Alias for ->setNamespace().
     *
     * @param string|\RenokiCo\PhpK8s\Kinds\K8sNamespace $namespace
     * @return $this
     */
    public function whereNamespace(string|K8sNamespace $namespace): self
    {
        return $this->setNamespace($namespace);
    }

    /**
     * Get the namespace for the resource.
     *
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->getAttribute('metadata.namespace', static::$defaultNamespace);
    }
}
