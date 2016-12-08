jQuery(document).ready(function() {
 	jQuery('#select_year').change(function(e) {
    //perform AJAX call
    var yearId = $(this).val();
    	$.get("/versions/year/"+yearId+"/issues", 
                // { option: $(this).val() }, 
                function(data) {
console.log(data);
                    var item = $('#select_issues');
                    item.empty();

                    $.each(data, function(key, value) {
                        item.append("<option value='"+ key +"'>" + value + "</option>");
                    });

                });
   	});
});