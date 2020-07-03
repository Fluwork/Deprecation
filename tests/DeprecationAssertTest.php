<?php

namespace Fluwork\Deprecation\Tests;

use PHPUnit\Framework\TestCase;
use Fluwork\Deprecation\DeprecationAssert;

use function Fluwork\Deprecation\trigger_deprecation;

class DeprecationAssertTest extends TestCase
{
    use DeprecationAssert;

    public function testAssertDeprecationTriggered(): void
    {
        $this->assertDeprecationTriggered('vendor/package', '1.0', 'feature', 'it will change', '2');
        trigger_deprecation('vendor/package', '1.0', 'feature', 'it will change', '2');
    }

    public function testAssertDeprecationTriggeredWithArguments(): void
    {
        $this->assertDeprecationTriggered(
            'vendor/package',
            '1.0',
            'feature',
            'it will %s changed %s',
            '2',
            'be',
            'soon'
        );
        
        trigger_deprecation('vendor/package', '1.0', 'feature', 'it will %s changed %s', '2', 'be', 'soon');
    }
}
