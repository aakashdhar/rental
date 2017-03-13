<div class="topbar animated fadeInLeftBig"></div>
<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="index.php"><img src="images/logos.png" alt="logo"></a>
              <!-- #Logo Ends -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
                 <li class="active"><a href="index.php">Home</a></li>
                 <li ><a href="index.php">About</a></li>
                 <li ><a href="index.php">Testimonials</a></li>
                 <li ><a href="allrentals.php">All Rentals</a></li>
                 <li ><a href="index.php">Contact</a></li>
                 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                <div class="col-lg-12">
                    <div class="text-center"><h3><b>Register</b></h3></div>
  								<form id="ajax-register-form" action="" method="post" role="form" autocomplete="off">
  									<div class="form-group">
  										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
  									</div>
  									<div class="form-group">
  										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
  									</div>
  									<div class="form-group">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
  									</div>
  									<div class="form-group">
  										<div class="row">
  											<div class="col-xs-6 col-xs-offset-3">
  												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-info" value="Register Now">
  											</div>
  										</div>
  									</div>
                    <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
  								</form>
                </div>
              </ul>
            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                    <div class="col-lg-12">
                      <div class="text-center"><h3><b>Log In</b></h3></div>
                      <form id="ajax-login-form" action="" method="post" role="form" autocomplete="off">
                          <div class="form-group">
                              <label for="username">Email</label>
                              <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off" required>
                          </div>

                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off" required>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-xs-5 pull-right">
                                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-success" value="Log In">
                              </div>
                            </div>
                          </div>
                          <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
                      </form>
                  </div>
                </ul>
            </li>
              </ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div>
<!-- #Header Starts -->
