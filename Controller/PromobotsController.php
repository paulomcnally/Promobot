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
            
            $options = array('conditions' => array('Promotion.start_date <' => date('Y-m-d H:i:s'),'Promotion.end_date >' => date('Y-m-d H:i:s'),'Promotion.active' => '1'),'order' => array('Promotion.end_date DESC'));
            $promotions = $this->Promotion->find('all',$options);
            //var_dump($promotions);
            //exit();
            foreach ($promotions as &$promotion){
                unset($promotion['Businesses']);
                foreach ($promotion['PromotionDetail'] as &$promo){
                    unset($promo['direccion'],$promo['version'],$promo['lat'],$promo['long'],$promo['businesses_id'],$promo['created'],$promo['modified'],$promo['cities_id']);
                }
                foreach($promotion as &$prm){
                    unset($prm['active'],$prm['created'],$prm['modified'],$prm['start_date'],$prm['end_date']);
                }
            }
            //var_dump($promotions);
            //exit();
            $this->set(compact('promotions'));
            
        }
        
        public function getUpdatePromotions(){
            $params = $this->getRequestParams();
            $this->loadModel('Promotion');
            
            if(isset($params['last_update']))
            {
                    $current_date = $params['last_update'];
            }
            else{
                    $current_date = date('Y/m/d');
            }
 
            $new_promos = $this->Promotion->find('all',array(
				'conditions' => array(
				'Promotion.created >' => $current_date
				)
            ));
            
            $options = array('conditions' => array('Promotion.created <' => $current_date,'Promotion.modified >=' => $current_date,'Promotion.active' => '1'));
            $promos = $this->Promotion->find('all',$options);
            //var_dump($promos);
            //exit();
            $this->set(compact('promos','new_promos'));
        }


        public function getUpdateData(){
            $params = $this->getRequestParams();
            //var_dump($params['last_update']);
            //exit();
            $this->loadModel('City');
            $this->loadModel('Business');
            $this->loadModel('Category');
            $this->loadModel('BusinessDetail');
            $this->BusinessDetail->recursive = 1;
            
            $this->log("Last update: ".$params['last_update'],'debug');
		
		if(isset($params['last_update']))
			$current_date = $params['last_update'];
		else
			$current_date = date('Y/m/d');
                
		$new_business = $this->Business->find('all',array(
				'conditions' => array(
				'Business.created >' => $current_date
				)
		));
		
		$option = array('conditions' => array(
				'Business.created <' => $current_date,
				'Business.modified >=' => $current_date)
		);
		$business = $this->Business->find('all',$option);
                
                $new_categories = $this->Category->find('all',array(
				'conditions' => array(
						'Category.created >' => $current_date
				)
		));
                $categories = $this->Category->find('all',array(
				'conditions' => array(
						'Category.created <' => $current_date,
						'Category.modified >' => $current_date
				)
		));
                
                $new_cities = $this->City->find('all',array(
				'conditions' => array(
					'City.created >' => $current_date
				)
		));
		$cities = $this->City->find('all',array(
				'conditions' => array(
					'City.created <' => $current_date,
					'City.modified >' => $current_date
				)
		));
                
		$option = array('conditions' => array(
				'BusinessDetail.created >' => $current_date)
		);
		$new_business_details = $this->BusinessDetail->find('all',$option);
		$option = array('conditions' => array(
				'BusinessDetail.created <' => $current_date,
				'BusinessDetail.modified >' => $current_date)
		);
		$business_details = $this->BusinessDetail->find('all',$option);
		$business_details = array_merge($business_details, $new_business_details);
                
             
                $this->set(compact('new_business','business','business_details','new_cities','cities','categories','new_categories'));
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
                //$params = $this->request->query('params');
		$params = json_decode($this->request->query('params'),true);
		/*if(!isset($params['username']))
			$params = json_decode($this->request->data('params'),true);
		*/
		return $params;
	}
}
