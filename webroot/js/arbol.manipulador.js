$(document).ready(function() {
    
    
     $('#categorias').on("ready.jstree", function (e, data) {
          console.log("loaded");
            //console.log("The selected nodes are:");
            //console.log(data.selected);
           $('#CategoryCategory option:selected').each( function() {
            
                var arbol = $('#categorias').jstree(true);
                arbol.deselect_node($(this).text());
                arbol.disable_node($(this).text());
            
            
            });
         
      });
    
    $('#categorias').on("after_open.jstree", function (e, data) {
          console.log("opened");
            //console.log("The selected nodes are:");
            //console.log(data.selected);
           $('#CategoryCategory option:selected').each( function() {
            
                var arbol = $('#categorias').jstree(true);
                arbol.deselect_node($(this).text());
                arbol.disable_node($(this).text());
            
            
            });
         
      });

      

    $('#add').click(function(){

            var arbol = $('#categorias').jstree(true);
            var seleccionadas = arbol.get_selected();
            $.each(seleccionadas, function( index, value ) {
                   if(!(arbol.is_parent(value))){
                       var cid = arbol.get_node(value).original.eid;

                           $('#CategoryCategory').append("<option value='" + cid + "'>" + value + "</option>");
                           
                           arbol.deselect_node(value);
                           arbol.disable_node(value);
                           
                   }
                   else{
                        $('#sp').text('Porfavor seleccione una subcategoria').show().fadeOut(1000);
                   }
                
            });
            
   });
    
    $('#remove').click(function(){
        $('#CategoryCategory option:selected').each( function() {
            
            var arbol = $('#categorias').jstree(true);
            arbol.enable_node($(this).text());
            $(this).remove();
            
            
        });
    });
    
    
    $("form").submit(function( event ) {

        $('#CategoryCategory option').each(function(){
            $(this).attr("selected","selected");
        });

    });

 
});
