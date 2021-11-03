<?php
function redirect($location = null)
{
    if ($location != null) {
        header("Location: {$location}");
        exit;
    }
}

function pre($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function backOneDirectory()
{
    return trim($_SERVER['REQUEST_URI'], (array_pop(explode('/', $_SERVER['REQUEST_URI']))));
}
