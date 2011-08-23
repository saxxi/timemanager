$(function() {
    
    
    
    
    
    
    
    
    
    $("#txtactivities").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: appconf.url_base + "admin/txtactivities",
                dataType: "jsonp",
                data: {
                    maxRows: 12,
                    startwith: request.term
                },
                success: function(data) {
                    response($.map(data.activities, function(item) {
                        return {
                            label: item,
                            value: item
                        }
                    }));
                }
            });
        }
    });
  
});