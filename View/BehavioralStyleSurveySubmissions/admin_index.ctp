<?php $this->extend('Administration.Common/index-page'); ?>
<?php
$this->set('header', 'Behavioral Style Survey Submissions');
?>
<?php 
$this->start('actionLinks');
//echo $this->AdminLink->link(__('New Behavioral Style Surveys'), array('action' => 'edit'));
$this->end('actionLinks');
?>
<table class="admin-table">
	<?php echo $this->element('Administration.index/table_caption'); ?>
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<?php echo $this->element('Administration.index/actions_header', array('showEdit' => false, 'showCopy' => false)); ?>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $i => $item): ?>
		<tr>
			<td><?php echo $this->Html->link( $item['BehavioralStyleSurveySubmission']['id'], array('action' => 'view', $item['BehavioralStyleSurveySubmission']['id'] ) ); ?></td>
			<td><?php echo $item['BehavioralStyleSurveySubmission']['name']; ?></td>
			<?php echo $this->element('Administration.index/actions_column', array('item' => $item['BehavioralStyleSurveySubmission'], 'showEdit' => false, 'showCopy' => false)); ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->element('Administration.index/table_footer'); ?>