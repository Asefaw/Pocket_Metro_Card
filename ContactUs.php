<?php
$subjectPrefix = '[Contact Us]';
$emailTo = 'asefaw.mekuria@gmail.com';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-tel']));
    $subject = stripslashes(trim($_POST['form-assunto']));
    $message = stripslashes(trim($_POST['form-mensagem']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Nome: $name <br /> Email: $email <br /> Telefone: $phone <br /> Mensagem: $message";
        $headers .= sprintf( 'Return-Path: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'From: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Reply-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
        $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
        $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
        $headers .= sprintf( 'Disposition-Notification-To: %s%s', $email, PHP_EOL );
        $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
        $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
        $headers .= sprintf( 'Content-Type: text/html; charset="utf-8"%s', PHP_EOL );
        mail($emailTo, "=?utf-8?B?".base64_encode($subject)."?=", $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?><!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <title>Pocket Metrocard - Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/circles.css" />


    <noscript>
        <link rel="stylesheet" type="text/css" href="css/skel.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style-xlarge.css" />
    </noscript>
</head>
<body class="landing">
    <!-- Header -->
            <header id="header">
                <h1><a href="index.html">Pocket MetroCard</a></h1>
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="signup.php" class="button special">Sign Up</a></li>
                        <li><a href="signin.php" class="button special">Sign In</a></li>
                    </ul>
                </nav>
            </header>

            <section id="banner" class="wrapper style2 special">
                <div class="container">
                    <header class="major">
                        <h2>We appreciate your feedback. Have any questions? Critiques? Send them down our way! Don't be shy if it's a compliment too. We appreciate that. ;)</h2>
                    </header>
                </div>
            </section>
        <section id="three" class="wrapper style3 special">
                <div class="container">
                    <header class="major">
                        <h2>Contact Us Form.</h2>
                        <p>We do not share your information.

                        <?php if(!empty($emailSent)): ?>
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-success text-center">This message has successfully sent.</div>
                            </div>
                        <?php else: ?>
                        <?php if(!empty($hasError)): ?>
                            <div class="col-md-5 col-md-offset-4">
                                <div class="alert alert-danger text-center">There was an error when sending. Check your email/wifi!</div>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-6 col-md-offset-3">
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="col-lg-2 control-label">Telephone</label>
                                <div class="col-lg-10">
                                    <input type="tel" class="form-control" id="form-tel" name="form-tel" placeholder="Telephone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="assunto" class="col-lg-2 control-label">Subject</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="form-assunto" name="form-assunto" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mensagem" class="col-lg-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="form-mensagem" name="form-mensagem" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>

                    </header>
                </div>
                
            </section>

        <!-- Footer -->
            <footer id="footer">
                <div class="container">
                    
                    <div class="row">
                        <div class="8u 12u$(medium)">
                            <ul class="copyright">
                                <li>&copy; Pocket MetroCard. All rights reserved.</li>
                                
                            </ul>
                        </div>
                        <div class="4u$ 12u$(medium)">
                            <ul class="icons">
                                <li>
                                    <a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
                                </li>
                                <li>
                                    <a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

    <!--[if lt IE 9]>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="assets/js/contactus.js"></script>

<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
</body>
</html>