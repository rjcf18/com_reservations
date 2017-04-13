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

JFormHelper::loadFieldClass('list');

/**
 * Space Form Field class for the Reservations component
 *
 * @since  0.0.1
 */

class JFormFieldSpace extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Space';

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

		$query->select('id, space');
		$query->from('#__reservations_spaces');
		$db->setQuery((string) $query);
		$spaces = $db->loadObjectList();
		$options  = array();


		if ($spaces)
		{
			foreach ($spaces as $space)
			{
				$options[] = JHtml::_('select.option', $space->id, $space->space);

			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}