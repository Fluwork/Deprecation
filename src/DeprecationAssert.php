<?php

namespace Fluwork\Deprecation;

/**
 * Helper to test if a deprecating was triggered.
 *
 * @author Yannis Foucher
 */
trait DeprecationAssert
{
    /**
     * Asserts if a deprecation was triggered according to `trigger_deprecation`.
     *
     * @param string $package
     * @param string $depreciationVersion The version in which the deprecation is introduced
     * @param string $depreciation The feature name which is deprecated
     * @param string $message The deprecation message
     * @param string $changeVersion The version where the deprecation change will be applied
     * @param mixed[] ...$args The arguments of the message (with the "sprintf" function)
     * @return void
     *
     * @see Fluwork\Deprecation\trigger_deprecation
     */
    public function assertDeprecationTriggered(
        string $package,
        string $depreciationVersion,
        string $depreciation,
        string $message,
        string $changeVersion,
        ...$args
    ): void {
        $this->expectDeprecation();
        $this->expectDeprecationMessage(sprintf(
            'Since "%s" %s, %s is deprecated: %s in version %s',
            $package,
            $depreciationVersion,
            $depreciation,
            vsprintf($message, $args),
            $changeVersion
        ));
    }
}
