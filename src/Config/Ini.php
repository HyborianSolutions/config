<?php
/**
 * Config - a simple PHP config reader that works with slim
 *
 * @author      Matt Wiseman <trollboy@gmail.com>
 * @copyright   2013 Matt Wiseman
 * @link        http://www.mattwiseman.net/config 
 * @version     1.0
 * @package     Config
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace config; 
 
if(!defined('APP_DIR'))
{
	$path = explode('vendor', __FILE__);
	define('APP_DIR', $path[0] . '/');
}
if(!defined('CONFIG_DIR'))
{
	$path = explode('vendor', __FILE__);
	define('CONFIG_DIR', $path[0] . '/data/config');
}

/**
 * Json
 * @package Config
 * @author  Matt Wiseman
 * @since   1.0.0
 */
class ini
{
	private static $config = NULL; 

	public static function translate ($key, $section = "main")
	{
		echo 'Hello World';
	}
 
}