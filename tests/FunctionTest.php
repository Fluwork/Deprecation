<?php

namespace Fluwork\Depreciation\Tests;

use PHPUnit\Framework\TestCase;

use function Fluwork\Deprecation\trigger_deprecation;

class FunctionTest extends TestCase
{
    public function testTriggerDeprecation(): void
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage(
            'Since "vendor/package" 1.0, feature is deprecated: it will change in version 2'
        );

        trigger_deprecation('vendor/package', '1.0', 'feature', 'it will change', '2');
    }

    public function testTriggerDeprecationWithArguments(): void
    {
        $this->expectDeprecation();
        $this->expectDeprecationMessage(
            'Since "vendor/package" 1.0, feature is deprecated: it will be changed soon in version 2'
        );

        trigger_deprecation('vendor/package', '1.0', 'feature', 'it will %s changed %s', '2', 'be', 'soon');
    }
}
