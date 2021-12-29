<!-- <?php 
// if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    // $email_to = "worldlive-2@hotmail.com";
    // $email_subject = "New contact form submission";

    // function problem($error)
    // {
    //     echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    //     echo "These errors appear below.<br><br>";
    //     echo $error . "<br><br>";
    //     echo "Please go back and fix these errors.<br><br>";
    //     die();
    // }

    // // validation expected data exists
    // if (
    //     !isset($_POST['Name']) ||
    //     !isset($_POST['Email']) ||
    //     !isset($_POST['Message'])
    // ) {
    //     problem('We are sorry, but there appears to be a problem with the form you submitted.');
    // }

    // $name = $_POST['Name']; // required
    // $email = $_POST['Email']; // required
    // $message = $_POST['Message']; // required

    // $error_message = "";
    // $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    // if (!preg_match($email_exp, $email)) {
    //     $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    // }

    // $string_exp = "/^[A-Za-z .'-]+$/";

    // if (!preg_match($string_exp, $name)) {
    //     $error_message .= 'The Name you entered does not appear to be valid.<br>';
    // }

    // if (strlen($message) < 2) {
    //     $error_message .= 'The Message you entered do not appear to be valid.<br>';
    // }

    // if (strlen($error_message) > 0) {
    //     problem($error_message);
    // }

    // $email_message = "Form details below.\n\n";

    // function clean_string($string)
    // {
    //     $bad = array("content-type", "bcc:", "to:", "cc:", "href");
    //     return str_replace($bad, "", $string);
    // }

    // $email_message .= "Name: " . clean_string($name) . "\n";
    // $email_message .= "Email: " . clean_string($email) . "\n";
    // $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
//     $headers = 'From: ' . $email . "\r\n" .
//         'Reply-To: ' . $email . "\r\n" .
//         'X-Mailer: PHP/' . phpversion();
//     @mail($email_to, $email_subject, $email_message, $headers);
// ?>

    include your success message below

    Thank you for reaching me. I will be in touch with you very soon.
    header(‘Location: contact-form-thank-you.html’);


<?php
}
?>




// PHP code to send email from a contact form
<?php 
if (isset($_POST['Email'])) {
    $email_to: "worldlive-2@hotmail.com";
    $email_subject = "New Form Submission";

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    if (empty($Name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($Email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($Message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'worldlive-2@hotmail.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $Email, 'Reply-To' => $Email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$Name}", "Email: {$Email}", "Message:", $Message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.html');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>


