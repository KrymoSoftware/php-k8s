<?php

namespace RenokiCo\PhpK8s\Traits\Resource;

trait HasCreationTimestamp
{
    use HasAttributes;

    public function getCreationTimestamp(): \DateTimeImmutable
    {
        $timestamp = $this->getAttribute('metadata.creationTimestamp');

        if ($timestamp === null) {
            throw new \InvalidArgumentException('Creation timestamp is missing.');
        }

        $dateTime = \DateTimeImmutable::createFromFormat(\DateTimeInterface::ATOM, $timestamp);

        if ($dateTime === false) {
            throw new \RuntimeException('Invalid creation timestamp format.');
        }

        return $dateTime;
    }
}
