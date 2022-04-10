<?php

function getUri()
{
    $uri = explode('?', $_SERVER['REQUEST_URI'], 2);
    return trim($uri[0], "/");
}