<?php

namespace config;

Interface adaptor
{
    public static function init($data);
    public static function get($data);
    public static function set($data);
    public static function save($data);
    public static function merge($data);

}
