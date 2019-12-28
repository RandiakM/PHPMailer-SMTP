<html>
<head>
  <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
</html>
<?php
require "PHPMailer/PHPMailerAutoload.php";
date_default_timezone_set('Etc/UTC');
/*this is a post method from index.php file form action,
$_POST['sendmail']--> sendmail is a contact form button name tag, name.
*/
if(isset($_POST['sendmail'])){
  /*these are conatct form inputs*/
    $name = trim(stripslashes($_POST['fullname']));
    $email = trim(stripslashes($_POST['email']));
    $subj = trim(stripslashes($_POST['subject']));
    $msg = trim(stripslashes($_POST['message']));
    /*this is a function for find whether mail is correct or not.
    */
    function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
   }
   /*Those are sweet alert functions for popup alert boxes with ok button.
   redirect new window location/url after clicking the ok button
   */
    if(trim($name) == '') {
    	echo '<script type="text/javascript">
        swal("Please enter your name.", "", "error").then(function(){
            window.location = "Your site url";
        });
        </script>';
    	exit();
    } else if(trim($email) == '') {
    	echo '<script type="text/javascript">
        swal("Please enter a valid email address", "", "error").then(function(){
            window.location = "Your site url";
        });
        </script>';
    	exit();
    } else if(!isEmail($email)) {
    	echo '<script type="text/javascript">
        swal("You have entered an invalid e-mail address. Please try again.", "", "error").then(function(){
            window.location = "Your site url";
        });
        </script>';
    	exit();
    } else if(!trim($subj)) {
    	echo '<script type="text/javascript">
        swal("Please enter a subject.", "", "error").then(function(){
            window.location = "Your site url";
        });
        </script>';
    	exit();
    } else if(!trim($msg)) {
    	echo '<script type="text/javascript">
        swal("Please enter a message.", "", "error").then(function(){
            window.location = "Your site url";
        });
        </script>';
    	exit();
    }
    /*this is the smtpmailer function
    */
    function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        //$mail->SMTPDebug = 2;

        $mail->SMTPSecure = 'ENTER SMTP PROTOCOL';
        $mail->Host = 'ENTER SMTP SERVER HOST NAME';
        $mail->Port = ENTER SMTP PORT NUMBER;
        $mail->Username = 'ENTER YOUR MAIL ID';
        $mail->Password = 'ENTER YOUR EMAIL PASSWORD';

   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);

        $mail->IsHTML(true);
        $mail->From=trim(stripslashes($_POST['email']));
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);

        if(!$mail->Send())
        {
            	echo '<script type="text/javascript">
                swal("We are Sorry for Technical Error", "Please click ok!", "error").then(function(){
                    window.location = "Your site url";
                });
            	</script>';
        }
        else
        {
            echo '<script type="text/javascript">
                swal("Thank you for contact TekTelLanka", "Please click ok!", "success").then(function(){
                    window.location = "Your site url";
                });
            	</script>';
        }
    }
    $to   = 'ENTER TO EMAIL';
    $from = trim(stripslashes($_POST['email']));
    $name = trim(stripslashes($_POST['fullname']));
    $subj = trim(stripslashes($_POST['subject']));
    $msg = trim(stripslashes($_POST['message']));


    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    header("Location: Your site url");

}




?>
