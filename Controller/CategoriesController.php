<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$categories = $this->Category->find('all');
                //codigo de prueba
                $parentCategories = $this->Category->find('list', array(
				'fields'=>'categories_id',
				'order'=>'Category.categories_id ASC',
				'group' => 'categories_id'));
                $options = array('conditions' => array('Category.id in' => $parentCategories),'order' => array('Category.name'));
		$p_categories = $this->Category->find('list',$options);
		/*$p_Categories = $this->Category->find('list', array(
				'fields'=>'categories_id',
				'order'=>'Category.categories_id ASC',
				'group' => 'categories_id'));*/
		$this->set(compact('categories','p_categories'));
	}

	/**
	 * List sub categories
	 * @param string $id
	 * @throws NotFoundException
	 */
	public function subcategories($id = null){
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Categoria Invalida'));
		}
		$this->paginate = array(
				'conditions' => array('Category.categories_id' => $id),
				'limit' => 20
		);
		$categories = $this->paginate('Category');
		$this->set(compact('categories'));
	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($id = null) {		
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}
	
	public function replaceImages(){
		$fileComponent = $this->Components->load('File');
		$this->Category->recursive = -1;
		$categorias = $this->Category->find("all");		
		foreach($categorias as $categoria){
			if($categoria['Category']['image'] != ""){																			
				$new_name = $fileComponent->renameFile($categoria['Category']['image'], "categories",$categoria['Category']['name'].".png");
				$categoria['Category']['image'] = $new_name;
				$this->Category->save($categoria);
			}		
		}
		var_dump($categorias);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$path = "categories";
			$file = $this->data['Category']['image'];
			$fileComponent = $this->Components->load('File');
			$fileUpload = $fileComponent->uploadFile($file, $path);
			$mensaje = "";
			if($fileUpload){
				$this->request->data['Category']['image'] = $path.DS.$fileUpload;
			}else{
				$mensaje .= "Error al guardar la imagen. Renombrela e intente de nuevo";
				$this->request->data['Category']['image'] = '';
			}
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved. '.$mensaje));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again. '.$mensaje));
			}
			
		}
		$categories = $this->Category->Parent->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$returnMessage = "";
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		if ($this->request->is('post') || $this->request->is('put')) {
			$file = $this->data['Category']['image'];
			$currentCategory = $this->Category->find('first', $options);
			
			//Check if category image is set and replace
			if($file['name'] != ''){
				$path = "categories";
				$fileComponent = $this->Components->load('File');
				$newFile = $fileComponent->replaceFile($file, $path, $currentCategory['Category']['image']);
				if($newFile)
					$this->request->data['Category']['image'] = $path.DS.$newFile;
				else {
					$returnMessage .= "Error al editar imagen. Renombrarla y volver a intentar.";
				}
			}else{
				$this->request->data['Category']['image'] = $currentCategory['Category']['image'];
			}
			
			//Save Category
			if ($this->Category->save($this->request->data)) {
				$returnMessage .= "Categoria guardada.";
				$this->redirect(array('action' => 'index'));
				$this->Session->setFlash($returnMessage);
			} else {
				$returnMessage .= "Error al editar la categoria.";
				$this->Session->setFlash($returnMessage);
			}
		} else {
			$this->request->data = $this->Category->find('first', $options);
		}
		$categories = $this->Category->Parent->find('list');
		$this->set(compact('categories'));
	}	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		$options = array('conditions' => array('Category.'.$this->Category->primaryKey => $id));
		$currentCategory = $this->Category->find('first',$options);
		$fileComponent = $this->Components->load('File');
		$fileComponent->deleteFile($currentCategory['Category']['image']);
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * Before render
	 * @see Controller::beforeRender()
	 */
	public function beforeRender(){
		//Set referer
		$this->set('referer',$this->referer());
	}
    
    
}
