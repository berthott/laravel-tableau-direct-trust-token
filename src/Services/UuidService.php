<?php

namespace berthott\Tableau\Services;

use Ramsey\Uuid\Uuid;

/**
 * Service to wrap uuid4.
 */
class UuidService
{
    public function uuid4(): string
    {
        return Uuid::uuid4();
    }
}
