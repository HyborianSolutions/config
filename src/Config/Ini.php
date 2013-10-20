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
namespace Config;

/**
 * Ini Adapter
 * @package Config
 * @author  Matt Wiseman
 * @since   1.0.0
 */
class Ini implements Config\adaptor
{
    private static $_data = \NULL;

    private static $_conf = \NULL;

    public static function init($data)
    {
        self::$_conf = $data;
    }

    public static function get ($key, $section = "main")
    {
        if (!is_array(self::$_data)) {
            self::$_data = parse_ini_file(self::$_conf['location'] . DIRECTORY_SEPARATOR . self::$_conf['configfilename'], true);
        }
        if (!isset(self::$_data[$section][$key])) {
            return array();
        } else {
            return self::$_data[$section][$key];
        }
    }

    public static function set($key, $value, $section = "main")
    {
        self::$config[$section][$key] = $value;
    }

    public static function save()
    {
        $res = array();
        foreach($array as $key => $val)
        {
            if(is_array($val))
            {
                $res[] = "[$key]";
                foreach($val as $skey => $sval) 
                {
                    $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
                }
            }
            else{ 
                $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
            }
        }
        safefilerewrite(self::$_conf['location'] . DIRECTORY_SEPARATOR . self::$_conf['configfilename'], implode("\r\n", $res));
        
    }

     public static function merge($path)
     {

     }
}
