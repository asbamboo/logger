<?php
/**
 * @var \asbamboo\autoload\Autoload $autoload
 */
$autoload   = include dirname(__DIR__) . '/vendor/asbamboo/autoload/bootstrap.php';
$autoload->addMappingDir('asbamboo\\logger\\', dirname(__DIR__));
return $autoload;