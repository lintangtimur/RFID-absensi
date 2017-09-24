<?php
/**
 * Dump variable
 * @param  object|string|array $variable variable yang akan di dump
 * @return mixed
 */
function dd($variable)
{
    die(var_dump($variable));
};

/**
 * VIEW
 * @param  string $viewer View no logic
 * @return string
 */
function view(string $viewer)
{
    return 'view/'.$viewer.".view.php";
}
