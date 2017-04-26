<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.ico">

    <title>XYZ RECRUITMENT PORTAL-RESULTS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>index.php/home">XYZ RECRUITMENT PORTAL</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url();?>index.php/home">HOME</a></li>
            <li><a href="<?php echo base_url();?>index.php/about">ABOUT</a></li>
            <li><a href="<?php echo base_url();?>index.php/contact">CONTACT</a></li>
            <li><a href="<?php echo base_url();?>index.php/alogout">LOGOUT</a></li>
          </div><!--/.nav-collapse -->
        </div>
    </div>

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>HOME->RESULTS</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 BODY
	 ************************************************************************************************* -->

	 <div class="container mtb">
	 	<div class="row">


	 		<table class="table table-striped">
	 			<thead>
	 				<tr>
	 				    <th>ID</th>
	 					  <th>Email</th>
	 			  		<th>MARKS</th>
	 				</tr>
	 			</thead>
	 			<tbody>
             <tbody>
             <?php foreach ($result as $val) { ;?>
                <tr>
                 <td><?php echo $val->Id;?></td>
                 <td><?php echo $val->email;?></td>
                 <td><?php echo $val->marks;?></td>
            <?php } ;?>
            </tr>
	 			</tbody>
	 		</table>
	 	</div><! --/row -->
	 </div><! --/container -->



	<!-- *****************************************************************************************************************
	 BLUE
	 ***************************************************************************************************************** -->

	 
	
	 <div id="twrap">
	 	<div class="container">
    <p style="text-align: center; font-weight: bolder;">&#169 XYZ co.</p>
	 	</div><! --/container -->
	 </div><! --/twrap -->
	 
	
	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/retina-1.1.0.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.hoverdir.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.hoverex.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.prettyPhoto.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.isotope.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>


  </body>
</html>

	 		
