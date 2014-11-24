<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include_once('class.phpmailer.php');
include_once('class.smtp.php');
require_once('PHPWord.php');

$client = $_POST['client'];
$jobno = $_POST['jobno']; 
$projectName = $_POST['projectName'];
$reviewDate = $_POST['reviewDate'];
$customer = $_POST['customer'];
$company = $_POST['company'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$brief = $_POST['brief'];
$link = $_POST['link'];
$briefType = $_POST['jobType'];


$mail = new PHPMailer(true);

$allowedExts = array("psd", "pdf", "jpg", "jpeg", "ai", "indd", "xlsx", "docx", "xls", "doc", "rtf");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      chmod("upload/" . $_FILES["file"]["name"], 0777);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
  }
  
// New Word Document
$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate($briefType . '.docx');

$document->setValue('Value1', $client);
$document->setValue('Value2', $jobno);
$document->setValue('Value3', date("d-m-Y"));
$document->setValue('Value4', $projectName);
$document->setValue('Value7', $link);
$document->setValue('Value5', 'http://previews.gigatdst.com/upload/' . $_FILES["file"]["name"]);
$document->setValue('Value6', $reviewDate);


$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

$document->save('brief.docx');

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
$mail->Port = 587;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nvonmassow@thegigatdst.com';                 // SMTP username
$mail->Password = 'kYwCEG7UNKqYw_I38DdrZQ';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = "mattmaclennan@live.co.uk";
$mail->FromName = "Matt Maclennan";
if (stripos($company,'rbs') !== false) {
    $mail->addAddress("mmaclennen@thegigatdst.com");
}
else if (stripos($company,'white company') !== false) {
    $mail->addAddress("matt@mattmaclennan.onmicrosoft.com");
}
else {
    $mail->addAddress("mmaclennen@thegigatdst.com");
}
$mail->addReplyTo("mattmaclennan@live.co.uk", "Matt Maclennan");
//$mail->addAttachment('upload/'. $_FILES["file"]["name"]);
$mail->addAttachment('brief.docx'); // Add attachments

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body = "<html>
<body>
<table width='600' align='center' cellpadding='0' cellspqacing='0' style='font-family: Arial, Helvetica, sans-serif; font-size:14px; color: #000000;'>
<tr>
<td align='center' colspan='2'><img src='https:///previews.gigatdst.com/img/theGigLogo.png' width='200' height='246' style='display: block;' /></td>
</tr>
<tr>
<td align='center' colspan='2' style='font-size:20px; line-height:20px;'>&nbsp;</td>
</tr>
<tr>
<td align='center' colspan='2' style='font-size:24px;'>Brief Submission</td>
</tr>
<tr>
<td align='center' colspan='2' style='font-size:20px; line-height:20px;'>&nbsp;</td>
</tr>
<tr>
<td>Customer: </td><td>". $customer ."</td>
</tr>
<tr>
<td>Company: </td><td>". $company ."</td>
</tr>
<tr>
<td>Telephone: </td><td>". $telephone ."</td>
</tr>
<tr>
<td>Email: </td><td>". $email ."</td>
</tr>
<tr>
<td valign='top'>Link to design files: </td><td>". $link ."</td>
</tr>
<tr>
<td valign='top'>Brief: </td><td>". $brief ."</td>
</tr>
</table>
</body>
</html>";

if(!$mail->send()) {
    echo '       <div class="row blurb">
            <div class="col-md-12"><p>Your message was not sent, please try again.</p></div>
            </div>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo '<div class="row blurb">
            <div class="col-md-12"><p>Thanks for your email, we\'ll get back to you as soon as possible.</p></div>
            </div>';
}
}

?>