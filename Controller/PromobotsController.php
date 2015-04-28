<?php
App::uses('AppController', 'Controller');
/**
 * Promobots Controller
 *
 * @property Promobots $Promobots
*/
class PromobotsController extends AppController {
	/**
	 * Components used by Promobots controller
	 * @var $components
	 */
	public $components = array('RequestHandler');
        
        
        public function getPromotions(){
            $this->loadModel('Promotion');
            
            $promotions = $this->Promotion->find('all',$options = null);
            //var_dump($promotions[3]['PromotionDetail'][0]['id']);
            //var_dump($promotions);
            //exit();
            foreach ($promotions as &$promotion){

                foreach ($promotion['PromotionDetail'] as &$promo){
                    unset($promo['direccion']);
                    unset($promo['version']);
                    unset($promo['lat']);
                    unset($promo['long']);
                    unset($promo['businesses_id']);
                    unset($promo['created']);
                    unset($promo['modified']);
                    unset($promo['cities_id']);
                }
            }
            
            $this->set(compact('promotions'));
            
        }
        
        public function getBusinessesDetails(){
            $this->loadModel('BusinessDetail');
            
            
        }
        
        public function beforeFilter() {
		$this->log(json_encode($this->getRequestParams()),'debug');
		parent::beforeFilter();
		$this->Auth->login();   
	}
	
	/**
	 * Get Request Params
	 * @return mixed
	 */
	private function getRequestParams(){
		$params = json_decode($this->request->query('params'),true);
		if(!isset($params['username']))
			$params = json_decode($this->request->data('params'),true);
		
		return $params;
	}
}
