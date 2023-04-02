<?php


function view($view, $data =  array())
{
    if (is_file(APPPATH . "Views/" . $view . ".php")) {
        if (!empty($data)) {
            if (is_array($data)) {
                extract($data);
            } else {
                exit("Only array are allowed to pass inside view method");
            }
        }
        require_once(APPPATH . "Views/" . $view . ".php");
    } else {
        exit("404 view (" . $view . ") not found");
    }
}

function helper($helper = '')
{
    if (is_file(APPPATH . "Helpers/" . $helper . "_helper.php")) {
        require_once(APPPATH . "Helpers/" . $helper . "_helper.php");
    } else {
        exit("404 Helper (" . $helper . ") not found");
    }
}
