<?php $this->extend('Administration.Common/edit-page'); ?>
<?php
$this->start('formStart');
echo $this->Form->create('BehavioralStyleSurvey', array('class' => 'editor-form', 'url' => $this->request->here));
$this->end('formStart');
?>

<?php $this->start('tabs'); ?>
<li><?php echo $this->Html->link('Basic', '#tab-basic'); ?></li>
<?php $this->end('tabs'); ?>

<div id="tab-basic">
	<?php
	echo $this->Form->input('BehavioralStyleSurvey.id');
	echo $this->Form->input('BehavioralStyleSurvey.title');
	echo $this->Form->input('BehavioralStyleSurvey.slug');
	echo $this->Form->input('BehavioralStyleSurvey.recipient');
	?>
</div>