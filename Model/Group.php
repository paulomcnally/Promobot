<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 */
class Group extends AppModel {

/**
 * AclBehavior
 * @var $actAs
 */
	public $actsAs = array('Acl' => array('type' => 'requester'));
	
/**
 * parentNode method
 * @return NULL
 */
	public function parentNode() { 
		return null;
	}
}
