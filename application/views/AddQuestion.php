<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/ico/favicon.ico">

    <title>XYZ RECRUITMENT PORTAL - QUIZ</title>

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
          </ul>
        </div>
        </div><!--/.nav-collapse -->
       </div>
    </div>

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
			    <h3>QUIZ->NEW QUIZ</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container">
	 	<div class="row">
	 	    <?php if(!empty($message)){?>
            <div class="alert-danger" style="text-align: center;height:50px;font-weight: bolder;padding-top: 20px">
              <?php echo $message;?>
            </div>
            <?php }?>
            <form role="form" method="POST" action="<?php echo base_url();?>index.php/save">
				<div class="form-group">
	 			    <p style="font-weight: bolder;">Question:
	 				<textarea class="form-control" name="question" rows="3"></textarea></p>
	 				<div class="spacing"></div>

	 				<div class="radio">
	 					<b>Option 1</b>
	 					<br><textarea class="form-control" rows="2" name="opt1"></textarea>
	 					<div class="spacing"></div>
	 					<b>Option 2</b>
	 					<br><textarea class="form-control" rows="2" name="opt2"></textarea>
	 					<div class="spacing"></div>
	 					<b>Option 3</b>
	 					<br><textarea class="form-control" rows="2" name="opt3"></textarea>
	 					<div class="spacing"></div>
	 					<b>Option 4</b>
	 					<p><textarea class="form-control" rows="2" name="opt4"></textarea></p>
	 					<!-- <p><b>Marks:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	 					<i class="fa fa-thumbs-up" style="font-size: 40px; color: green;"><input type="" name="" style="width: 40px; height: 30px;">
	 					</i>
	 					&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-thumbs-down" style="font-size: 40px; color: red;"><input type="textarea" style="width: 40px; height: 30px;"></i>
	 				    </p> -->
	 				</div>
	 				<p style="font-weight: bold;">Answer:
	 				<textarea class="form-control" rows="1" name="correct"></textarea>
	 				</p>
	 				<div class="spacing"></div>
	 				<div class="hline"></div>
	 				<div style="text-align: center;">
	 					<p><a href="<?php echo base_url();?>index.php/add" class="btn btn-default btn-lg"  >Cancel</a>
	 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 					<input type="Submit" name="save" class="btn btn-primary btn-lg" value="Save">
	 					<div class="spacing"></div>
	 					<div class="spacing"></div>
	 				</div>	
	 			</div>
	 		</form>
	    </div>
	</div>
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="twrap">
	 	<div class="container centered">
	 		<div class="row">
	 			<p style="text-align: center; font-weight: bolder;">&#169 XYZ co.</p>
	 		</div><! --/row -->
	 	</div><! --/container -->
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
