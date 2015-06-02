<?php

/**
 * BehavioralStyleSurveySubmissionsController class file
 * 
 * @copyright Copyright 2010-2015, Radar Hill Technology Inc.
 * (http://radarhill.com)
 * @package App.Plugin.BehavioralStyleSurveys.Controller
 * @since Pyramid CMS v 1.0.4
 */
class BehavioralStyleSurveySubmissionsController extends BehavioralStyleSurveysAppController
{

	public function admin_index() {
		$conditions = array();
	
		$this->AutoPaginate->setPaginate(array(
			'conditions' => $conditions
		));
		
		$items = $this->paginate();
		$this->set(compact('items'));
		
	}

	public function view($id) {
		parent::admin_edit($id);
	}
	
	public function admin_view($id) {		
		$submission = $this->BehavioralStyleSurveySubmission->find('first', array(
			'conditions' => array('BehavioralStyleSurveySubmission.id' => $id),	
			'contain' => array('BehavioralStyleSurveyBehavioralStyle', 'BehavioralStyleSurvey')
		));
		
		
		$header = 'Behavioral Style Survey Submission for ' . $submission['BehavioralStyleSurveySubmission']['name'];
		$this->set(compact('header', 'submission'));
	}
	
	public function add() {
		parent::add();
	}
}

