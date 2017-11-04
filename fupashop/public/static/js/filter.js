// Real time filtering of Brands

var brands = new Array()

$("#filters :checkbox" ).click(function() {
    var chker = new Array()
//Removes any item from the array that is unchecked
    $('#filters :checkbox:not(:checked)').each(function(){
	var tmp = new Array()
	var tmpb=brands.pop()
	for (var y = 0; y < brands.length; y++) {
	    if(tmpb == ($(this).val())){
		
	    }
	    else{
		tmp.push(tmpb);
	    }
	}

	for (var i = 0; i < tmp.length; i++) {
	    chker[i] = tmp[i]
	}
	
	for (var x = 0; x < tmp.length; x++) {
	    brands.push(tmp.pop())
	}
    });
    console.log(chker)
    
//Adds any checked item into Array
    $('#filters :checkbox:checked').each(function(){
	for (var i = 0; i < brands.length; i++) {
	    if(brands[i] == ($(this).val())){
		break;
	    }
	}
	if (i == brands.length){
	brands.push($(this).val())
	}
    });
    
    console.log(chker)
    
    if(chker.length != 0){
	brands = chker
    }
    
    //Filters out the table
    $( 'tr' ).show(); 
    console.log(brands)
    $('tr td.brand').each(function(){
	for (var i = 0; i < brands.length; i++) {
	    if(brands[i] == ($(this).text())){
		break;
	    }
	}
	if (i == brands.length){
	    $(this).parent().hide()
	}
    });
    
    if (brands.length == 0){
	$( 'tr' ).show(); 
    }
});


// Price Filtering
$('#btnFilter').click(function() {
   
    var min = $('#min').val();

    var max = $('#max').val()
    
    if(max == 0){
	max = 9999999999
    }
    $('tr').show();
    console.log(min)

    $('tr td.price').each(function() {
	console.log(max)
	var num = parseFloat($(this).text())
	console.log(num);
        if (num < min || num > max )
        {
            $(this).parent().hide();
        }
    });
    
});

// Real time filtering of Processors

var processors = new Array()

$("#filter1 :checkbox" ).click(function() {
    var chker = new Array()
//Removes any item from the array that is unchecked
    $('#filter1 :checkbox:not(:checked)').each(function(){
	var tmp = new Array()
	var tmpb=processors.pop()
	for (var y = 0; y < processors.length; y++) {
	    if(tmpb == ($(this).val())){
		
	    }
	    else{
		tmp.push(tmpb);
	    }
	}

	for (var i = 0; i < tmp.length; i++) {
	    chker[i] = tmp[i]
	}
	
	for (var x = 0; x < tmp.length; x++) {
	    processors.push(tmp.pop())
	}
    });
    console.log(chker)
    
//Adds any checked item into Array
    $('#filter1 :checkbox:checked').each(function(){
	for (var i = 0; i < processors.length; i++) {
	    if(processors[i] == ($(this).val())){
		break;
	    }
	}
	if (i == processors.length){
	processors.push($(this).val())
	}
    });
    
    console.log(chker)
    
    if(chker.length != 0){
	processors = chker
    }
    
    //Filters out the table
    $( 'tr' ).show(); 
    console.log(processors)
    $('tr td.processor').each(function(){
	for (var i = 0; i < processors.length; i++) {
	    if(processors[i] == ($(this).text())){
		break;
	    }
	}
	if (i == processors.length){
	    $(this).parent().hide()
	}
    });
    
    if (processors.length == 0){
	$( 'tr' ).show(); 
    }
});

// Search Text Query
$("#searchInput").keyup(function () {
    //split the current value of searchInput
    var data = this.value.toUpperCase().split(", ");
    //create a jquery object of the rows
    var jo = $("#fbody").find("tr");
    if (this.value == "") {
        jo.show();
        return;
    }
    //hide all the rows
    jo.hide();

    //Recusively filter the jquery object to get results.
    jo.filter(function (i, v) {
        var $t = $(this);
        for (var d = 0; d < data.length; ++d) {
            if ($t.text().toUpperCase().indexOf(data[d]) > -1) {
                return true;
            }
        }
        return false;
    })
    //show the rows that match.
   .show();
}).focus(function () {
    this.value = "";
    $(this).css({
        "color": "black"
    });
    $(this).unbind('focus');
}).css({
    "color": "#C0C0C0"
});


$(document).ready(function() 
	{ 
    	$("#myTable").tablesorter({sortList: [[3,1],[2,0]]}); 
 	} 
 );