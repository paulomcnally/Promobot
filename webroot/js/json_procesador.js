$(function() {
  $('#categorias').jstree({
    'core' : {
      'data' : {
        "url" : "/categories",
        "data" : function (node) {
          return { "id" : node.id };
        },
        "dataType" : "json" // needed only if you do not supply JSON headers
      }
    }
  });
});
