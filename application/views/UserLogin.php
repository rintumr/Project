<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.ico">

    <title>Quiz-LogIn</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href= "<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href= "<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">


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

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>LogIn to take the Quiz!!!</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<!-- *****************************************************************************************************************
	 Candidate Login FORM
	 ***************************************************************************************************************** -->


	 <div class="container mtb">
	 	<div class="row">
	 		<div class="col-lg-4 col-lg-offset-4">
		 		<?php if(!empty($message)){?>
		 			<div class="alert-danger" style="text-align: center;height:50px;font-weight: bolder;padding-top: 20px">
		 		    	<?php echo $message;?>
		 			</div>
		 		<?php }?>
				<div class="alert-danger">
				<?php echo validation_errors();?>
		 	    </div>

	 			<form role="form" method="POST" action="<?php echo base_url();?>index.php/login">

					  <div class="form-group">
					    <label for="Inputemail">Email:</label>
					    <input type="email" name="email" class="form-control" id="email">
					  </div>
					  <div class="form-group">
					    <label for="Password">Password:</label>
					    <input type="password" name="password" class="form-control" id="password">
					  </div>
					  <input type="submit" name="submit" value="Submit" style="background-color: #00b3fe; float: right; height: 30px; width: 150px; color: white;">
				</form>
			</div>
	 	</div>
	 	
	 </div>
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
