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

JFormHelper::loadFieldClass('list');

/**
 * Reservation Form Field class for the Reservations component
 *
 * @since 1.0
 */

class JFormFieldReservation extends JFormFieldList
{
    /**
    * The field type.
    *
    * @var         string
    */
    protected $type = 'Reservation';

    /**
    * Method to get a list of options for a list input.
    *
    * @return  array  An array of JHtml options.
    */
    protected function getOptions()
    {
        $db = JFactory::getDBO(); //get DB connection object
        // create new query object anc clear the query specification
        $query = $db->getQuery(true);

        $query->select(
            'r.id as id, 
			s.space as space, 
			s.place as place, 
			r.start as start, 
			r.end as end'
        );

        $query->from('#__reservations_reservations as r');
        $query->leftJoin('#__reservations_spaces as s on r.space_id=s.id');

        $db->setQuery((string) $query);
        $reservations = $db->loadObjectList();
        $options  = array();


        if ($reservations)
        {
            foreach ($reservations as $reservation)
            {
                $options[] = JHtml::_('select.option', $reservation->id, $reservation->space);
            }
        }

        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}