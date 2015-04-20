<?php
App::uses('AppController', 'Controller');
/**
 * UserPermissions Controller
 *
 * @property UserPermission $UserPermission
 * @property User $User
 */
class UserPermissionsController extends AppController {
    
    public function index() {
        $acos_Permissions = $this->UserPermission->getAcos();
        $this->set('acos_Permissions',$acos_Permissions);
        //print_r($acos_Permissions);
        //var_dump($acos_Permissions);
        //exit();
    }
}