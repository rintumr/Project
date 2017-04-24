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
          <a class="navbar-brand">QUIZ</a>
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
			    <h3></h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 	    <form role="form" method="POST" action="<?php echo base_url();?>index.php/quiz">
	 		    <div class="col-md-8" style="text-align: left; padding-left:10px">
	 	            <?php if(!empty($message)){?>
		 			<div class="alert-danger" style="text-align: center;height:50px;font-weight: bolder;padding-top: 20px">
		 		    	<?php echo $message;?>
		 			</div>
		            <?php }?>
	 		        <?php foreach ($result as $val) {;?>
		 		    <p style="font-weight: bold;"><?php echo $val->question;?></p>
		 		    <div class="spacing"></div>
		 	
		 			<input type="hidden" name="questionId" value="<?php echo $val->id?>">
		 		    <div class="radio">
		 			    <label><input type="radio" value="<?php echo $val->option1;?>" name="options"><?php echo $val->option1;?></label>		 
		 			    <div class="spacing"></div>
		 			    <label><input type="radio" value="<?php echo $val->option2;?>" name="options"><?php echo $val->option2;?></label>
		 		        <div class="spacing"></div>
		 		        <label><input type="radio" value="<?php echo $val->option3;?>" name="options"><?php echo $val->option3;?></label>
		 		        <div class="spacing"></div>
		 		        <label><input type="radio" value="<?php echo $val->option4;?>" name="options"><?php echo $val->option4;?></label>
		 		        <div class="spacing"></div>
		 		    </div>
		 	            <?php } ;?>
	 			    <!-- <div class="hline"></div> -->
		 		    <div class="spacing"></div>
	 			    <br>
	 			    <input type="submit" name="submit" class="btn btn-primary" style="float: right;" value="Submit">	
	 			</div>
		 		    
		    </form>
	 		<!-- SIDEBAR -->
	 		  <!--   <div class="col-md-3" style="text-align: justify;">
		 		
		 		    <div class="hline"></div>
		 			<p>
		 			<?php for ($i=1; $i <= $key+1 ; $i++) { ;?>
		 			    <a class="btn btn-theme" href="" role="button"><?php echo $i?></a>
		 			<?php } ;?>
		            </p>
		 		    <div class="spacing"></div>
	 			    <input type="submit" name="submit" class="btn btn-danger" style="float: center;" value="Submit">		 	
		 		    <div class="spacing"></div>
		 		    <div class="spacing"></div>
		 		</div> -->
	 	</div>
	 </div>	


	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="twrap">
	 	<div class="container">
	 			<p style="font-weight: bolder;">&#169 XYZ co.</p>
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
