<?php
App::uses('CmsEventListener', 'Event');
/**
 * BehavioralStyleSurveysEventListener class file
 * 
 * @copyright Copyright 2010-2015, Radar Hill Technology Inc.
 * (http://radarhill.com)
 * @package App.Plugin.BehavioralStyleSurveys.Event
 * @since Pyramid CMS v 1.0.4
 */
class BehavioralStyleSurveysEventListener extends CmsEventListener
{
public $implementedEvents = array(
		'Component.AdminNav.pluginNav' => array(
			'callable' => 'onAdminNavPluginNav'
		)
	);
	
	
	
		public function onAdminNavPluginNav($event) {
		$items = array(
			Configure::read('Plugins.BehavioralStyleSurveys.alias') => array(
				'link' => array(
							'plugin' => 'behavioral_style_surveys',
							'controller' => 'behavioral_style_survey_submissions',
							'action' => 'index'
						)
				, 'children' => array(
					'Manage Surveys' => array(
						'link' => array(
							'plugin' => 'behavioral_style_surveys',
							'controller' => 'behavioral_style_surveys',
							'action' => 'index'
						)
					),
					'View Submissions' => array(
						'link' => array(
							'plugin' => 'behavioral_style_surveys',
							'controller' => 'behavioral_style_survey_submissions',
							'action' => 'index'
						)
					),
					'Add a New Survey' => array(
						'link' => array(
							'plugin' => 'behavioral_style_surveys',
							'controller' => 'behavioral_style_surveys',
							'action' => 'edit'
						)
					)
				)
			)
		);

		
		$event->result = Set::merge($event->result, $items);
	}


}

