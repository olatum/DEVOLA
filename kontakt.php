<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DevOla</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/css/mdb.min.css"/>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

  </head>

  <body class="main-body" id="page-top">
<?php
$result = '';
$errName = '';
$errEmail = '';
$errMessage = '';
$errHuman = '';
if (isset($_POST["submit"])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$human = intval($_POST['human']);
	$from = 'Devola';
	$to = 'ekooladesign@gmail.com';
	$subject = 'Wiadomość ze strony DEVOLA ';
	$body ="From: $name\n E-Mail: $email\n Message:\n $message";
	// Check if name has been entered
	if ($_POST['name']=='') {
		//$errName = 'Proszę podaj swoje imię';
		$errName = '<div class="alert alert-info text-center">Proszę podaj swoje imię.</div>';
	}
	// Check if email has been entered and is valid
	if ($_POST['email']=='' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		//$errEmail = 'Proszę podaj prawidłowy adres emial';
		$errEmail = '<div class="alert alert-info text-center">Proszę podaj prawidłowy adres emial.</div>';
	}
	//Check if message has been entered
	if ($_POST['message']=='') {
		//$errMessage = 'Proszę uzupełnij treść wiadomości';
		$errMessage = '<div class="alert alert-info text-center">Proszę uzupełnij treść wiadomości.</div>';
	}
	//Check if simple anti-bot test is correct
	if ($human !== 5) {
		//$errHuman = 'Twoja odpowiedź jest błędna';
		$errHuman = '<div class="alert alert-info text-center">Twoja odpowiedź jest błędna.</div>';
	}
	// If there are no errors, send the email
	if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success text-center">Dziękujęmy! Twoja wiadomość została wysłana</div>';
		} else {
			$result='<div class="alert alert-info text-center">Przykro mi, wystąpił błąd przy wysyłaniu wiadomości. Spróbuj jeszcze raz.</div>';
		}
	}
}
?>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top nav-grey" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="index.html"><img class="logo animated slideInLeft" src="img/logo.jpg" alt="logo"></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse text-center" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger item" href="strona główna.html">Strona główna</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger item" href="portfolio.html">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger active item" href="kontakt.html">Kontakt</a>
              </li>
              <li>
                <a class="nav-link js-scroll-trigger" href="https://www.facebook.com/DevOla.TwojaStronaWWW/" target="_blank"><img class="img-fluid icon1" src="img/fb_icon.png" alt="FB_icon"></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<!-- Contact -->
<section id="contact">

    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center mt-5">
                <h2 class="section-heading text-uppercase mt-5">Skontaktuj się z nami</h2>
                <h3 class="section-subheading text-muted">Najlepiej zadzwoń ale jeśli wolisz - napisz!</h3>
            </div>
        </div>

        <div class="text-center">
        <a href="https://www.facebook.com/DevOla.TwojaStronaWWW/" target="_blank"><img class="img-fluid icon" src="img/fb_icon.png" alt="FB_icon"></a>
        </div>

        <div class="col-lg-12 text-center mb-5">
            <h4 class="service-heading"> <span class="fa-stack fa-2x"><i class="fa fa-phone fa-stack-1x text-primary wow tada"></i></span>+48 668 353 268</h4>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form class="form-horizontal" role="form" method="post" action="kontakt.php">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Imię</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Proszę podaj imię" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="np. jankowalski@wp.pl" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Wiadomość</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" name="message" placeholder="Treść wiadomości" value=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="human" class="col-sm-4 control-label">2 + trzy = ?</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="human" name="human" placeholder="Podaj odpowiednią cyfrę">
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <div class="col-sm-10 col-sm-offset-2 text-center">
                            <input id="submit" name="submit" type="submit" value="Wyślij" class="btn btn-xl btn-primary">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php
                				echo $errName;
                				echo $errEmail;
                				echo $errMessage;
                				echo $errHuman;
                        		echo $result;
                        	?>
                        </div>
                    </div>
                </form>
                <!-- <form class="text-center" name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Imię</label>
                  <input class="form-control" id="name" type="text" placeholder="Imię" required="required" data-validation-required-message="Podaj proszę swoje imię - będzie nam przyjemniej rozmawiać.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>E-mail</label>
                  <input class="form-control" id="email" type="email" placeholder="e-mail" required="required" data-validation-required-message="Proszę podaj swój e-mail, żebyśmy mogli odpisać.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Numer telefonu</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Numer telefonu" required="required" data-validation-required-message="Podaj telefon - rozmowa to najszybsza droga.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Wiadomość</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Treść wiadomości" required="required" data-validation-required-message="Napisz, jak możemy pomóc."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div class="form-group">
		        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
		            <div class="col-sm-10">
			        <input type="text" class="form-control" id="human" name="human" placeholder="Wynik">
	            	</div>
        	</div>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Wyślij</button>
              </div>
            </form> -->
        </div>
            </div>
        </div>

        <!-- <div class="col-lg-12 text-center">
          <a class="btn btn-primary btn-xl text-uppercase" href="mailto:ekooladesign@gmail.com" target="_top">Wyślij wiadomość</a>
        </div>
      </div> -->
</section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="copyright">Copyright &copy; DevOla 2018</span>
          </div>


        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <!--animation-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.5/js/mdb.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>new WOW().init();</script>

  </body>

</html>
