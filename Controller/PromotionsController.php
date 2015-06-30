<?php
App::uses('AppController', 'Controller');
/**
 * Promotions Controller
 *
 * @property Promotion $Promotion
 * @property PaginatorComponent $Paginator
 */
class PromotionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','QR','RequestHandler');
        public $helpers = array('QR');


        /**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
            $this->Paginator->settings = array(
        'conditions' => array('Promotion.businesses_id' => $id),
        'limit' => 10
    );
		$this->Promotion->recursive = 0;
               
		$this->set('promotions', $this->Paginator->paginate());
		$this->set(compact('id'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                $this->loadModel('Promotionqr');
                $path = 'promotions/';
		if (!$this->Promotion->exists($id)) {
			throw new NotFoundException(__('Invalid promotion'));
		}
                //codigo para QR
                $img = $this->Promotionqr->query("select qrimage from promotionqr where promotions_id = " . $id);
                $image = $path . $img[0]['promotionqr']['qrimage']; 
                
		$options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
		$this->set('promotion', $this->Promotion->find('first', $options));
                $this->set(compact('image'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
            $this->loadModel('Promotionqr');
		if ($this->request->is('post')) {
                    
                   	$path = "business";
			$fileComponent = $this->Components->load('File');
                        $img = $this->data['Promotion']['image'];
                        $imgUpload = $fileComponent->uploadFile($img, $path);

			if($imgUpload){
                            $this->request->data['Promotion']['image'] = $path.DS.$imgUpload;
                        }
			else{
				$this->request->data['Promotion']['image'] = '';
				$mensaje .= 'la imagen no pudo ser guardada, renombrarla e intentar de nuevo.';
			}
			$this->Promotion->create();
			if ($this->Promotion->save($this->request->data)) {
                                //codigo para procesamiento de codigo QR
                                $date = time();
                                $pid = $this->Promotion->getLastInsertId();
                                $text = $pid . $date;
                                $hash = Security::hash($text, 'md5', false);
                                $this->QR->crearQRfile($hash,$pid);
                        
                                //save promotionsQr data
                                $li = $this->Promotionqr->getLastId();
                                $lid = $li[0][0]['MAX( id )'] + 1;
                                $this->Promotionqr->savePromoQr($pid,$lid,$date,$hash);
                                
				$this->Session->setFlash(__('La promocion fue guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La promocion no pudo ser guardad. Porfavor, Intente nuevamente.'));
			}
                                                
		}
                $options = array('conditions' => array('businesses_id' => $id));
		$promotionDetails = $this->Promotion->PromotionDetail->find('list',$options);
		$this->set(compact('id', 'promotionDetails'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$bid = null) {
                $this->loadModel('Promotionqr');
                $path = 'promotions/';
		if (!$this->Promotion->exists($id)) {
			throw new NotFoundException(__('Invalid promotion'));
		}
                $options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
                $currentPromo = $this->Promotion->find('first', $options);
		if ($this->request->is(array('post', 'put'))) {

                        $path = "business";
			$fileComponent = $this->Components->load('File');
                        
                        $img = $this->data['Promotion']['image'];
			if($img['name'] != ''){
				$newFile = $fileComponent->replaceFile($img, $path, $currentPromo['Promotion']['image']);
				if($newFile)
					$this->request->data['Promotion']['image'] = $path.DS.$newFile;
				else{
					$this->request->data['Promotion']['image'] = '';
					$mensaje .= "Error al editar logo. Renombrelo e intente de nuevo.";
				}
			}else{
				$this->request->data['Promotion']['image'] = $currentPromo['Promotion']['image'];
			}
                        
			if ($this->Promotion->save($this->request->data)) {
				$this->Session->setFlash(__('La promocion fue guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La promocion no pudo ser guardad. Porfavor, Intente nuevamente.'));
			}
		}
                else {
			$options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
			$this->request->data = $this->Promotion->find('first', $options);
		}
                //procesamiento QR
                $img = $this->Promotionqr->query("select qrimage from promotionqr where promotions_id = " . $id);
                $QRempty = empty($img);
//                var_dump($QRempty);
//                exit();
                if(!$QRempty){
                    $image = $path . $img[0]['promotionqr']['qrimage'];
                    $this->set(compact('image','QRempty'));
                }
                else{
                    $this->set(compact('QRempty'));
                }
                
                $options = array('conditions' => array('businesses_id' => $bid));
                $promotionDetails = $this->Promotion->PromotionDetail->find('list',$options);
                $this->set(compact('promotionDetails','currentPromo','id'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Promotion->delete()) {
			$this->Session->setFlash(__('The promotion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The promotion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function getQRImage($id = null){
                $this->loadModel('Promotionqr');
                
                $pid = $this->request->query('id',$cachequeries = false);
                $path = 'promotions/';
                //verificar si ya existe un Qr asignado a esta promocion
                $img = $this->Promotionqr->query("select qrimage from promotionqr where promotions_id = " . $pid,$cachequeries = false);
                
                if(empty($img)){
                    $date = time();
                    $text = $pid . $date;
                    $hash = Security::hash($text, 'md5', false);
                    $this->QR->crearQRfile($hash,$pid);
                        
                    //save promotionsQr data
                    $li = $this->Promotionqr->getLastId();
                    $lid = $li[0][0]['MAX( id )'] + 1;
                    $this->Promotionqr->savePromoQr($pid,$lid,$date,$hash);
                    $img = $this->Promotionqr->getImage($pid);
                    $image = $path . $img[0]['promotionqr']['qrimage'];
                    
                    $container = array();
                    $container['image'] = array();
                    array_push($container['image'], $image);
                    $this->set(array('container' => $container, '_serialize' => 'container'));
                }
                else{
                    $pid = $this->request->query('id',$cachequeries = false);
                    $this->Promotionqr->deletePromoQr($pid);
                    $date = time();
                    $text = $pid . $date;
                    $hash = Security::hash($text, 'md5', false);
                    $this->QR->crearQRfile($hash,$pid);
                        
                    //save promotionsQr data    
                    $li = $this->Promotionqr->getLastId();
                    $lid = $li[0][0]['MAX( id )'] + 1;
                    $this->Promotionqr->savePromoQr($pid,$lid,$date,$hash);
                    $img = $this->Promotionqr->query("select qrimage from promotionqr where promotions_id = " . $pid,$cachequeries = false);
                    $image = $path . $img[0]['promotionqr']['qrimage']; 

                    $container = array();
                    $container['image'] = array();
                    array_push($container['image'], $image);
                    $this->set(array('container' => $container, '_serialize' => 'container'));
                }
        }
}
