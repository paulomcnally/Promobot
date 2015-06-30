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
           return $this->query($sql,$cachequeries = false);
        }
        
        
        public function savePromoQr($pid,$lid,$date,$cript){
           $sql = "insert into promotionqr(id,promotions_id,fecha,code,active,qrimage) values( " . $lid . "," . $pid . ",FROM_UNIXTIME(".$date.")," . "'" .  $cript . "'" . ",1," . "'" .$cript.$pid.".png". "'" . ");";
           $this->query($sql,$cachequeries = false);  
        }
        
        public function getImage($id){
            $sql = "select qrimage from promotionqr where promotions_id = " . $id;
            return $this->query($sql,$cachequeries = false);
        }
        
        public function deletePromoQr($pid){
            $path = 'img/promotions/';
            $img = $this->query("select qrimage from promotionqr where promotions_id = " . $pid,$cachequeries = false);
            $image = $path . $img[0]['promotionqr']['qrimage']; //recuperamos nombre de imagen
            
            $sql = "delete from promotionqr where promotions_id = " . $pid; //eliminamos QR de promocion
            $this->query($sql,$cachequeries = false);

            unlink($image);//eliminamos imagen asociada a esta promocion
        }
        
}
