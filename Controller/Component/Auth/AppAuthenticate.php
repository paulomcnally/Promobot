<?php
App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('UsersController', 'Controller');

class AppAuthenticate extends BaseAuthenticate{
	
	private $userController;
	
	public function __construct(){
		$this->userController = new UsersController();
	}
	
	public function authenticate(CakeRequest $request, CakeResponse $response){
		$params = json_decode($request->query('params'),true);
		if(!isset($params['username'])){
			$params = json_decode($request->data('params'),true);
		}
 		$options = array('conditions' => array('User.username' . $this->userController->User->username => $params['username']));
 		$result = $this->userController->User->find('first', $options);
 		if($result){
 			$password = sha1($result['User']['username'].$result['User']['password']);
 			if("infobot".$password == $params['auth'])
 				return $result['User'];
 		}
		return false;
	}
}