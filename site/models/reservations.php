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
 * Reservations List Model for the Reservations component
 *
 * @since 1.0
 */
class ReservationsModelReservations extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 */

	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'r.id',
				'name', 'r.name',
				'space_id', 'r.space_id',
				'start', 'r.start',
				'end', 'r.end',
				'published', 'r.published',
				'ordering',
				'state'
			);
		}
		parent::__construct($config);
	}

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return   string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db = JFactory::getDbo(); // get the database connection object
		$query = $db->getQuery(true); // clear the query specification

		// Create the base select statement.
		$query->select(
			'r.*,
            r.id as id,
            r.name as name,
            s.space as space, 
            r.start as start, 
            r.end as end'
		);

		$query->from('#__reservations_reservations as r');
		$query->leftJoin('#__reservations_spaces as s on r.space_id=s.id');


		// Filter by search
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('s.space LIKE ' . $like);
		}

		// Filter by published state
		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{   // typecasting the published integer
			$query->where('r.published = ' . (int) $published);
		}
		elseif ($published === '')
		{   //items with either state 'published' or 'unpublished'
			$query->where('r.published IN (0, 1)');
		}

		// Add the list ordering clauses and list direction to the query
		$sort = $this->state->get('list.ordering', 's.space');
		$order = $this->state->get('list.direction', 'asc');

		$query->order($db->escape($sort) . ' ' . $db->escape($order));

		return $query;
	}
}