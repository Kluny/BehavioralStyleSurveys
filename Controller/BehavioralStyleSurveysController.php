<?php
App::uses('CakeEmail', 'Network/Email');

/**
 * BehavioralStyleSurveysController class file
 * 
 * @copyright Copyright 2010-2015, Radar Hill Technology Inc.
 * (http://radarhill.com)
 * @package App.Plugin.BehavioralStyleSurveys.Controller
 * @since Pyramid CMS v 1.0.4
 */
class BehavioralStyleSurveysController extends BehavioralStyleSurveysAppController
{



	public function admin_index() {
		$conditions = array();
	
		$this->AutoPaginate->setPaginate(array(
			'conditions' => $conditions
		));
		
		$items = $this->paginate();
		$this->set(compact('items'));
		
	}


/***
 * Add a new behavioral style survey. The content remains the same, but users can edit administrator recipient of results, title, and slug.
 */
	public function admin_add() {
		
	}

	public function admin_edit($id = null) {
		parent::admin_edit($id);
	}
	
	public function index() {
		$conditions = array();
		$this->set('items', $this->{$this->modelClass}->find('all', array('conditions' => $conditions)));
	}
	
	public function view($id = null) {
	 	if(!empty($this->request->data)) {
			 $this->loadModel('BehavioralStyleSurveys.BehavioralStyleSurveySubmission');
			
			 $this->BehavioralStyleSurveySubmission->set($this->request->data);
			if($this->BehavioralStyleSurveySubmission->validates()) {
				$this->BehavioralStyleSurveySubmission->save($this->request->data);
				$this->__sendResults($this->request->data);
				$this->set('attachment_url', $this->BehavioralStyleSurveySubmission->attachment_url);
				$this->render('BehavioralStyleSurveys.BehavioralStyleSurveys/thanks'); 
			}  
		} 
			
		$conditions = array( 'BehavioralStyleSurvey.id' => $id );
		$survey = $this->{$this->modelClass}->find( 'all', array( 
							'conditions' => array(
								 'OR' => array(
									$this->modelClass . '.slug' => $id,
									$this->modelClass . '.id' => $id,									
								)
							)
		));
		$this->set(compact('survey'));
	} 
	
	public function __sendResults($data) {	
		$this->loadModel('BehavioralStyleSurveys.BehavioralStyleSurveySubmission');	
		$submission = $this->BehavioralStyleSurveySubmission->find('first', array(
			'conditions' => array('BehavioralStyleSurveySubmission.name' => $data['BehavioralStyleSurveySubmission']['name']),	
			'order' => array('BehavioralStyleSurveySubmission.created DESC'),
			'contain' => array('BehavioralStyleSurveyBehavioralStyle', 'BehavioralStyleSurvey')
		));

		$Email = new CakeEmail();
		$Email->attachments(array('SurveyResults.pdf' => $submission['BehavioralStyleSurveySubmission']['attachment']));
		$Email->viewVars(array('submission' => $submission));
		$Email->from(array('DISC@CorcoranCoaching.com' => 'CorcoranCoaching.com'));

		$bccs = explode(',', $submission['BehavioralStyleSurvey']['recipient']);
		foreach($bccs as $bcc) { 
			$Email->addBcc($bcc);
		}

		$to = array($data['BehavioralStyleSurveySubmission']['agent_email_address'] => $data['BehavioralStyleSurveySubmission']['name'] );
		$Email->to($to);
		
		$Email->subject('Behavioral Style Profile for ' . $data['BehavioralStyleSurveySubmission']['name']);
		$Email->emailFormat('both');
		$Email->template('BehavioralStyleSurveys.results');
		$Email->send();
		return;
	}
	
	
}

