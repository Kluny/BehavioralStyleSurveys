<?php $this->extend('Administration.Common/index-page'); ?>
<?php
$this->set('header', 'Behavioral Style Surveys');
?>
<?php 
$this->start('actionLinks');
echo $this->AdminLink->link(__('New Behavioral Style Surveys'), array('action' => 'edit'));
$this->end('actionLinks');
?>
<table class="admin-table">
	<?php echo $this->element('Administration.index/table_caption'); ?>
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('slug');?></th>
			<th><?php echo $this->Paginator->sort('recipient');?></th>
			<?php echo $this->element('Administration.index/actions_header'); ?>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $i => $item): ?>
		<tr>
			<td><?php echo $item['BehavioralStyleSurvey']['title']; ?></td>
			<td><?php echo $item['BehavioralStyleSurvey']['slug']; ?></td>
			<td><?php echo $item['BehavioralStyleSurvey']['recipient']; ?></td>
			<?php echo $this->element('Administration.index/actions_column', array('item' => $item['BehavioralStyleSurvey'])); ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->element('Administration.index/table_footer'); ?>