<?php
/**
 * Define the MODX path constants necessary for core installation
 *
 * @package optipic
 * @subpackage build
 */

if (!defined('MODX_CORE_PATH')) {
    $path = dirname(dirname(__FILE__));
    define('MODX_CORE_PATH', $path . '/core/');
}
define('MODX_CONFIG_KEY','config');
