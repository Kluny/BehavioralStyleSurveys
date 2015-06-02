
<?php 
foreach ($items as $item) {
	$nestedList[] = $this->Html->link($item['BehavioralStyleSurvey']['title'], 
										array('controller' => 'behavioral_style_surveys', 'action' => 'view', $item['BehavioralStyleSurvey']['slug'] ), 
										array()
									);
} 
echo $this->Html->nestedList($nestedList);
?>
	
