<?php

namespace config;

interface config\adaptor
{
	public static function get($key, $section = "main");
	public static function set($key, $value, $section = "main");
 	public static function save();
 	public static function merge($path);

} 