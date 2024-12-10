<?php

namespace berthott\Tableau\Tests\TableauDirectTrustTest;

use Illuminate\Support\Carbon;

class TableauDirectTrustTest extends TableauDirectTrustTestCase
{
    public function test_direct_trust_token(): void
    {
        $this->withoutExceptionHandling();
        Carbon::setTestNow(Carbon::createFromTimestamp('1733751107'));
        $response = $this->post(route('tableau-direct-trust.token'));
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
        $response->assertJson(['token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImtpZCI6IjdmYmRkODQ4LTg1NjgtNDI0YS1iMjRiLWExZjM5MmIwZjEwNCIsImlzcyI6ImIwYzllMTliLTQ4M2ItNGRiZS05OGY3LWUyYjc2OWUwZTdmOSJ9.eyJqdGkiOiJmMDNlMWQzMC1iNjMxLTExZWYtOGU0NS1jOTc2Yzg5OThlNmIiLCJhdWQiOiJ0YWJsZWF1Iiwic3ViIjoidGVzdEB0ZXN0LmNvbSIsInNjcCI6WyJ0YWJsZWF1OnZpZXdzOmVtYmVkIl0sImV4cCI6MTczMzc1MTE2NywiaWF0IjoxNzMzNzUxMTA3fQ.xN1b2BfXBuUjRyfrp5LdJCbyuA_pIjOD47YshSBn9Zg']);
    }
}
