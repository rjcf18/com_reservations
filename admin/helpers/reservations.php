<?php
/**
 * @package    Joomla.Administrator
 * @subpackage Com_Reservations
 *
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die();

/**
 * Reservations component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since 1.0
 */
abstract class ReservationsHelper extends JHelperContent
{
    /**
    * Configure the Linkbar.*
    *
    * @return Bool
    */

	public static function addSubmenu($submenu)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_RESERVATIONS_SUBMENU_SPACES'),
			'index.php?option=com_reservations&view=spaces',
			$submenu == 'spaces'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_RESERVATIONS_SUBMENU_RESERVATIONS'),
			'index.php?option=com_reservations&view=reservations',
			$submenu == 'reservations'
		);
	}


}