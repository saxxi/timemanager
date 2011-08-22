$(function() {
    $("#txtactivities").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "http://192.168.0.8/~adit/timemanager/admin/txtactivities",
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