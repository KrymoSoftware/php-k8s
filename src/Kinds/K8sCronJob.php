<?php

namespace RenokiCo\PhpK8s\Kinds;

use Carbon\Carbon;
use Cron\CronExpression;
use DateTime;
use Illuminate\Support\Collection;
use RenokiCo\PhpK8s\Contracts\InteractsWithK8sCluster;
use RenokiCo\PhpK8s\Contracts\Watchable;
use RenokiCo\PhpK8s\Traits\Resource\HasSpec;
use RenokiCo\PhpK8s\Traits\Resource\HasStatus;

class K8sCronJob extends K8sResource implements InteractsWithK8sCluster, Watchable
{
    use HasSpec;
    use HasStatus;

    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static ?string $kind = 'CronJob';

    /**
     * The default version for the resource.
     *
     * @var string
     */
    protected static string $defaultVersion = 'batch/v1';

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static bool $namespaceable = true;

    /**
     * Set the job template.
     *
     * @param array|K8sJob $job
     * @return $this
     */
    public function setJobTemplate(K8sJob|array $job): self
    {
        if ($job instanceof K8sJob) {
            $job = $job->toArray();
        }

        return $this->setSpec('jobTemplate', $job);
    }

    /**
     * Get the template job.
     *
     * @param  bool  $asInstance
     * @return array|K8sJob
     */
    public function getJobTemplate(bool $asInstance = true): K8sJob|array
    {
        $template = $this->getSpec('jobTemplate', []);

        if ($asInstance) {
            $template = new K8sJob($this->cluster, $template);
        }

        return $template;
    }

    /**
     * Set the schedule for the cronjob.
     *
     * @param string|CronExpression $schedule
     * @return $this
     */
    public function setSchedule(CronExpression|string $schedule): self
    {
        if ($schedule instanceof CronExpression) {
            $schedule = $schedule->getExpression();
        }

        return $this->setSpec('schedule', $schedule);
    }

    /**
     * Retrieve the schedule.
     *
     * @param  bool  $asInstance
     * @return CronExpression|string
     */
    public function getSchedule(bool $asInstance = true): CronExpression|string
    {
        $schedule = $this->getSpec('schedule', '* * * * *');

        if ($asInstance) {
            $schedule = CronExpression::factory($schedule);
        }

        return $schedule;
    }

    /**
     * Get the last time a job was scheduled.
     *
     * @return DateTime|null
     */
    public function getLastSchedule(): ?DateTime
    {
        if (! $lastSchedule = $this->getStatus('lastScheduleTime')) {
            return null;
        }

        return Carbon::parse($lastSchedule);
    }

    /**
     * Get the active jobs created by the cronjob.
     *
     * @return Collection
     */
    public function getActiveJobs(): Collection
    {
        return collect($this->getStatus('active', []))->map(function ($job) {
            return $this->cluster->getJobByName($job['name'], $this->getNamespace());
        });
    }
}
