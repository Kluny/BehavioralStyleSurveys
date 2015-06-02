<?php
/**
 * BehavoralSurveyHelper class
 *
 * @copyright    Copyright 2010-2012, Radar Hill Technology Inc. (http://radarhill.com)
 * @link         http://api.pyramidcms.com/docs/classBehavioralStyleSurveyHelper.html
 * @package      Cms.Plugin.BehavioralStyleSurvey.View.Helper
 * @since        Pyramid CMS v 1.0
 */
class BehavioralStyleSurveyHelper extends AppHelper {

/**
 * Helpers to load
 */
	public $helpers = array(
		'Form' => array('className' => 'AppForm'),
		'Html' => array('className' => 'AppHtml'),
		'MathCaptcha.MathCaptcha',
	); 
	
	public function survey() {
		$surveyChoices = array(
			array(array(
				'value' => 'O',
				'label' => 'Easy to get to know personally, in business or unfamiliar social environments'
			), array(
				'value' => 'S',
				'label' => 'More difficult to get to know personally, in business or unfamiliar social environments'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Focuses conversations on issues and tasks at hand; stay on subject'
			), array(
				'value' => 'O',
				'label' => 'Conversations reflect personal life experiences; may stray from business at hand'
			)),

			array(array(
				'value' => 'I',
				'label' => 'Infrequent contributor to group conversations'
			), array(
				'value' => 'D',
				'label' => 'Frequent contributor to group conversations'
			)),

			array(array(
				'value' => 'I',
				'label' => 'Tends to adhere to the Letter of the law'
			), array(
				'value' => 'D',
				'label' => 'Tends to adhere to the Spirit of the law'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Makes most decisions based in goals, facts or evidence'
			), array(
				'value' => 'O',
				'label' => 'Makes most decisions based on feelings, experiences and relationships'
			)),

			array(array(
				'value' => 'I',
				'label' => 'Infrequent use of gestures and voice intonation to emphasize points'
			), array(
				'value' => 'D',
				'label' => 'Frequently uses gestures and voice intonation to emphasize points'
			)),

			array(array(
				'value' => 'D',
				'label' => 'More likely to make emphatic statements like "This is so!" "I Feel…"'
			), array(
				'value' => 'I',
				'label' => 'More likely to make qualified statements like "According to my sources..."'
			)),

			array(array(
				'value' => 'O',
				'label' => 'Greater natural tendency toward animated facial expressions or observable body responses during speaking and listening'
			), array(
				'value' => 'S',
				'label' => 'More limited facial expressions or observable body responses during speaking and listening'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Tends to keep important feelings private: tends to share only when necessary'
			), array(
				'value' => 'O',
				'label' => 'Tends to be more willing to show or share personal feelings more freely'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Shows less enthusiasm than the average person'
			), array(
				'value' => 'O',
				'label' => 'Shows more enthusiasm than the average person'
			)),

			array(array(
				'value' => 'D',
				'label' => 'More likely to introduce self to others at social gatherings'
			), array(
				'value' => 'I',
				'label' => 'More likely to wait for others to introduce themselves at social gatherings'
			)),

			array(array(
				'value' => 'O',
				'label' => 'Flexible about how own time is used by others'
			), array(
				'value' => 'S',
				'label' => 'Disciplined about how own time is used by others'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Goes with own agenda'
			), array(
				'value' => 'O',
				'label' => 'Goes with the flow'
			)),

			array(array(
				'value' => 'D',
				'label' => 'More naturally assertive behavior'
			), array(
				'value' => 'I',
				'label' => 'More naturally reserved behavior'
			)),

			array(array(
				'value' => 'D',
				'label' => 'Tends to express own views more readily'
			), array(
				'value' => 'I',
				'label' => 'Tends to reserve the expression of own opinions'
			)),

			array(array(
				'value' => 'D',
				'label' => 'Tends to naturally decide more quickly or spontaneously'
			), array(
				'value' => 'I',
				'label' => 'Tends to naturally decide more slowly or deliberately'
			)),

			array(array(
				'value' => 'S',
				'label' => 'Prefers to work independently or dictate the relationship conditions'
			), array(
				'value' => 'O',
				'label' => 'Prefers to work with others or be including in relationships'
			)),

			array(array(
				'value' => 'I',
				'label' => 'Naturally approaches risk or change more slowly or cautiously'
			), array(
				'value' => 'D',
				'label' => 'Naturally approaches risk or change more quickly or spontaneously'
			))
		);
		return $surveyChoices;
	}
	
		
	public function formatPhoneNumber($phoneNumber) {
		$phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

		if(strlen($phoneNumber) > 10) {
			$countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
			$areaCode = substr($phoneNumber, -10, 3);
			$nextThree = substr($phoneNumber, -7, 3);
			$lastFour = substr($phoneNumber, -4, 4);

			$phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
		}
		else if(strlen($phoneNumber) == 10) {
			$areaCode = substr($phoneNumber, 0, 3);
			$nextThree = substr($phoneNumber, 3, 3);
			$lastFour = substr($phoneNumber, 6, 4);

			$phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
		}
		else if(strlen($phoneNumber) == 7) {
			$nextThree = substr($phoneNumber, 0, 3);
			$lastFour = substr($phoneNumber, 3, 4);

			$phoneNumber = $nextThree.'-'.$lastFour;
		}

		return $phoneNumber;
	}
	
}