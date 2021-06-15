<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="c-style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Softwares - Download</title>
	
	<style>
		html{
			scroll-behavior: smooth;
		}
		#mySearch{
			font-size: 20px;
			padding: auto;
			padding-left: 4%;
		}
	</style>
</head>

<body>
	
	<div id="nav_bar" class="sticky-top"></div>
	
	<input class="form-control" type="text" id="mySearch" onkeyup="searchSoft()" placeholder="Search Software..." title="Type Software Name">

	 <div class="container-fluid">
		 <div class="row" style="height: auto;">
			 <div class="col-sm-9" style="padding: 10px 60px;" id="allCards">
				  <?php require('f.php'); selectData(); ?>
			 </div>
			 <div class="col-sm-3">
				 <!--		  start categories menu-->
				 <table class="table" style="margin-top: 50px">
					 <thead>
						 <th>Softwares Categories</th>
					 </thead>
				  <tbody>
<!--				dynamically list all categories-->
					<?php echoCategories(); ?>
				  </tbody>
				</table>

				<!--		  end categories menu--> 
			 </div>
		 </div>
	</div>
	
	<div id="about_us"></div>
	
	<div id="myFooter"></div>
	
	<script>
		$(document).ready(function(){
			$('#nav_bar').load('navbar.html');
            $('#windows').addClass('active');
			$('#about_us').load('about.html');
			$('#myFooter').load('footer.html');
		});
		
		function searchSoft(){
			
			setTimeout(search, 1000);
			
			function search(){
				var body, input, filter, cardDeck;
				input = document.getElementById("mySearch");
				filter = input.value.toUpperCase();
	//			card = document.getElementsByClassName("card");
				var div = document.getElementById("allCards");
				cardDeck = document.getElementsByClassName("card-deck");
				$('body').append("\n card deck.length is :"+cardDeck.length);
				
				for(var i = 0; i < cardDeck.length; i++){
					// Loop through all list items, and hide those who don't match the search query
					var card = cardDeck[i].getElementsByClassName("card");
					
					var cardofcarddeck3 = cardDeck[2].getElementsByClassName("card");
					var h4of1 = cardofcarddeck3[0].getElementsByTagName("h4")[0];
					$('body').append("<br>TESTING :"+h4of1;
					
					$('body').append("<br> checking cardDeck no :"+i);
					
					$('body').append("<br> checking cardDeck test 1 :"+cardDeck[1]);
					$('body').append("<br> checking cardDeck test 3 :"+cardDeck[3]);
					
					$('body').append("<br> card.length is :"+card.length);
					
					for(var j = 0; j < card.length; j++) {
						
						$('body').append("<br> cards no is :"+j);
						
						var h4 = card[j].getElementsByTagName("h4")[0];
						if (h4.innerHTML.toUpperCase().indexOf(filter) > -1) {
							card[j].style.visibility = "";
						} else {
							card[j].style.visibility = "hidden";
						}
					}	
				}
			}
		}
		
	</script>
	
</body>

</html>