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
 * Space View
 *
 * @since 1.0
 */
class ReservationsViewSpace extends JViewLegacy
{
    /**
    * View form
    *
    * @var         form
    */
    protected $form = null;

    /**
    * Display the space view
    *
    * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
    *
    * @return  void
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

        $isNew = ($this->item->id == 0);

        $title = JText::_('COM_RESERVATIONS_VIEW_SPACE_EDIT');


        JToolbarHelper::title($title, 'space');
        JToolbarHelper::save('space.save');
        JToolbarHelper::cancel(
            'space.cancel',
            $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
        );
    }

}