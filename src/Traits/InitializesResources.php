<?php

namespace RenokiCo\PhpK8s\Traits;

use RenokiCo\PhpK8s\Kinds\K8sClusterRole;
use RenokiCo\PhpK8s\Kinds\K8sClusterRoleBinding;
use RenokiCo\PhpK8s\Kinds\K8sConfigMap;
use RenokiCo\PhpK8s\Kinds\K8sCronJob;
use RenokiCo\PhpK8s\Kinds\K8sDaemonSet;
use RenokiCo\PhpK8s\Kinds\K8sDeployment;
use RenokiCo\PhpK8s\Kinds\K8sEvent;
use RenokiCo\PhpK8s\Kinds\K8sHorizontalPodAutoscaler;
use RenokiCo\PhpK8s\Kinds\K8sIngress;
use RenokiCo\PhpK8s\Kinds\K8sJob;
use RenokiCo\PhpK8s\Kinds\K8sMutatingWebhookConfiguration;
use RenokiCo\PhpK8s\Kinds\K8sNamespace;
use RenokiCo\PhpK8s\Kinds\K8sNode;
use RenokiCo\PhpK8s\Kinds\K8sPersistentVolume;
use RenokiCo\PhpK8s\Kinds\K8sPersistentVolumeClaim;
use RenokiCo\PhpK8s\Kinds\K8sPod;
use RenokiCo\PhpK8s\Kinds\K8sPodDisruptionBudget;
use RenokiCo\PhpK8s\Kinds\K8sRole;
use RenokiCo\PhpK8s\Kinds\K8sRoleBinding;
use RenokiCo\PhpK8s\Kinds\K8sSecret;
use RenokiCo\PhpK8s\Kinds\K8sService;
use RenokiCo\PhpK8s\Kinds\K8sServiceAccount;
use RenokiCo\PhpK8s\Kinds\K8sStatefulSet;
use RenokiCo\PhpK8s\Kinds\K8sStorageClass;
use RenokiCo\PhpK8s\Kinds\K8sValidatingWebhookConfiguration;
use RenokiCo\PhpK8s\KubernetesCluster;

trait InitializesResources
{
    /**
     * Create a new Node kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sNode
     */
    public static function node(?KubernetesCluster $cluster = null, array $attributes = []): K8sNode
    {
        return new K8sNode($cluster, $attributes);
    }

    /**
     * Create a new Event kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sEvent
     */
    public static function event(?KubernetesCluster $cluster = null, array $attributes = []): K8sEvent
    {
        return new K8sEvent($cluster, $attributes);
    }

    /**
     * Create a new Namespace kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sNamespace
     */
    public static function namespace(?KubernetesCluster $cluster = null, array $attributes = []): K8sNamespace
    {
        return new K8sNamespace($cluster, $attributes);
    }

    /**
     * Create a new ConfigMap kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sConfigMap
     */
    public static function configmap(?KubernetesCluster $cluster = null, array $attributes = []): K8sConfigMap
    {
        return new K8sConfigMap($cluster, $attributes);
    }

    /**
     * Create a new Secret kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sSecret
     */
    public static function secret(?KubernetesCluster $cluster = null, array $attributes = []): K8sSecret
    {
        return new K8sSecret($cluster, $attributes);
    }

    /**
     * Create a new Ingress kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sIngress
     */
    public static function ingress(?KubernetesCluster $cluster = null, array $attributes = []): K8sIngress
    {
        return new K8sIngress($cluster, $attributes);
    }

    /**
     * Create a new Service kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sService
     */
    public static function service(?KubernetesCluster $cluster = null, array $attributes = []): K8sService
    {
        return new K8sService($cluster, $attributes);
    }

    /**
     * Create a new StorageClass kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sStorageClass
     */
    public static function storageClass(?KubernetesCluster $cluster = null, array $attributes = []): K8sStorageClass
    {
        return new K8sStorageClass($cluster, $attributes);
    }

    /**
     * Create a new PersistentVolume kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sPersistentVolume
     */
    public static function persistentVolume(?KubernetesCluster $cluster = null, array $attributes = []): K8sPersistentVolume
    {
        return new K8sPersistentVolume($cluster, $attributes);
    }

    /**
     * Create a new PersistentVolumeClaim kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sPersistentVolumeClaim
     */
    public static function persistentVolumeClaim(?KubernetesCluster $cluster = null, array $attributes = []): K8sPersistentVolumeClaim
    {
        return new K8sPersistentVolumeClaim($cluster, $attributes);
    }

    /**
     * Create a new Pod kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sPod
     */
    public static function pod(?KubernetesCluster $cluster = null, array $attributes = []): K8sPod
    {
        return new K8sPod($cluster, $attributes);
    }

    /**
     * Create a new StatefulSet kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sStatefulSet
     */
    public static function statefulSet(?KubernetesCluster $cluster = null, array $attributes = []): K8sStatefulSet
    {
        return new K8sStatefulSet($cluster, $attributes);
    }

    /**
     * Create a new Deployment kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sDeployment
     */
    public static function deployment(?KubernetesCluster $cluster = null, array $attributes = []): K8sDeployment
    {
        return new K8sDeployment($cluster, $attributes);
    }

    /**
     * Create a new Job kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sJob
     */
    public static function job(?KubernetesCluster $cluster = null, array $attributes = []): K8sJob
    {
        return new K8sJob($cluster, $attributes);
    }

    /**
     * Create a new CronJob kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sCronJob
     */
    public static function cronjob(?KubernetesCluster $cluster = null, array $attributes = []): K8sCronJob
    {
        return new K8sCronJob($cluster, $attributes);
    }

    /**
     * Create a new DaemonSet kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sDaemonSet
     */
    public static function daemonSet(?KubernetesCluster $cluster = null, array $attributes = []): K8sDaemonSet
    {
        return new K8sDaemonSet($cluster, $attributes);
    }

    /**
     * Create a new HorizontalPodAutoscaler kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sHorizontalPodAutoscaler
     */
    public static function horizontalPodAutoscaler(?KubernetesCluster $cluster = null, array $attributes = []): K8sHorizontalPodAutoscaler
    {
        return new K8sHorizontalPodAutoscaler($cluster, $attributes);
    }

    /**
     * Create a new ServiceAccount kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sServiceAccount
     */
    public static function serviceAccount(?KubernetesCluster $cluster = null, array $attributes = []): K8sServiceAccount
    {
        return new K8sServiceAccount($cluster, $attributes);
    }

    /**
     * Create a new Role kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sRole
     */
    public static function role(?KubernetesCluster $cluster = null, array $attributes = []): K8sRole
    {
        return new K8sRole($cluster, $attributes);
    }

    /**
     * Create a new ClusterRole kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sClusterRole
     */
    public static function clusterRole(?KubernetesCluster $cluster = null, array $attributes = []): K8sClusterRole
    {
        return new K8sClusterRole($cluster, $attributes);
    }

    /**
     * Create a new RoleBinding kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sRoleBinding
     */
    public static function roleBinding(?KubernetesCluster $cluster = null, array $attributes = []): K8sRoleBinding
    {
        return new K8sRoleBinding($cluster, $attributes);
    }

    /**
     * Create a new ClusterRoleBinding kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sClusterRoleBinding
     */
    public static function clusterRoleBinding(?KubernetesCluster $cluster = null, array $attributes = []): K8sClusterRoleBinding
    {
        return new K8sClusterRoleBinding($cluster, $attributes);
    }

    /**
     * Create a new PodDisruptionBudget kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sPodDisruptionBudget
     */
    public static function podDisruptionBudget(?KubernetesCluster $cluster = null, array $attributes = []): K8sPodDisruptionBudget
    {
        return new K8sPodDisruptionBudget($cluster, $attributes);
    }

    /**
     * Create a new ValidatingWebhookConfiguration kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sValidatingWebhookConfiguration
     */
    public static function validatingWebhookConfiguration(?KubernetesCluster $cluster = null, array $attributes = []): K8sValidatingWebhookConfiguration
    {
        return new K8sValidatingWebhookConfiguration($cluster, $attributes);
    }

    /**
     * Create a new MutatingWebhookConfiguration kind.
     *
     * @param KubernetesCluster|null $cluster
     * @param  array  $attributes
     * @return \RenokiCo\PhpK8s\Kinds\K8sMutatingWebhookConfiguration
     */
    public static function mutatingWebhookConfiguration(?KubernetesCluster $cluster = null, array $attributes = []): K8sMutatingWebhookConfiguration
    {
        return new K8sMutatingWebhookConfiguration($cluster, $attributes);
    }
}
