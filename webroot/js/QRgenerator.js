/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function generarQR(id){
        var param = "?id=" + id;

        $.getJSON("/promotions/getQRImage.json" + param, function(data) {

            if(data){
                var img = '/img/'+data.image;
                $("#QRImage").attr("src",img);
            }
        });
}

function cambiarQR(id){
        var param = "?id=" + id;

        $.getJSON("/promotions/getQRImage.json" + param, function(data) {

            if(data){
                var img = '/img/'+data.image;
                $("#QRImage").attr("src",img);
                $("#genbutton").text("cambiar QR");
            }
        });
}