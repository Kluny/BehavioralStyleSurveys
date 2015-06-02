<?php $this->extend('Administration.Common/edit-page'); ?>
<?php
$this->start('formStart');
echo $this->Form->create('BehavioralStyleSurveySubmission', array('class' => 'editor-form', 'url' => $this->request->here));
$this->end('formStart');
?>

<?php $this->start('tabs'); ?>
<li><?php echo $this->Html->link('Basic', '#tab-basic'); ?></li>
<?php $this->end('tabs'); ?>

<div id="tab-basic">
	
	<h2><?php echo $submission['BehavioralStyleSurveySubmission']['name'] ?></h2>
	<h3>Submission #<?php echo $submission['BehavioralStyleSurveySubmission']['id'] ?></h3>
	<div>	
		<table>
			<tr>
				<td>Client name</td>
				<td><?php echo $submission['BehavioralStyleSurveySubmission']['name']; ?></td>
			</tr>
			<tr>
				<td>Email address</td>
				<td><a href="mailto:<?php echo $submission['BehavioralStyleSurveySubmission']['agent_email_address']; ?>"><?php echo $submission['BehavioralStyleSurveySubmission']['agent_email_address']; ?></a></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><?php echo $this->BehavioralStyleSurvey->formatPhoneNumber($submission['BehavioralStyleSurveySubmission']['phone_number']); ?></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><?php echo $this->BehavioralStyleSurvey->formatPhoneNumber($submission['BehavioralStyleSurveySubmission']['fax_number']); ?></td>
			</tr>
			<tr>
				<td>Team or agent name</td>
				<td><?php echo $submission['BehavioralStyleSurveySubmission']['team_or_agent_name']; ?></td>
			</tr>
			<tr>
				<td>PDF link</td>
				<td><a href="<?php echo $submission['BehavioralStyleSurveySubmission']['attachment_url']; ?>"><?php echo $submission['BehavioralStyleSurveySubmission']['attachment_url']; ?></a></td>
			</tr>
			<tr>
				<td>Survey title</td>
				<td><?php echo $submission['BehavioralStyleSurvey']['title']; ?></td>
			</tr>
			<tr>
				<td>Behavioral Style</td>
				<td><?php echo $submission['BehavioralStyleSurveyBehavioralStyle']['name']; ?></td>
			</tr>
		
		</table>
	</div>
	<div>
			<img src="<?php echo $submission['BehavioralStyleSurveySubmission']['chart_url']; ?>" alt="client's behavioral chart">
	</div>
	
	
</div>