<?php
App::uses('AppModel', 'Model');
/**
 * Promotionqr Model
 *
 */
class Promotionqr extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'promotionqr';

/**
 * Display field
 *
 * @var string
 */
        public $displayField = 'id';
        
        public function getLastId(){
           $sql = 'SELECT MAX( id ) FROM promotionqr;';
           return $this->query($sql);
        }
        
        
        public function savePromoQr($pid,$lid,$date,$cript){
           $sql = "insert into promotionqr(id,promotions_id,fecha,code,active,qrimage) values( " . $lid . "," . $pid . ",FROM_UNIXTIME(".$date.")," . "'" .  $cript . "'" . ",1," . "'" .$cript.".png". "'" . ");";
           $this->query($sql);  
        }
        
        public function getImage($id){
            $sql = "select qrimage from promotionqr where promotions_id = " . $id;
            return $this->query($sql);
        }
}
