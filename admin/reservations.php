<?php
/**
 * Administrator entrypoint to the Reservations component
 *
 * @package    Joomla.Administrator
 * @subpackage Com_Reservations
 *
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die();

// Get an instance of the controller prefixed by Reservations
$controller = JControllerLegacy::getInstance('Reservations');

// Require helper files
JLoader::register('ReservationsHelper', JPATH_COMPONENT . '/helpers/reservations.php');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();