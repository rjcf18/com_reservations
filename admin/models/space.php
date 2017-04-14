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
 * Space Model for the Reservations component
 *
 * @since 1.0
 */
class ReservationsModelSpace extends JModelAdmin
{
    /**
    * Method to get a table object, load it if necessary.
    *
    * @param string $type   The table name (type of the JTable class). Optional.
    * @param string $prefix The class prefix for the table class name. Optional.
    * @param array  $config Configuration array for model. Optional.
    *
    * @return  JTable  A JTable object if found, false boolean if not found
    *
    * @since   1.0
    */
    public function getTable($type = 'Spaces', $prefix = 'ReservationsTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
    * Method to get the record form from the model.
    *
    * @param array   $data     Data for the form.
    * @param boolean $loadData True if the form is to load its own data (default case), false if not.
    *
    * @return  mixed    A JForm object on success, false on failure
    *
    * @since 1.0
    */
    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm(
            'com_reservations.space',
            'space',
            array(
                'control' => 'jform',
                'load_data' => $loadData
            )
        );

        if (empty($form))
        {
            return false;
        }

        return $form;
    }

    /**
    * Method to get the data that should be injected in the form.
    *
    * @return  mixed  The data for the form.
    *
    * @since 1.0
    */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
            'com_reservations.edit.space.data',
            array()
        );

        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
    * Method to insert a space into the spaces table.
    *
    * @param string $space The space name to insert
    *
    * @since   1.0
    */
    public function insertSpace($space)
    {
        // Create and populate an object.
        $data = new stdClass();
        $data->space = $space;

        // Insert the object into the spaces table.
        $this->getDbo()->insertObject('#__reservations_spaces', $data);
    }
}