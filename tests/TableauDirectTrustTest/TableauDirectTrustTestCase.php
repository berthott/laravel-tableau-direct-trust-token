<?php

namespace berthott\Tableau\Tests\TableauDirectTrustTest;

use Facades\berthott\Tableau\Services\UuidService;
use berthott\Tableau\TableauDirectTrustTokenProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TableauDirectTrustTestCase extends BaseTestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            TableauDirectTrustTokenProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        Config::set('tableau-direct-trust.defaultUser', 'test@test.com');
        Config::set('tableau-direct-trust.secret', 'FjcCy2Zd27mkSekPNTkbrsvzov4LfpyDGnxJzGSv02lU');
        Config::set('tableau-direct-trust.secretId', '7fbdd848-8568-424a-b24b-a1f392b0f104');
        Config::set('tableau-direct-trust.clientId', 'b0c9e19b-483b-4dbe-98f7-e2b769e0e7f9');
        UuidService::shouldReceive('uuid4')
            ->andReturn('f03e1d30-b631-11ef-8e45-c976c8998e6b');
    }
}
