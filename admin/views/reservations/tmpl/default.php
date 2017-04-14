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

JHtml::_('formbehavior.chosen', 'select');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');

$listOrder = $this->escape($this->filter_order);
$listDirn = $this->escape($this->filter_order_Dir);
$columns = 9;
?>
<form action="index.php?option=com_reservations&view=reservations" method="post" id="adminForm" name="adminForm">
    <div class="row">
        <div id="j-sidebar-container" class="col-md-2">
			<?php echo $this->sidebar; ?>
        </div>
        <div class="col-md-10">
            <div id="j-main-container" class="j-main-container">
				<?php
				// Search tools bar
				echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
				?>
				<?php if (empty($this->items)) : ?>
                    <div class="alert alert-warning alert-no-items">
						<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
                    </div>
				<?php else : ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width:1%" class="nowrap text-center hidden-sm-down">
								<?php echo JHtml::_('searchtools.sort', '', 'ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?>
                            </th>
                            <th style="width:1%" class="text-center">
								<?php echo JHtml::_('grid.checkall'); ?>
                            </th>
                            <th style="width:1%" class="nowrap text-center">
								<?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'published', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:10%" class="nowrap">
								<?php echo JHtml::_('searchtools.sort', 'COM_RESERVATIONS_FIELD_SPACE_LABEL', 'space', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:10%" class="nowrap hidden-sm-down text-center">
								<?php echo JHtml::_('searchtools.sort',  'COM_RESERVATIONS_FIELD_PLACE_LABEL', 'place', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:10%" class="nowrap hidden-sm-down text-center">
		                        <?php echo JHtml::_('searchtools.sort',  'COM_RESERVATIONS_FIELD_USERNAME_LABEL', 'name', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:10%" class="nowrap hidden-sm-down text-center">
								<?php echo JHtml::_('searchtools.sort',  'COM_RESERVATIONS_FIELD_START_LABEL', 'start', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:10%" class="nowrap hidden-sm-down text-center">
								<?php echo JHtml::_('searchtools.sort', 'COM_RESERVATIONS_FIELD_END_LABEL', 'end', $listDirn, $listOrder); ?>
                            </th>
                            <th style="width:3%" class="nowrap hidden-sm-down text-center">
								<?php echo JHtml::_('searchtools.sort', 'COM_RESERVATIONS_RESERVATIONS_FIELD_ID_LABEL', 'id', $listDirn, $listOrder); ?>
                            </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="<?php echo $columns; ?>">
                            </td>
                        </tr>
                        </tfoot>
                        <tbody>
						<?php foreach ($this->items as $i => $row) :
							$row->max_ordering = 0;
							$ordering   = ($listOrder == 'ordering');;
							$link = JRoute::_('index.php?option=com_reservations&task=reservation.edit&id=' . $row->id);
							?>
                            <tr>
                                <td class="order nowrap text-center hidden-sm-down">

                                </td>
                                <td class="text-center">
									<?php echo JHtml::_('grid.id', $i, $row->id); ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
										<?php echo JHtml::_('jgrid.published', $row->published, $i, 'spaces.', true, 'cb'); ?>
                                    </div>
                                </td>
                                <td class="small hidden-sm-down">
                                    <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_RESERVATIONS_EDIT_RESERVATIONS'); ?>">
										<?php echo $row->space; ?>
                                    </a>
                                </td>
                                <td class="small hidden-sm-down text-center">
									<?php echo $row->place; ?>
                                </td>

                                <td class="small hidden-sm-down text-center">
		                            <?php echo $row->name; ?>
                                </td>

                                <td class="small hidden-sm-down text-center">
									<?php echo $row->start; ?>
                                </td>
                                <td class="small hidden-sm-down text-center">
									<?php echo $row->end; ?>
                                </td>
                                <td class="hidden-sm-down text-center">
									<?php echo (int) $row->id; ?>
                                </td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>

				<?php endif; ?>

				<?php echo $this->pagination->getListFooter(); ?>

                <input type="hidden" name="task" value="">
                <input type="hidden" name="boxchecked" value="0">
				<?php echo JHtml::_('form.token'); ?>
            </div>
        </div>
    </div>
</form>

