<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('Component', 'Controller');
App::import('Vendor', 'phpqrcode', array('file' => 'phpqrcode/qrlib.php'));

class QRComponent extends Component {
        
    public function crearQRfile($hash){
//        $timezone = new DateTimeZone('America/Managua');
//        $date = new DateTime('now', $timezone);
        QRcode::png($hash,"img/promotions/" . $hash.'.png');
    }
}