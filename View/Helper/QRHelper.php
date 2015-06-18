<?php
App::uses('AppHelper', 'View/Helper');
App::import('Vendor', 'phpqrcode', array('file' => 'phpqrcode/qrlib.php'));

class QRHelper extends AppHelper {
    public function generarQR($text){
        QRcode::png($text);
    }
    public function crearQRfile($text){
        $timezone = new DateTimeZone('America/Managua');
        $date = new DateTime('now', $timezone);
        QRcode::png($text, 'filename.png');
    }
}