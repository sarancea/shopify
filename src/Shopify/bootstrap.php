<?php

/*
 * Bootstrap the library.
 */

namespace Shopify;

require_once __DIR__ . '/AutoLoader.php';

$autoloader = new AutoLoader(__NAMESPACE__, dirname(__DIR__));

$autoloader->register();
