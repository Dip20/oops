<?php

/**
 * This is the heart of the framework
 * app is start up from here
 */



// The path to the application directory.
if (!defined('APPPATH')) {
    /**
     * @var Paths $paths
     */
    define('APPPATH', realpath(rtrim($paths->app_path, '\\/ ')) . DIRECTORY_SEPARATOR);
}



// The path to the project root directory. Just above APPPATH.
if (!defined('ROOTPATH')) {
    define('ROOTPATH', realpath(APPPATH . '../') . DIRECTORY_SEPARATOR);
}


// The path to the system directory.
if (!defined('SYSTEMPATH')) {
    /**
     * @var Paths $paths
     */
    define('SYSTEMPATH', realpath(rtrim($paths->system_path, '\\/ ')) . DIRECTORY_SEPARATOR);
}



// The path to the system directory.
if (!defined('CONTROLLER_PATH')) {
    /**
     * @var Paths $paths
     */
    define('CONTROLLER_PATH', realpath(rtrim($paths->controller_path, '\\/ ')) . DIRECTORY_SEPARATOR);
}


//load system_helpers

require_once SYSTEMPATH . 'System_helper.php';





/**
 * Request Controller & method handeler
 */
if (isset($_SERVER['PATH_INFO'])) {
    $paths = @$_SERVER['PATH_INFO'];
    $request = explode("/", $paths);

    if (count($request) > 0) {
        if (array_key_exists(0, $request)) {
            $controller = $request[1];
            /**
             * check weather the controller exist or not
             */

            if (file_exists(CONTROLLER_PATH . $controller . ".php")) {
                require_once CONTROLLER_PATH . $controller . ".php";
                $con = new $controller;

                /**
                 *  check weather method exist or not
                 */

                if (array_key_exists(2, $request)) {
                    $method = $request[2];
                } else {
                    $method = "index";
                }


                if (method_exists($con, $method)) {
                    $con->$method();
                } else {
                    /**
                     * Controller Method not found
                     */
                    exit("404 Controller Method (" . $controller . "::" . $method . ") not found");
                }
            } else {
                /**
                 * 404 controller not found
                 */
                exit("404 Controller (" . $controller . ") not found");
            }
        } else {
            /**
             * call default controller
             */
        }
    }
}else{
    $default = new Home;
    $default->index();

}
