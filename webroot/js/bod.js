/*window.BOD = {};

(function (BOD){

    function categorias(){
    
        this.Categorias =  ko.observableArray([]);
        this.CategoriasSelecc = ko.observableArray([]);
       
    }
    
    BOD.Categoris = categorias;

}(window.BOD));

$(document).ready(function ($) {
    
    (function(){
   
     var url = location.href;
     var ruta = url.replace("edit","listarnegocio");
     var r = ruta + ".json";
     console.log(r);
     $.getJSON(r, function(data) {
         console.log(data.business.Category[0].id);
         console.log(data.business.Category[0].name);
         console.log(data.business.Category);
         
         var cats = new BOD.Categoris();
          ko.applyBindings(cats);
         cats.Categorias(data.business.Category);
         cats.CategoriasSelecc(data.business.Category);
         
     });
     
 }());
});*/