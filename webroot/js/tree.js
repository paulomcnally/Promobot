$(function($) {
	$("#tree").jstree({
        "json_data" : {
            "ajax" : {
                'type' : 'POST',
                "url" : "getTreeInfo.json",
                "data" : function (n) {
                    return { 
                    	"id" : n.attr ? n.attr("id") : 0,
                    	"type" : n.attr ? n.attr("type") : 0
                    			};
                },"success": function(){
                    
                }
            }
        },
        "dnd" : {
            "dnd_finish" : function () {
                alert("");
            }
        },
        "core" : { "initially_open" : [ "phtml_1" ] },
        "plugins" : [ "themes", "json_data", "ui", "dnd", "crrm" ]
    })
});