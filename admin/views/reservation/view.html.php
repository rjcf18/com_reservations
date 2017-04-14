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
 * Reservation View
 *
 * @since 1.0
 */
class ReservationsViewReservation extends JViewLegacy
{
    /**
    * View form
    *
    * @var         form
    */
    protected $form = null;

    /**
    * Display the reservation view
    *
    * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
    *
    * @throws Exception
    *
    * @return void
    *
    * @since 1.0
    */
    public function display($tpl = null)
    {
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors), 500);

            return false;
        }


        // Set the toolbar
        $this->addToolBar();

        // Display the template
        parent::display($tpl);
    }

    /**
    * Add the page title and toolbar.
    *
    * @return  void
    *
    * @since   1.0
    */
    protected function addToolBar()
    {
	    $input = JFactory::getApplication()->input;

	    // Hide Joomla Administrator Main menu
	    $input->set('hidemainmenu', true);

	    $title = JText::_('COM_RESERVATIONS_VIEW_RESERVATIONS_EDIT');

	    JToolbarHelper::title($title, 'reservation');

	    $toolbarButtons = [];
	    $toolbarButtons[] = ['apply', 'reservation.apply'];
	    $toolbarButtons[] = ['save', 'reservation.save'];
	    $toolbarButtons[] = ['save2new', 'reservation.save2new'];

	    JToolbarHelper::saveGroup(
		    $toolbarButtons,
		    'btn-success'
	    );

	    if (empty($this->item->id))
	    {
		    JToolbarHelper::cancel('space.cancel');
	    }
	    else
	    {
		    JToolbarHelper::cancel('space.cancel', 'JTOOLBAR_CLOSE');
	    }
    }

}