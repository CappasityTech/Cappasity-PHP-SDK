<?php
/**
 * NOTICE OF LICENSE
 *
 * This file is licensed only to registered users of the Cappasity platform.
 *
 * You must not modify, adapt or create derivative works of this source code
 *
 * @author    Cappasity Inc <info@cappasity.com>
 * @copyright 2019-2022 Cappasity Inc.
 */

exec('./vendor/bin/phpunit 2>&1', $output, $cmdStatus);

foreach ($output as $line) {
    echo $line . PHP_EOL;
}

exit($cmdStatus);
