<?php
App::uses('AppModel', 'Model');
/**
 * PhoneNumber Model
 *
 * @property BusinessDetails $BusinessDetails
 */
class PhoneNumber extends AppModel {

	/**
	 * Update phone number, remove (505)
	 */
	public function updatePhoneNumbers(){
		$details = $this->find('all');
		foreach($details as $detail){
			if($detail['PhoneNumber']['phone_number'] != ''){
				$detail['PhoneNumber']['phone_number'] = str_replace('(505)', '+505', $detail['PhoneNumber']['phone_number']);
				$detail['PhoneNumber']['phone_number'] = str_replace('+505 ', '+505', $detail['PhoneNumber']['phone_number']);
				$this->save($detail['PhoneNumber']);
			}
		}
	}
}
