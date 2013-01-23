<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CI Smarty
 *
 * Smarty templating for Codeigniter
 *
 * @package   CI Smarty
 * @author    Dwayne Charrington
 * @copyright Copyright (c) 2012 Dwayne Charrington and Github contributors
 * @link      http://ilikekillnerds.com
 * @license   http://www.apache.org/licenses/LICENSE-2.0.html
 * @version   2.0
 */
// Smarty caching enabled by default unless explicitly set to FALSE
$config['cache_status'] = false;
// Smarty will test compiled template agains template file each time it is displayed. Default is TRUE
$config['compile_check'] = false;
// The path to the themes
// Default is implied root directory/themes/
$config['theme_path'] = 'themes/';
// The default name of the theme to use (this can be overridden)
$config['theme_name'] = 'default';
// Cache lifetime. Default value is 3600 seconds (1 hour) Smarty's default value
$config['cache_lifetime'] = 3600;
// Where templates are compiled
$config['compile_directory'] = 'application/cache/smarty/compiled/';
// Where templates are cached
$config['cache_directory'] = 'application/cache/smarty/cached/';
// Where Smarty configs are located
$config['config_directory'] = 'application/third_party/Smarty/configs/';
// Default extension of templates if one isn't supplied
$config['template_ext'] = 'tpl';
// Error reporting level to use while processing templates
$config['template_error_reporting'] = 32759;
// Debug mode turned on or off (TRUE / FALSE)
$config['smarty_debug'] = false;


?>