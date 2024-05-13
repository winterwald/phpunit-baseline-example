<?php

declare(strict_types=1);

namespace App\Tests;

use App\DeprecationThrower;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;
use function trigger_error;

final class DeprecationThrowerTest extends TestCase
{
    public function testDeprecation(): void
    {
        @trigger_error('This test deprecation from test', E_USER_DEPRECATED);
        ob_start();
        trigger_error('Non silenced deprecation from test', E_USER_DEPRECATED);
        ob_get_clean();

        $thrower = new DeprecationThrower();
        $thrower->throw();
        $thrower->throwAnother();
        $thrower->throwNonSilencedDeprecation();

        self::assertTrue(true);
    }
}
