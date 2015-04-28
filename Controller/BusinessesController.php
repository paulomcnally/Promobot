<?php
App::uses('AppController', 'Controller');
/**
 * Businesses Controller
 *
 * @property Business $Business
 */
class BusinessesController extends AppController {

	/**
	 * Components used by Business controller
	 * @var $components
	 */
	public $components = array('RequestHandler','DataTable');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if($this->RequestHandler->responseType() == 'json') {
			$this->paginate = array(
					'fields' => array('id', 'name', 'created', 'modified'),
					'link' => array(
							'User' => array(
									'fields' => array('id','username','full_name')
							)
					)
			);
			$this->DataTable->mDataProp = true;
			$this->set('response', $this->DataTable->getResponse());
			$this->set('_serialize','response');
		}
        
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
        
		$options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
		$this->set('business', $this->Business->find('first', $options));
        //$this->set('business',$this->Business->find('first', array('contain' => array('Category'))));
        //$this->set('_serialize', array('business'));
        
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $this->loadModel('Promotion');
		if ($this->request->is('post')) {
                        //var_dump($this->data['Image'][0]['name']);
                        //exit();
			//var_dump($this->request->data('Promotion'));
			//exit();
			$path = "business";
			$fileComponent = $this->Components->load('File');
			$mensaje = "";
                            if(isset($this->data['Image'])){
				$images = $this->data['Image'];
				$i = 0;
				foreach($images as $image){
					$imageUpload = $fileComponent->uploadFile($image, $path);
					if($imageUpload){
						$this->request->data['Image'][$i]['name'] = $path.DS.$imageUpload;
                                        }
					else{
						$mensaje .= 'La imagen '.$imageUpload.' no pudo ser guardada, renombrela e intente de nuevo';
						unset($this->request->data['Image'][$i]);
					}
					$i++;
				}
			}
			$logo = $this->data['Business']['logo'];
                        //var_dump($logo['name']);
                        //exit();
			$logoUpload = $fileComponent->uploadFile($logo, $path);

			if($logoUpload){
				$this->request->data['Business']['logo'] = $path.DS.$logoUpload;
                        }
			else{
				$this->request->data['Business']['logo'] = '';
				$mensaje .= 'El logo no pudo ser guardado, renombrarlo e intentar de nuevo.';
			}

			$this->Business->create();
			if ($this->Business->saveAll($this->request->data, array('deep' => true))) {
				$mensaje .= 'El negocio fue guardado.';
				$this->Session->setFlash(__($mensaje));
				$this->redirect(array('action' => 'index'));
			} else {
				$mensaje .= 'El negocio no pudo ser guardado.';
				$this->Session->setFlash(__($mensaje));
			}
                       /* if($this->request->data('Promotion')){
                            echo 'estamos en promocion';
                            exit();
                        }
                            
                        $this->Promotion->create();
                        if($this->Promotion->save($this->request->data)){
                        	$mensaje .= 'la promocion fue guardado.';
				$this->Session->setFlash(__($mensaje));
				$this->redirect(array('action' => 'index'));
			} else {
				$mensaje .= 'la promocion no pudo ser guardado.';
				$this->Session->setFlash(__($mensaje));
			}*/
                        
		}
        //Codigo para mostrar categorias
        
        
		$parentCategories = $this->Business->Category->find('list', array(
				'fields'=>'categories_id',
				'order'=>'Category.categories_id ASC',
				'group' => 'categories_id'));
		$options = array('conditions' => array('Category.id not in' => $parentCategories),'order' => array('Category.name'));
		$categories = $this->Business->Category->find('list',$options);
		$users = $this->Business->User->find('list');
		$this->set(compact('categories', 'users'));
	}

	private function setCategory($category){
		if($category == 'Hotel' || $category == 'HOTEL' || $category == 'Condo Hotel' || $category == 'Aparto-Hotel')
			return "Hoteles";

		if($category == "Motel")
			return "Moteles";

		if($category == "Hostal Familiar")
			return "Hostales";

		return $category;
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
		
		$options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
                $currentBusiness = $this->Business->find('first', $options);
		if ($this->request->is('post') || $this->request->is('put')) {
            //var_dump($this->request->data);
		//	exit();
			$path = "business";
			$fileComponent = $this->Components->load('File');
			//$currentBusiness = $this->Business->find('first', $options);

			$mensaje = "";

			//Check if business image is set and replace
                        //var_dump($this->data['Image']);
                        //exit();
			if(isset($this->data['Image'])){
				$images = $this->data['Image'];
				$fileComponent = $this->Components->load('File');
				$i = 0;
				foreach($images as $image){
					$imageUpload = $fileComponent->uploadFile($image, $path);
					if($imageUpload){
						$this->request->data['Image'][$i]['name'] = $path.DS.$imageUpload;
                                        }
					else {
						unset($this->request->data['Image'][$i]);
						$mensaje .= 'La imagen '.$imageUpload.' no pudo ser guardada, renombrela e intente de nuevo';
					}
					$i++;
				}
			}

			//Check if business logo is set and replace
			$logo = $this->data['Business']['logo'];
			if($logo['name'] != ''){
				$newFile = $fileComponent->replaceFile($logo, $path, $currentBusiness['Business']['logo']);
				if($newFile)
					$this->request->data['Business']['logo'] = $path.DS.$newFile;
				else{
					$this->request->data['Business']['logo'] = '';
					$mensaje .= "Error al editar logo. Renombrelo e intente de nuevo.";
				}
			}else{
				$this->request->data['Business']['logo'] = $currentBusiness['Business']['logo'];
			}

			//Save Business
			if ($this->Business->saveAll($this->request->data, array('deep' => true))) {
				$mensaje .= 'El negocio fue guardado.';
				$this->Session->setFlash(__($mensaje));
				$this->redirect(array('action' => 'index'));
			} else {
				$mensaje .= 'Error al guardar el negocio.';
				$this->Session->setFlash(__($mensaje));
			}
		} else {
            
			$options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
			$this->request->data = $this->Business->find('first', $options);
		}
		$parentCategories = $this->Business->Category->find('list', array(
				'fields'=>'categories_id',
				'order'=>'Category.categories_id ASC',
				'group' => 'categories_id'));

		//codigo añadido para obtener categorias
        $categories_id = array();
        foreach($currentBusiness['Category'] as $cat_id){
           
            array_push($categories_id,$cat_id['id']);
            
        }
        
        if(count($categories_id) > 1){
            $options = array('conditions' => array('Category.id in' => $categories_id),'order' => array('Category.name'));
            $categories = $this->Business->Category->find('list',$options);
        }
        else{
        
            $options = array('conditions' => array('Category.id' => $categories_id),'order' => array('Category.name'));
            $categories = $this->Business->Category->find('list',$options); 
        }

        //fin codigo añadido
            	$users = $this->Business->User->find('list');
		$options = array('conditions' => array('businesses_id' => $id));
		$details = $this->Business->BusinessDetail->find('all',$options);
		$images = $this->Business->Image->find('all',$options);
		$cities = $this->Business->BusinessDetail->City->find('all');
                $promotions = $this->Business->Promotion->find('all',$options);
                foreach ($promotions as &$promotion){
			unset($promotion['Businesses']);
		}
               //var_dump($promotions);
               //exit();
		foreach ($details as &$detail){
			unset($detail['Business']);
			unset($detail['City']);
		}
		$this->set(compact('categories', 'users', 'details', 'cities', 'images','parentCategories','promotions'));
		//cambio añadido:
	    $options = array('conditions' => array('Business.' . $this->Business->primaryKey => $id));
		$this->set('business', $this->Business->find('first', $options));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Business->id = $id;
		if (!$this->Business->exists()) {
			throw new NotFoundException(__('Invalid business'));
		}

		$this->request->onlyAllow('post', 'delete');
		$options = array('conditions' => array('Business.'.$this->Business->primaryKey => $id));
		$currentBusiness = $this->Business->find('first',$options);
		$fileComponent = $this->Components->load('File');
		$fileComponent->deleteFile($currentBusiness['Business']['image']);
		$fileComponent->deleteFile($currentBusiness['Business']['logo']);

		if ($this->Business->delete()) {
			$this->Session->setFlash(__('Business deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Business was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * Delete business image
	 */
	public function deleteImage(){
		$id = $this->request->data('id');
		$this->Business->Image->id = $id;
		$response = false;
		if ($this->Business->Image->exists()) {
			$option = array('id' => $id);
			$image = $this->Business->Image->find('first',$option);
			$fileComponent = $this->Components->load('File');
			$fileComponent->deleteFile($image['Image']['name']);
			if($this->Business->Image->delete($option))
				$response = true;
		}

		$this->set(compact('response'));
	}

	public function tree(){

	}

	/**
	 * getTreeInfo
	 * Get Data for the tree
	 */
	public function getTreeInfo(){
		$id = $this->request->data['id'];
		$response = array();
		$this->Business->Category->recursive = -1;
		if($this->request->data['type'] != 2 && $this->request->data['type'] != 3){
			if($id == 0){
				$options = array('conditions' => array('Category.id' => '1'));
				$categories = $this->Business->Category->find('all',$options);
				foreach($categories as $category){
					array_push($response, array('name' => $category['Category']['name'],
					'id' => $category['Category']['id'],
					'type' => '1'));
				}
			}else{
				$options = array('conditions' => array('Category.categories_id' => $id,'Category.id !=' => '1'));
				$categories = $this->Business->Category->find('all',$options);
				if(count($categories) > 0){
					foreach($categories as $category){
						array_push($response, array('name' => $category['Category']['name'],
						'id' => $category['Category']['id'],
						'type' => '1'));
					}
				}else{
					$business = $this->Business->getBusinessByCategoryId($id);
					foreach($business as $bus){
						array_push($response, array('name' => $bus['Business']['name'],
						'id' => $bus['Business']['id'],
						'type' => '2'));
					}
				}
			}
		}else{
			if($this->request->data['type'] == 2){
				$this->loadModel('BusinessDetail');
				$business_details = $this->BusinessDetail->find('all',array('conditions' => array('BusinessDetail.businesses_id' => $id)));
				foreach($business_details as $detail){
					array_push($response, array('name' => $detail['BusinessDetail']['direccion'],
					'id' => $detail['BusinessDetail']['id'],
					'type' => '3'));
				}
			}
		}
		$this->set(compact("response"));
	}

	/**
	 * Export
	 */
	public function export(){
		$this->Business->recursive = 2;
		$businesses = $this->Business->find('all');
		$business_list = array();
		foreach($businesses as $business){
			$categories = '';
			foreach($business['Category'] as $category){
				$categories .= $category['name'].",";
			}
			$categories = rtrim($categories, ",");
			foreach($business['BusinessDetail'] as $details){
				$business_detail = array();
				$business_detail['name'] = $business['Business']['name'];
				$business_detail['category'] = $categories;
				$business_detail['direccion'] = $details['direccion'];
				$business_detail['lat'] = $details['lat'];
				$business_detail['long'] = $details['long'];
				$business_detail['city'] = $details['City']['name'];
				$business_detail['phone_numbers'] = '';
				$phone_number = '';
				foreach($details['PhoneNumber'] as $phone){
					$phone_number .= $phone['phone_number'].",";
				}
				$business_detail['phone_numbers'] = rtrim($phone_number, ",");
				$business_detail['descripcion'] = $business['Business']['descripcion'];
				$business_detail['facebook'] = $business['Business']['facebook'];
				$business_detail['wifi'] = $business['Business']['wifi'];
				$business_detail['games'] = $business['Business']['games'];
				$business_detail['web'] = $business['Business']['web'];
				$business_detail['email'] = $business['Business']['email'];
				$business_detail['phone'] = $business['Business']['phone'];

				array_push($business_list,$business_detail);
			}
		}
		$file = new File("files/business.json", true);
		$data = json_encode($business_list);
		$file->write($data);
		$this->set(compact('business_list'));
	}

	public function loadBusinessFile(){
		$path = "business";
		$fileComponent = $this->Components->load('File');
		$fbComponent = $this->Components->load('FacebookGraph');
		$file_name = "business.xlsx";
		$this->loadModel("City");
		$this->loadModel("Category");

		$this->Business->recursive = -1;
		if($file_name){
			$excelComponent = $this->Components->load('Excel');
			$excel_info = $excelComponent->readFile('files'.DS.$path.DS.$file_name);
			$business = array();
			$count = 0;
			foreach ($excel_info as $info){
				if($count == 0){
					$count++;
				}else{
					$count++;
					$options = array('conditions' => array('Business.name = ' => $info['A']));
					$business = $this->Business->find('first',$options);
					$new_business = array();
					if(isset($business['Business']['id'])){
						$new_business = $business;
					}else{
						if($info['I'] != ''){
							$new_business = $fbComponent->getBusiness($info['I']);
						}
						$new_business['Business']['name'] = $info['A'];
						if(!isset($new_business['Business']['descripcion']))
							$new_business['Business']['descripcion'] = $info['H'];
						if(!isset($new_business['Business']['phone']))
							$new_business['Business']['phone'] = $info['O'];
						if(!isset($new_business['Business']['web']))
							$new_business['Business']['web'] = $info['L'];

						$new_business['Business']['users_id'] = 1;
						$new_business['Business']['wifi'] = $info['J'];
						$new_business['Business']['games'] = $info['K'];
					}

					$new_business['BusinessDetail'][0]['direccion'] = $info['C'];
					$new_business['BusinessDetail'][0]['lat'] = $info['D'];
					$new_business['BusinessDetail'][0]['long'] = $info['E'];

					$phones = array();

					if (strpos($info['G'],',') !== false)
						$phones = explode(",",$info['G']);
					else
						$phones[0] = $info['G'];

					$p = 0;
					foreach ($phones as $phone){
						if($phone != ""){

							$new_business['BusinessDetail'][0]['PhoneNumber'][$p]['phone_number'] = trim($phone);
							$p++;
						}
					}

					if($info['F'] == "RAAN")
						$info['F'] = "R.A.A.N";

					if($info['F'] == "RAAS")
						$info['F'] = "R.A.A.S";

					if($info['F'] == "Chotales")
						$info['F'] = "Chontales";

					$options = array('conditions' => array('City.name = ' => $info['F']));
					$city = $this->City->find('first',$options);

					if(!isset($city['City']['id']))
						echo "ERROR!!! Ciudad: ".$info['F']." no fue encontrada";

					$new_business['BusinessDetail'][0]['cities_id'] = $city['City']['id'];

					$categories = array();

					if (strpos($info['B'],',') !== false)
						$categories = explode(",",$info['B']);
					else
						$categories[0] = $info['B'];

					$c = 0;
					foreach($categories as $category){
						$category = trim($this->setCategory($category));

						$options = array('conditions' => array('Category.name like ' => $category));
						$category = $this->Business->Category->find('first',$options);
						if(isset($category['Category']['id'])){
							$new_business['Category']['Category'][$c] = $category['Category']['id'];
						}else{
							var_dump($options);
							break;
						}
						$c++;
					}

					if($new_business['Category']['Category'][0] == null){
						echo "ERROR! Categoria no encontrada ".$info['B'];
						break;
					}

					if($this->Business->saveAll($new_business, array('deep' => true)))
						echo "Negocio ".$new_business['Business']["name"]." agregado </br>";
					else {
						echo "</br>ERROR!! ";
						echo "<pre>";
						var_dump($new_business);
						break;
					}
				}
				// 					if($count == 3)
					// 						break;
			}
		}

		exit();
	}

	/**
	 * Exportar a excel
	 */
	public function excel(){
		$file = new File("files/business.json");
		$json = $file->read(true,'r');
		$business = json_decode($json);
		$titles = array('Nombre','Categoria','Direccion','Lat','Long','Ciudad','Numeros','Descripcion','Facebook','Wi-Fi','Juegos','Web','Email','Numero principal');
		$excelComponent = $this->Components->load('Excel');
		$writer = $excelComponent->write($titles,$business);
		exit();
	}

	/**
	 * setBusinessDetails
	 * Initial set fot business details
	 */
	public function setBusinessDetails(){
		$options = array('conditions' => array('details' => ''));
		$business = $this->Business->find('all');
		$this->loadModel('BusinessDetail');
		$count = 0;
		foreach($business as $bus){
			$this->BusinessDetail->setBusinessDetail($bus['Business']['id']);
			$count++;
		}
		$this->set(compact("count"));
	}

	public function changeBusinessPhone(){
 		$this->loadModel('BusinessDetail');
 		$this->BusinessDetail->updatePhoneNumbers();
		$this->loadModel('PhoneNumber');
		$this->PhoneNumber->updatePhoneNumbers();
	}
    
    //codigo de prueba
    public function debug() {
            debug($this->Business->find('first', array('contain' => array('Category'))));
            $this->autoRender = false;
    }
    
    
    //codigo para probar peticiones AJAX
    public function listarnegocio($id = null) {
		if (!$this->Business->exists($id)) {
			throw new NotFoundException(__('Invalid business'));
		}
        
      $this->set('business',$this->Business->find('first', array('conditions' => array('Business.' . $this->Business->primaryKey => $id), 'contain' => array('Category'))));
        $this->set('_serialize', array('business'));
    }
    
}
