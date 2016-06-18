<?php
/**
 * @package		mod_offline_site_countdown
 * @subpackage	mod_offline_site_countdown
 * @copyright	Nazha Ahmad Giugno 2016
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';


require JModuleHelper::getLayoutPath('mod_offline_site_countdown', $params->get('layout', 'default'));
