<?php
if (isset($_POST['Email'])) {

    // EDIT THE FOLLOWING TWO LINES:
    $email_to = "kebeattie98@hotmail.com";
    $email_subject = "Test";

    function problem($error)
    {
        echo "We're sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem("We're sorry, but there appears to be a problem with the form you submitted.");
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- INCLUDE YOUR SUCCESS MESSAGE BELOW -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>GB Create Surveys and Design</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <header>

            <img class="logo" src="media/Logo1.png" alt="The logo, in grey and orange, for GB Create Ltd.">

            <nav>

                <!-- Desktop and tablet nav-->
                <ul class="nav-list" id="desk-nav">
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">Services &#9660;</button>
                            <div class="dropdown-content">
                                <a href="#">Structural Surveys</a>
                                <a href="#">Design</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li></li>

                </ul>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>



            </nav>


        </header>

        <main>
            <ul class="mobile-nav-list" id="links">
                <li><a href="index.html" onclick="myFunction()">Home</a></li>
                <li><a href="#">Structural Surveys</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="contact.html">Contact Us</a></li>

            </ul>
            <div class="form-submit">
                <h1>Thank you for getting in touch!</h1><br>
                <h2>We'll get back to you as soon as possible.</h2>
            </div>



        </main>

        <footer>
            <div class="f-container">

                <h3>Get in Touch</h3><br>
                <p><a href="mailto:gb_create@sky.com">gb_create@sky.com</a></p><br>
                <p><a href="tel:0728321743">0728321743</a></p><br>

                <div class="socials">
                    <a href="#" class="fa fa-facebook" id="fb"></a>
                    <a href="#" class="fa fa-instagram" id="ins"></a>
                </div>



            </div>
        </footer>

        <script src="script.js"></script>
    </body>

    </html>

    <?php
}
?>