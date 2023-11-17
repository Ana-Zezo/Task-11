<?php

function url($uri): string
{
    return URL . $uri;
}
function path($path): string
{
    return PATH . $path;
}

function dd(...$arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function redirect($path)
{
    header("location:" . url($path));
    die;
}