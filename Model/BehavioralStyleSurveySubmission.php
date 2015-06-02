<?php

/**
 * BehavioralStyleSurveySubmission class file
 * 
 * @copyright Copyright 2010-2015, Radar Hill Technology Inc.
 * (http://radarhill.com)
 * @package App.Plugin.BehavioralStyleSurveys.Model
 * @since Pyramid CMS v 1.0.4
 */
class BehavioralStyleSurveySubmission extends BehavioralStyleSurveysAppModel
{
	public $belongsTo = 'BehavioralStyleSurveyBehavioralStyle, BehavioralStyleSurvey';
	public $data;
	public $behavioralStyle;
	
	
	
	public $validate = array(
		'name' => array( 
			'rule' => 'notEmpty'
		),
		'phone_number' => array(
			'rule' => array('numeric'), //'numeric', 
			'message' => 'Please enter a valid phone number (numbers only).'
		),
		'team_or_agent_name' => array( 
			'rule' => 'notEmpty'
		),
		'agent_email_address' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please enter a valid email address.'
			),
			'email' => array(
				'rule' => 'email',
				'message' => 'Please enter a valid email address.'
			),
		),
		 'submissionSelectedOption' => array(
			'rule' => 'validateSubmissionSelectedOption',
			'message' => 'To get an accurate result, please answer all of the questions.'
		) 
	);
	
 	public function validateSubmissionSelectedOption($data) {
		$filtered = array_filter($data['submissionSelectedOption']);
		
		$count = count($filtered);
		if($count != 18) {
		
			return false;
		}
		return true;
	} 
	
	public function beforeValidate($options) {
		return true;
	}
	
	public function beforeSave($options = array()) {
		$this->processSubmission();
	}	
	
	public function processSubmission() {	
	
	
		$selectedOptions = $this->data['BehavioralStyleSurveySubmission']['submissionSelectedOption']; 
		$weights = array(
			'O' => 0,
			'D' => 0,
			'I' => 0,
			'S' => 0
		);

		
		foreach ($selectedOptions as $selectedOption) {
			if ($selectedOption) {
				$weights[$selectedOption]++;
			}
		}

		$y = $weights['O'] - $weights['S'];
		$x = $weights['D'] - $weights['I'];

		if ($x >= 0 && $y <= 0) {
			$symbol = 'D';
		} else if ($x >= 0 && $y >= 0) {
			$symbol = 'I';
		} else if ($x <= 0 && $y >= 0) {
			$symbol = 'S';
		} else {
			$symbol = 'C';
		}
		
		$behavioralStyle = $this->BehavioralStyleSurveyBehavioralStyle->find('first', array(
			'conditions' => array(
				'symbol' => $symbol
			)
		));

		$this->data['BehavioralStyleSurveySubmission']['behavioral_style_survey_behavioral_style_id'] = $behavioralStyle['BehavioralStyleSurveyBehavioralStyle']['id'];
		$this->data['BehavioralStyleSurveySubmission']['weight_S'] = $weights['S'];
		$this->data['BehavioralStyleSurveySubmission']['weight_O'] = $weights['O'];
		$this->data['BehavioralStyleSurveySubmission']['weight_I'] = $weights['I'];
		$this->data['BehavioralStyleSurveySubmission']['weight_D'] = $weights['D'];
		
		
		$chartIn = Router::url('/app/webroot/bh-chart/index.php?', true) . 'S=' . $weights['S'] . '&O=' . $weights['O'] . '&I=' . $weights['I'] . '&D=' . $weights['D'];
		
		$chartOut = '/home/corcorancoaching/corcorancoaching.com/app/webroot/bh-chart/style_chart_' . $weights['S'] . $weights['O'] . $weights['I'] . $weights['D'] . '.jpg';
		
		file_put_contents( $chartOut , file_get_contents( $chartIn ) );

		$this->data['BehavioralStyleSurveySubmission']['chart_url'] = Router::url('/app/webroot/bh-chart/style_chart_' . $weights['S'] . $weights['O'] . $weights['I'] . $weights['D'] . '.jpg', true);

		if ($symbol == 'S') { // S (-, +)
			if ($x < -4.5 && $y > 4.5) {
				// S1
				$attachment_url		= 'webroot/pdf/1.pdf';
			} else if ($x > -4.5 && $y > 4.5) {
				// S2
				$attachment_url		= 'webroot/pdf/2.pdf';
			} else if ($x < -4.5 && $y < 4.5) {
				// S3
				$attachment_url		= 'webroot/pdf/3.pdf';
			} else {
				// S4
				$attachment_url		= 'webroot/pdf/4.pdf';
			}
		} else if ($symbol == 'I') { // I (+, +)
			if ($x < 4.5 && $y > 4.5) {
				// I1
				$attachment_url		= 'webroot/pdf/5.pdf';
			} else if ($x > 4.5 && $y > 4.5) {
				// I2
				$attachment_url		= 'webroot/pdf/6.pdf';
			} else if ($x < 4.5 && $y < 4.5) {
				// I3
				$attachment_url		= 'webroot/pdf/7.pdf';
			} else {
				// I4
				$attachment_url		= 'webroot/pdf/8.pdf';
			}
		} else if ($symbol == 'C') { // C (-, -)
			if ($x < -4.5 && $y > -4.5) {
				// C1
				$attachment_url		= 'webroot/pdf/9.pdf';
			} else if ($x > -4.5 && $y > -4.5) {
				// C2
				$attachment_url		= 'webroot/pdf/10.pdf';
			} else if ($x < -4.5 && $y < -4.5) {
				// C3
				$attachment_url		= 'webroot/pdf/1.pdf';
			} else {
				// C4
				$attachment_url		= 'webroot/pdf/12.pdf';

			}
		} else { // D (+, -)
			if ($x < 4.5 && $y > -4.5) {
				// D1
				$attachment_url		=  'webroot/pdf/13.pdf';
			} else if ($x > 4.5 && $y > -4.5) {
				// D2
				$attachment_url		= 'webroot/pdf/14.pdf';
			} else if ($x < 4.5 && $y < -4.5) {
				// D3
				$attachment_url		= 'webroot/pdf/15.pdf';
			} else {
				// D4
				$attachment_url		= 'webroot/pdf/16.pdf';
			}
		}
		
		$this->data['BehavioralStyleSurveySubmission']['attachment'] = APP . $attachment_url;
		$this->data['BehavioralStyleSurveySubmission']['attachment_url'] = Router::url('/app/' . $attachment_url, true);
		
		
	}
	
	public function getAttachmentUrl() {
		return $this->attachment_url;
	}
}
	


