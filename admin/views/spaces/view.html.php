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
 * Spaces View
 *
 * @since 1.0
 */
class ReservationsViewSpaces extends JViewLegacy
{
    /**
    * Display the Spaces view
    *
    * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
    *
    * @throws Exception
    *
    * @return  void
    *
    * @since 1.0
    */
    function display($tpl = null)
    {

        // Get application
        $app = JFactory::getApplication();
        $context = "reservations.list.admin.space";

        // Get data from the model
        $this->items		= $this->get('Items');
        $this->pagination	= $this->get('Pagination');

        $this->filter_order	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'space', 'cmd');
        $this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
        $this->filterForm    	= $this->get('FilterForm');
        $this->activeFilters 	= $this->get('ActiveFilters');


        // Check for errors.
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors), 500);

            return false;
        }

        // Set the submenu
        ReservationsHelper::addSubmenu('reservations');

        JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

        $this->sidebar = JHtmlSidebar::render();

        // Set the toolbar and number of found items
        $this->addToolBar();

        // Display the template
        parent::display($tpl);

        // Set the document
        $this->setDocument();
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
        $title = JText::_('COM_RESERVATIONS_MANAGER_SPACES');

        if ($this->pagination->total)
        {
            $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
        }

        JToolbarHelper::title($title, 'spaces');

        JToolbarHelper::addNew('space.add');

        JToolbarHelper::editList('space.edit');

        //JToolbarHelper::publish();

        //JToolbarHelper::unpublish();

        JToolbarHelper::deleteList('', 'spaces.delete');

    }

    /**
    * Method to set up the document properties
    *
    * @return void
    *
    * @since 1.0
    */
    protected function setDocument()
    {
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_RESERVATIONS_ADMINISTRATION'));
    }
}