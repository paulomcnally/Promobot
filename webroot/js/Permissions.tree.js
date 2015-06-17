$(document).ready(function() {
    
      $('#permisos').on("loaded.jstree", function (e, data) {

           $('#GroupInfo option').each( function() {
                                                                        //desactivar nodos que estan en select
                var arbol = $('#permisos').jstree(true);
                arbol.deselect_node($(this).val());
                arbol.disable_node($(this).val());
            
            
            });
         
      });
      
       $('#permisos').on("after_open.jstree", function (e, data) {

           $('#GroupInfo option').each( function() {
                                                                      //desactivar nodos en select
                var arbol = $('#permisos').jstree(true);
                arbol.deselect_node($(this).val());
                arbol.disable_node($(this).val());
            
            
            });
         
      });

    $('#add').click(function(){

            var arbol = $('#permisos').jstree(true);
            var seleccionadas = arbol.get_selected(true);
            $.each(seleccionadas, function( index, value ) {

                       var cid = arbol.get_node(value).id;
                       if(!(arbol.is_parent(value)))
                       {
                         var parent = arbol.get_parent(value);
                         var ptext = arbol.get_node(parent).text;   
                         $('#GroupInfo').append("<option value='" + cid + "'>" + ptext + "/" + value.text + "</option>");
                       }
                       else{
                           $('#GroupInfo').append("<option value='" + cid + "'>" + value.text + "</option>");
                       }      
                           arbol.deselect_node(value);
                           arbol.disable_node(value);
                           
            });
            
   });
    
    $('#remove').click(function(){
        $('#GroupInfo option:selected').each( function() {
            
            var arbol = $('#permisos').jstree(true);
            arbol.enable_node($(this).val());
            $(this).remove();
            
            
        });
    });
    
    
    $("form").submit(function( event ) {

        $('#GroupInfo option').each(function(){
            $(this).attr("selected","selected");
        });

    });
    

 
});


