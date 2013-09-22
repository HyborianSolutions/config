<?php

namespace config;  

/**
 * Json
 * @package Config
 * @author  Matt Wiseman
 * @since   1.0.0
 */
class config implements \config\adaptor
{
	private static $_conf;
	private static $_adaptor;
	public function init($data)
	{
		if(is_array($data))
		{
			if(!isset($data['type']))
			{
				$data['type'] = 'ini';
			} 
			if(!isset($data['location']))
			{ 
				$path = explode('vendor', __FILE__);
				$data['location'] = $path[0] . '/data/config/';
			} 
			if(!isset($data['configfilename']))
			{
				$data['configfilename'] = 'config.ini'
			}
			self::$_conf = $data;
			$obj = DIRECTORY_SEPARATOR . __NAMESPACE__ . DIRECTORY_SEPARATOR . $data['type'];
			self::$_conf['selected_parser'] =  $obj;
			self::$_conf['selected_parser']::init($data)
		}
	}

    public static function translate($key, $section = "main")
    {
		return self::$_conf['selected_parser']::translate($key, $section);
    }
	public static function save($language, $key, $value, $section = "main")
	{
		return self::$_conf['selected_parser']::save($language, $key, $value, $section);
	}
	public static function createLang($language)
	{
		return self::$_conf['selected_parser']::createLang($language);
	}
	public static function createSection($section)
	{
		return self::$_conf['selected_parser']::createSection($section);
	}
}