<?php


function view($view, $data =  array())
{
    // echo '<pre>';print_r(APPPATH . "Views/" . $view . ".php");exit;
    if (is_file(APPPATH . "Views/" . $view . ".php")) {
        require_once(APPPATH . "Views/" . $view . ".php");
    } else {
        exit("404 view (" . $view . ") not found");
    }
}

function helper($helper = '')
{
    if (is_file(APPPATH . "Helpers/" . $helper . "_helper.php")) {
        require_once(APPPATH . "Helpers/" . $helper . "_helper.php");


    }else{
        exit("404 Helper (" . $helper . ") not found");

    }
}
