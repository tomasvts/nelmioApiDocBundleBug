<?php

namespace App\Tests\Integration;

use JsonException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;

class NelmioApiDocBundleTest extends KernelTestCase
{
    public function testValidDocumentation(): void
    {
        $kernel = self::bootKernel();
        $response = $kernel->handle(Request::create('/api/doc'));

        $devDetails = [];
        try {
            $details = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
            $devDetails = $details['devDetail'] ?? [];
        } catch (JsonException) {
        }
        $this->assertEquals(200, $response->getStatusCode(),
            sprintf('There is an error in the documentation, please check the details: %s', json_encode($devDetails, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT))
        );
    }

    public function testCompanyController(): void
    {
        $kernel = self::bootKernel();
        $response = $kernel->handle(Request::create('/company'));

        $devDetails = [];
        try {
            $details = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
            $devDetails = $details['devDetail'] ?? [];
        } catch (JsonException) {
        }
        $this->assertEquals(200, $response->getStatusCode(),
            sprintf('There is an error in the documentation, please check the details: %s', json_encode($devDetails, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT))
        );
    }
}
