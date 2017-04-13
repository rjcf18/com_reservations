<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  Com_Reservations
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
/**
 * Space Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 * @since       0.0.9
 */
class ReservationsControllerSpace extends JControllerForm
{
	public function save()
	{
		$input = $this->input->getInput('jform');

		$model = $this->getModel();
		$model->insertSpace($input['space']);

		$this->setRedirect(JRoute::_('index.php?option=com_reservations&view=space', false));
	}
}