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
 * Config Polymorphic Class
 * @package Config
 * @author  Matt Wiseman
 * @since   1.0.0
 */
class Config 
{
    /**
     * holder for settings
     * @var array
     */
    private static $_conf = \NULL;

    /**
     * polymorphism comes in here w/ the adaptor class
     * @var object
     */
    private static $_adaptor = \NULL;

    /**
     * Loader & Bootstrap
     * @param  array $data loads startup data
     * @return void
     */
    public function init($data = array())
    {
        if (is_array($data)) {
            if (!isset($data['type'])) {
                $data['type'] = 'ini';
            }
            
            if (!isset($data['location'])) {
                $path = explode('vendor', __FILE__);
                $data['location'] = $path[0] . '/data/config/';
            }
            
            if (!isset($data['configfilename'])) {
                $data['configfilename'] = 'config.ini';
            }
            
            self::$_conf = $data;
            $obj =  '\\' . __NAMESPACE__ . '\\' . $data['type'];
            var_dump($obj);
            self::$_adaptor =  $obj;
            $obj::init($data);
        }
    }

    /**
     * magic method for cleanly mapping to the adaptor class
     * @param string $name
     * @param array $arguments
     * @see config\adaptor
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    { 
        if(is_null(self::$_adaptor))
        {
            self::init();
        }
        $obj = self::$_adaptor; 
        return $obj::$name($arguments);
    }
    
}
