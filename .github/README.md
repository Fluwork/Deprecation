# Deprecation

![Continuous integration](https://img.shields.io/github/workflow/status/Fluwork/Deprecation/Continuous%20integration?label=continuous%20integration&style=flat-square)
![Code size](https://img.shields.io/github/languages/code-size/Fluwork/Deprecation?style=flat-square)
![Downloads](https://img.shields.io/packagist/dt/Fluwork/Deprecation?style=flat-square)
![Issues](https://img.shields.io/github/issues/Fluwork/Deprecation?style=flat-square)
![Pull requests](https://img.shields.io/github/issues-pr/Fluwork/Deprecation?style=flat-square)
![License](https://img.shields.io/packagist/l/fluwork/deprecation?style=flat-square)
![Latest release](https://img.shields.io/packagist/v/fluwork/deprecation?style=flat-square&label=version)
![PHP](https://img.shields.io/packagist/php-v/fluwork/deprecation?style=flat-square)

Small library to trigger deprecations.

## Summary
- [I. Getting started](#getting-started)
- [II. Contributing](#contributing)
  - [A. The function definition](#the-function-definition)
  - [B. Deprecation assert](#deprecation-assert)
- [III. Support](#support)
  - [A. Roadmap](#roadmap)
- [IV. License](#license)

## Getting started

1. Install the package with [Composer](https://getcomposer.org/download):
   ```
   $ composer require fluwork/deprecation
   ```

2. Trigger a deprecation:
   ```php
   use function Fluwork\Deprecation\trigger_deprecation;

   function getPseudo()
   {
       trigger_deprecation('vendor/package', '1.1', '"getPseudo" function', 'use the "getUsername" function instead, the function will be removed', '2');

       return $this->getUsername();
   }

   function getUsername()
   {
       return $this->username;
   }
   ```
   The deprecation will output: `Since "vendor/package" 1.1, "getPseudo" function is deprecated: use the "getUsername" function instead, the function will be removed in version 2`.


### The function definition
`trigger_deprecation(string $package, string $depreciationVersion, string $depreciation, string $message, string $changeVersion, ...$args): void`

|Argument name|Description|Example|
|-------------|-----------|-------|
|`string $package`|The package where the deprecation is defined|`vendor/package`|
|`string $depreciationVersion`|The version in which the deprecation is introduced|`1.1`|
|`string $depreciation`|The feature name which is deprecated|`"getPseudo" function`|
|`string $message`|The deprecation message|`use the "getUsername" function instead, the function will be removed`|
|`string $changeVersion`|The version where the deprecation change will be applied|`2`|
|`...$args`|The arguments of the message (with the `sprintf` function)|`trigger_deprecation(..., ..., ..., 'use the "%s" function instead, the function will be removed', ..., __METHOD__)`|

### Deprecation assert
```php
use Fluwork\Deprecation\DeprecationAssert;

class UserTest
{
    use DeprecationAssert;

    public function testGetPseudo()
    {
        $this->assertDeprecationTriggered(
            'vendor/package',
            '1.1',
            '"getPseudo" function',
            'use the "getUsername" function instead, the function will be removed',
            '2'
        );

        $user = ...
        $user->getPseudo();
    }
}
```

## Contributing


## Support
When a new major version is released, the last major release is support for **one year** and have a security support (major bugs and security vulnerabilities) for **two years** after.

|Version|State|Release date|End of support|End of security support|Latest version|
|-------|-----|------------|--------------|-----------------------|--------------|
|[1.x.x / `next`](https://github.com/Fluwork/Deprecation/tree/next)|:white_check_mark:|2020-07-03|*Latest major release*|*Latest major release*|[1.0.0](https://github.com/Fluwork/Deprecation/releases/tag/v1.0.0)|

> More information are available [here](https://github.com/Fluwork/Deprecation/blob/next/.github/SECURITY.md).

### Roadmap
All changes are documented in [the changelog](https://github.com/Fluwork/Deprecation/blob/next/LICENSE.md).


## License
This repository is under [the MIT license](https://github.com/Fluwork/Deprecation/blob/next/LICENSE).
