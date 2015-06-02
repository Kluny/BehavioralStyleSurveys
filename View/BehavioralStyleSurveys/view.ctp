	<?php echo $this->Form->create('BehavioralStyleSurveySubmission'); ?>
		<?php
		echo $this->Form->input('name', array('label' => 'Name*'));
		echo $this->Form->input('behavioral_style_survey_id', array('type' => 'hidden', 'value' => $survey[0]['BehavioralStyleSurvey']['id']));

		echo $this->Form->input('phone_number', array('label' => 'Phone Number*'));
		
		echo $this->Form->input('fax_number');
		echo $this->Form->input('team_or_agent_name', array('label' => 'Team or Agent Name*'));
		echo $this->Form->input('agent_email_address', array('label' => 'Agent Email Address*'));
		?>
		<p>This is an informal survey, designed to determine how you usually interact with others in everyday situations. The purpose of this questionnaire is to get a clear description of how you see yourself.  Please be as candid as possible. Compare each set of statements. <b>Then, select one of the statements that best describes you most of the time, in most situations, and with most people.</b></p>
		
		
		<?php 
		$survey = $this->BehavioralStyleSurvey->survey();
		
		echo $this->Form->error('submissionSelectedOption', array('class' => 'error-message'));
		
		foreach ($survey as $i => $surveyChoice): ?>
			<?php
			echo $this->Form->radio("BehavioralStyleSurveySubmission.submissionSelectedOption.$i", array(
				$surveyChoice[0]['value'] => $surveyChoice[0]['label'],	
				$surveyChoice[1]['value'] => $surveyChoice[1]['label']
		), array('legend' => $i + 1));
			?>
		<?php endforeach; ?>
	<?php echo $this->Form->end('Submit'); ?>
