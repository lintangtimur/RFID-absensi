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
