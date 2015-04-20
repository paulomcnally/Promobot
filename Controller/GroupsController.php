<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 *
 */
class GroupsController extends AppController {

/**
 * index method
 *
 * @return void
 * 
 *   
 */
	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->loadModel('UserPermission');
            $aro = $this->UserPermission->getAroId($id); //obtener aro
            $aroid = $aro[0]['aros']['id'];           //parsear aro_id
            
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    //var_dump($this->request->data);
                    //exit();
                     $permissions = $this->request->data;
                     $this->UserPermission->deleteAco($aroid);
                     $li = $this->UserPermission->getLastId();
                     $lid = $li[0][0]['MAX( id )'] + 1; 

                     $this->UserPermission->saveAdmin($aroid,$lid);    

                     foreach($permissions['Group']['info'] as $perm){
                         if($perm === 1){
                             continue;
                         }
                         $this->UserPermission->saveAco(++$lid,$aroid,$perm);
                         
                     }

			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);

		}
                
                $info = array();

                $acos = $this->UserPermission->getAcosID($aroid);
               
                foreach ($acos as $acs){
                    $aco_id = $acs['aros_acos']['aco_id'];
                    if($aco_id != '1'){
                        $alias = $this->UserPermission->getAlias($aco_id);
                        if($alias == NULL){
                           $palias = $this->UserPermission->getParentAlias($aco_id);
                           $name = $this->UserPermission->getAlias($aco_id);
                           $info[$name[0]['acos']['id']] = $palias[0]['acos']['alias'] . '/' . $name[0]['acos']['alias'];
                        }
                        foreach ($alias as $al){
                            $palias = $this->UserPermission->getParentAlias($al['acos']['id']);
                            if($palias[0]['acos']['alias'] != "controllers" ){
                               $info[$al['acos']['id']] = $palias[0]['acos']['alias'] . '/' . $al['acos']['alias'];    
                            }
                            else{
                                $info[$al['acos']['id']] = $al['acos']['alias'];
                            }
                            
                            
                        }

                    }
                    /*else{
                        $name = $this->UserPermission->getAlias($aco_id);
                        $info[$aco_id] = $name[0]['acos']['alias'];
                    }*/                    
               }
                
                $this->set('info',$info);
           
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function beforeFilter() { 
		parent::beforeFilter();
		// For CakePHP 2.0
		$this->Auth->allow('*');
		// For CakePHP 2.1 and up
		$this->Auth->allow();
	}
}
