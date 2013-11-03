<?php
$radio_option = $_POST['person'];
$search_text = $_POST['search_text'];
$search_text_quotes ="'".$search_text."'"; 
$arr['radio_option'] = $radio_option;
$arr['search_text'] = $search_text;


?>
<!doctype html>
<html>
	<head>
	 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
	</script>
	<script src ="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>
	$(document).ready(function(){
		
	
		var url='http://localhost/heroku1.php';
		var radio_button = <?php echo $radio_option ?>;
		 srch_txt =  <?php echo $search_text_quotes ?>;
		var sql;
		if(radio_button == name)
			sql = "SELECT * FROM search WHERE doc_name ="+srch_txt;
		//document.write(sql);
		/*var success = false;
		var data;
		var user;
		$.getJSON(url,function(data){
			document.write("data");
		document.write(data);*/
		console.log();		
		//});
	});
		
		</script>
	</head>
	</html>
