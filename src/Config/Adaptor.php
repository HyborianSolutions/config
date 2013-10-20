<?php

namespace Config;

Interface Adaptor
{
    public static function init($data);
    public static function get($data);
    public static function set($data);
    public static function save($data);
    public static function merge($data);

}
