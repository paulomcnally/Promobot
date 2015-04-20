$(function() {
  $('#permisos').jstree({
    'core' : {
        'themes': {
            'name': 'proton',
            'responsive': true
        },
      'data' : {
        "url" : "/UserPermissions",
        "data" : function (node) {
          return { "id" : node.id };
        },
        "dataType" : "json" // needed only if you do not supply JSON headers
      }
    }
  });
});
