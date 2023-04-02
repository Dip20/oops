<?php

/**
 * Auto load the vendor folder
 * we also use our class to load with composer autoloading
 */
require_once "../vendor/autoload.php";  


/**
 * paths
 */

$paths = new Paths();


/**
 * init startup
 */

require_once $paths->system_path . "Startup.php";