<?php

declare(strict_types=1);

namespace App;

use function trigger_error;
use function vsprintf;

final class DeprecationThrower
{
    /**
     * @param list<string> $args
     */
    public function throw(
        ?string $package = 'test-package',
        ?string $version = '1.0',
        string $message = 'This is deprecated from thrower',
        ?array $args = []
    ): void {
        @trigger_error(
            (
                $package !== null || $version !== null
                ? "Since $package $version: "
                : ''
            ) . (
                $args !== null
                ? vsprintf($message, $args)
                : $message
            ),
            E_USER_DEPRECATED
        );
    }

    public function throwAnother(): void
    {
        @trigger_error('This is another deprecation from thrower', E_USER_DEPRECATED);
    }

    public function throwNonSilencedDeprecation(): void
    {
        ob_start();
        trigger_error('Non silenced deprecation from thrower', E_USER_DEPRECATED);
        ob_get_clean();
    }
}
