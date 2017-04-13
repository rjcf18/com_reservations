<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Com_Reservations
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Reservations table class
 *
 * @since  0.0.1
 */
class ReservationsTableSpaces extends JTable
{
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver &$db A database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__reservations_reservations', 'id', $db);
	}
}