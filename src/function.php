<?php

namespace Fluwork\Deprecation;

if (!\function_exists(__NAMESPACE__ . '\trigger_deprecation')) {
    /**
     * Prints a deprecation message.
     *
     * @param string $package
     * @param string $depreciationVersion The version in which the deprecation is introduced
     * @param string $depreciation The feature name which is deprecated
     * @param string $message The deprecation message
     * @param string $changeVersion The version where the deprecation change will be applied
     * @param mixed[] ...$args The arguments of the message (with the "sprintf" function)
     * @return void
     *
     * @author Yannis Foucher
     */
    function trigger_deprecation(
        string $package,
        string $depreciationVersion,
        string $depreciation,
        string $message,
        string $changeVersion,
        ...$args
    ): void {
        \trigger_error(\sprintf(
            'Since "%s" %s, %s is deprecated: %s in version %s',
            $package,
            $depreciationVersion,
            $depreciation,
            \vsprintf($message, $args),
            $changeVersion
        ), \E_USER_DEPRECATED);
    }
}
