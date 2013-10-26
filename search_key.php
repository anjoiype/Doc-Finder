
<html>
<head>
    <title>medical cloud-set</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <style type="text/css">
    .c_col{
    	border-top:1px solid #ccc;
    }
    .ui-block-a, .ui-block-b, .ui-block-c, .ui-block-d, .ui-block-e{
    	padding-top:5px;
    	padding-bottom: 5px;
    	font-size: 12px;
    }
    </style>
</head>
<body>
	
	
    <div data-role="page" id="two">
		  <div data-role="header" data-theme="b">
            <h1 style="font-size:1.3em;line-height:1.3em;">Search Results</h1>
        </div><!-- /header -->

		<div data-role="content">	
				<h4 style="text-align:center">Search results are displayed below</h4>
			<div class="ui-grid-d c_col" >
				
					<div class="ui-block-a"><b>Name</b></div>
					<div class="ui-block-b"><b>Speciality</b></div>
					<div class="ui-block-c"><b>Location</b></div>
					<div class="ui-block-d"><b>Availability</b></div>
					<div class="ui-block-e"><b>Time</b></div>
				

				<div class="ui-block-a">Block A</div>
				<div class="ui-block-b">Block B</div>
				<div class="ui-block-c">Block C</div>
				<div class="ui-block-d">Block D</div>
				<div class="ui-block-e">Block E</div>

				<div class="ui-block-a">Block A</div>
				<div class="ui-block-b">Block B</div>
				<div class="ui-block-c">Block C</div>
				<div class="ui-block-d">Block D</div>
				<div class="ui-block-e">Block E</div>
			</div><!-- /grid-b -->	
				<br><br>
				<a href="#three" data-theme="b" data-role="button" data-transition="slide" data-icon="arrow-r" data-iconpos="right">Feedback Form</a>
		</div><!-- /content -->
		<?php
		$name1  = $_POST['search_text'];
		$name = "anjo";
		echo $name;
		?>

		<div data-role="footer" data-theme="b">
            <p style="text-align:center"><?php echo $name1 ;?></p>
        </div><!-- /footer -->
       
