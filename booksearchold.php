
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html lang='en' class=''>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/ericwinton/pen/jqKyyq?depth=everything&order=popularity&page=7&q=product&show_forks=false" />

<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<style class="cp-pen-styles">body {
	padding-top: 30px;
}
.product {
	margin-bottom: 30px;
}
.product-inner {
	box-shadow: 0 0 10px rgba(0,0,0,.2);
	padding: 10px;
}
.product img {
	margin-bottom: 10px;
}</style></head><body>
<div class="container">
	<div class="row" id="search">
		<form id="search-form" action="" method="POST" enctype="multipart/form-data">
			<div class="form-group col-xs-9">
				<input class="form-control" type="text" placeholder="Search" />
			</div>
			<div class="form-group col-xs-3">
				<button type="submit" class="btn btn-block btn-primary">Search</button>
			</div>
		</form>
	</div>
  
<!--  
    
	<div class="row" id="filter">
		<form>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="make" class="filter-make filter form-control">
					<option value="">Select Make</option>
					<option value="">Show All</option>
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="model" class="filter-model filter form-control">
					<option value="">Select Model</option>
					<option value="">Show All</option>
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="type" class="filter-type filter form-control">
					<option value="">Select Type</option>
					<option value="">Show All</option>
				</select>
			</div>
			<div class="form-group col-sm-3 col-xs-6">
				<select data-filter="price" class="filter-price filter form-control">
					<option value="">Select Price Range</option>
					<option value="">Show All</option>
				</select>
			</div>
		</form>
	</div>

--> 
	<div class="row" id="books">
		
	</div>
</div>

    <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    
<script >
    
    data = [
	{
		"make": "Gibson",
		"model": "Les Paul",
		"type": "Electric",
		"price": "$3,000",
		"image": "http://www.sweetwater.com/images/items/120/LPST5HTHDCH-medium.jpg?9782bd"
	},
	{
		"make": "Gibson",
		"model": "SG",
		"type": "Electric",
		"price": "$1,500",
		"image": "http://www.sweetwater.com/images/items/120/SGSEBCH-medium.jpg?e69cfe"
	},
	{
		"make": "Fender",
		"model": "Telecaster",
		"type": "Electric",
		"price": "$2,000",
		"image": "http://www.sweetwater.com/images/items/120/TelePLMPHB-medium.jpg?28e48b"
	},
	{
		"make": "Fender",
		"model": "Stratocaster",
		"type": "Electric",
		"price": "$2,000",
		"image": "http://www.sweetwater.com/images/items/120/StratAMM3SB2-medium.jpg?dfd0a9"
	},
	{
		"make": "Gretsch",
		"model": "White Falcon",
		"type": "Electric",
		"price": "$5,000",
		"image": "http://www.sweetwater.com/images/items/120/G613655GE-medium.jpg?9bfb0e"
	},
	{
		"make": "Paul Reed Smith",
		"model": "Custom 24",
		"type": "Electric",
		"price": "$5,000",
		"image": "http://www.sweetwater.com/images/items/120/HBII10BGWB-medium.jpg?982763"
	},
	{
		"make": "Gibson",
		"model": "Hummingbird",
		"type": "Acoustic",
		"price": "$2,500",
		"image": "http://www.sweetwater.com/images/items/120/SSHBHCNP-medium.jpg?11fbea"
	}
];

var books = "";
var makes = "";
var models = "";
var types = "";

for (var i = 0; i < data.length; i++) {
    
    if (window.CP.shouldStopExecution(1)){
        break;
    }
	
    var make = data[i].make,
		model = data[i].model,
		type = data[i].type,
		price = data[i].price,
		rawPrice = price.replace("$",""),
		rawPrice = parseInt(rawPrice.replace(",","")),
		image = data[i].image;
	
	//create product cards
	books += "<div class='col-sm-4 product' data-make='"+make+"' data-model='"+model+"' data-type='"+type+"' data-price='"+rawPrice+"'><div class='product-inner text-center'><img src='"+image+"'><br />Make: "+make +"<br />Model: "+model+"<br />Type: "+type+"<br />Price: "+price+"</div></div>";
	
/*                                       
	//create dropdown of makes
	if (makes.indexOf("<option value='"+make+"'>"+make+"</option>") == -1) {
		makes += "<option value='"+make+"'>"+make+"</option>";
	}
	
	//create dropdown of models
	if (models.indexOf("<option value='"+model+"'>"+model+"</option>") == -1) {
		models += "<option value='"+model+"'>"+model+"</option>";
	}
	
	//create dropdown of types
	if (types.indexOf("<option value='"+type+"'>"+type+"</option>") == -1) {
		types += "<option value='"+type+"'>"+type+"</option>";
	}
    
*/
}
window.CP.exitedLoop(1);


$("#books").html(books);
$(".filter-make").append(makes);
$(".filter-model").append(models);
$(".filter-type").append(types);

var filtersObject = {};

//on filter change
$(".filter").on("change",function() {
	var filterName = $(this).data("filter"),
		filterVal = $(this).val();
	
	if (filterVal == "") {
		delete filtersObject[filterName];
	} else {
		filtersObject[filterName] = filterVal;
	}
	
	var filters = "";
	
	for (var key in filtersObject) {if (window.CP.shouldStopExecution(2)){break;}
	  	if (filtersObject.hasOwnProperty(key)) {
			filters += "[data-"+key+"='"+filtersObject[key]+"']";
	 	 }
	}
window.CP.exitedLoop(2);

	
	if (filters == "") {
		$(".product").show();
	} else {
		$(".product").hide();
		$(".product").hide().filter(filters).show();
	}
});

//on search form submit
$("#search-form").submit(function(e) {
	e.preventDefault();
	var query = $("#search-form input").val().toLowerCase();

	$(".product").hide();
	$(".product").each(function() {
		var make = $(this).data("make").toLowerCase(),
			model = $(this).data("model").toLowerCase(),
			type = $(this).data("type").toLowerCase();

		if (make.indexOf(query) > -1 || model.indexOf(query) > -1 || type.indexOf(query) > -1) {
			$(this).show();
		}
	});
});
//# sourceURL=pen.js
</script>