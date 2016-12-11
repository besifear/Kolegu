<!DOCTYPE html>
<html>
  <head>
    <title>Kolegu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/question.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="shrinkednav">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header col-lg-8 col-md-12 col-sm-5 col-xs-12">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="#">K</a>

        <div class="col-md-10 col-sm-10 col-xs-8">
            <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="q">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            </form>
        </div>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse col-sm-4 col-xs-12 pull-right" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><b class="glyphicon glyphicon-send"></b> Pyet</a></li>
          <li><a href="#"><b class="glyphicon glyphicon-comment"></b> Pergjigju</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-bell"></b> Notifications</a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li class="divider"></li>
              <li><a href="#">Another action</a></li>
              <li class="divider"></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> User</a>
            <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li><a href="#">Settings</a></li>
              <li class="divider"></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->

      </div>
    </nav>

    <div class="page-content">
    	<div class="row">

		  <div class="col-md-12">
		  	<div class="row">

		  		<div class="col-md-8">
		  			<div class="row">
		  				<div class="col-md-12">

				  			<div class="content-box-large">
                  <ul class="event-list">
                    <li>
                      <div class="social">
                        <ul>
                          <li class="facebook" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span><br><small>136</small></a></li>
                          <li class="twitter" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span><br><small>42</small></a></li>
                          <li class="google-plus" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-comment"></span><br><small>7</small></a></li>
                        </ul>
                      </div>
                      <div class="info">
                        <h2 class="title">Question</h2>
                        <p class="desc">Question about universe, galaxies, the human nature, and java go here, with great hopes
                        to get an answer, a resolution, to understand this thing that we call life.</p>
                        <ul style="width:auto; float: left;">
                          <li><a href="#website">tag1</a></li>
                          <li><a href="#website">tag2</a></li>
                        </ul>
                        <ul style="width: auto; float: left;" class="pull-right">
                          <li><p style="font-size: 9pt;">Posted 69 minutes ago by <a>IlliPilli</a></p></li>
                        </ul>
                      </div>
                    </li>
                    <div class="pull-right">
                      <button class="btn btn-success btn-xs">Edit</button>
                      <button class="btn btn-danger btn-xs">Delete</button>
                      <br><br>
                    </div>
                    <hr style="clear: both;">
                  </ul>
                  <h4>Answers</h4>
                  <hr>
                  <ul class="event-list answer">
                    <li>
                      <div class="social">
                        <ul>
                          <li class="facebook" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-up"></span><br><small>136</small></a></li>
                          <li class="twitter" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-chevron-down"></span><br><small>42</small></a></li>
                          <!--<li class="google-plus" style="width:33%;"><a href="#"><span class="glyphicon glyphicon-comment"></span><br><small>7</small></a></li>-->
                        </ul>
                      </div>
                      <div class="info answerinfo">
                        <p class="desc">Question about universe, galaxies, the human nature, and java go here, with great hopes
                        to get an answer, a resolution, to understand this thing that we call life.</p>
                        <ul style="width: auto; float: left;" class="pull-right">
                          <li><p style="font-size: 9pt;">Posted 59 minutes ago by <a>IlliPilli</a></p></li>
                        </ul>
                      </div>
                    </li>
                    <div class="pull-right">
                      <button class="btn btn-success btn-xs">Edit</button>
                      <button class="btn btn-danger btn-xs">Delete</button>
                      <br><br>
                    </div>
                    <hr style="clear: both;">
                  </ul>
                  <div id="result"></div>
                  <h3>Your answer</h3>
                  <form id="answer-form" class="" action="" method="post">
                    <div class="form-group">
                      <textarea id="answer-message" class="form-control" type="textarea" id="message" placeholder="Write your answer" maxlength="140" rows="7"></textarea>
                      <!--<span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>-->
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Post</button>
                  </form>
                  <br><br>
							</div>
		  				</div>
		  			</div>
		  		</div>
          <div class="col-md-4">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Related</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
                  questions
							</div>
		  				</div>
		  			</div>
		  		</div>

		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2016 <a href='#'>Kolegu</a>
            </div>

         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/answer.js"></script>
  </body>
</html>
