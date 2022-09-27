<?php

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  $message = "";

if(isset($_POST["action"])){
// reference the Dompdf namespace
require 'vendor/autoload.php';
// instantiate and use the dompdf class
$dompdf = new dompdf();

$html = '  

<div class="container">
<h2 class="mb-2 text-secondary" style="background-color:#fff; padding:5px;  font-size:36px; margin:0; margin-bottom:10px; text-align-center"><i class="zmdi zmdi-account-o"></i> Tripodeal</h2><br>
    <div class="bg-light mt-2 mb-3 bg-white p-3  rounded">
    <div class="float-left"><b class="h3">E-TICKET</b>
    <br>Status :<span style="margin-top: 3px;float: right; color: #fff; line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25rem; display: inline-block;  padding: .40em .6em;  font-size: 75%; font-weight: 500;background-color:#155724">
    Confirmed </span>
    </div>
    <div class="float-right"> SastaSafar Booking Id : <span><b>#SSF00341284</b></span></div><br><br>
    <div style="clear: both;"></div>
    </div>
    <h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-bottom:10px;"><i class="zmdi zmdi-account-o"></i> Passengers</h6>
<table class="table table-borderless" style="width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;">
<thead>
<tr>
<th style="border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;" width="2%" scope="col">#</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;" width="10%" scope="col">Type</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px; " width="28%" scope="col">Name</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;" width="30%" scope="col">Airline PNR </th> <th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;" width="30%" scope="col">Ticket Number </th> </tr>
</thead>
<tbody>
<tr>
<td style="border:1px solid #eee;padding:10px;" scope="row">1</td>
<td style="border:1px solid #eee;padding:10px;"> Adult</td>
<td style="border:1px solid #eee;padding:10px;">Ms Archana Gosavi</td>
<td style="border:1px solid #eee;padding:10px;">67PCX7</td> <td style="border:1px solid #eee;padding:10px;">0985241693771</td> </tr>
<tr>
<td style="border:1px solid #eee;padding:10px;" scope="row">2</td>
<td style="border:1px solid #eee;padding:10px;"> Child</td>
<td style="border:1px solid #eee;padding:10px;">Master Aarav Bharati</td>
<td style="border:1px solid #eee;padding:10px;">67PCX7</td> <td style="border:1px solid #eee;padding:10px;"></td> </tr>
</tbody>
</table>

<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-bottom:10px;"><i class="zmdi zmdi-airplane"></i> Flights</h6>
<table class="table table-borderless" style="width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;">
<thead>
<tr>
<th style="border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;" scope="col">Airline</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;" scope="col">Flight</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;" scope="col">Origin</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;" scope="col">Destination</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row" colspan="3" style="background-color: #d9e5fb;text-align:left; padding:10px;">Flight #1 </th>
<th style="background-color: #d9e5fb;"> <a href="http://www.airindia.in/web-check-in.htm" target="_blank" style="float: right; color: #fff; background-color: #007bff;line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25rem; display: inline-block;  padding: .40em .6em;  font-size: 75%; font-weight: 500;">Web check-in</a></th>
</tr>
<tr>
<th style="border:1px solid #eee;padding:10px;" scope="row"><div><img src="https://www.tripodeal.com/img/air/AI.png" width="30"></div></th>
<td style="border:1px solid #eee;padding:10px;">Air India<br><small class="text-muted">AI 607</small></td>
<td style="border:1px solid #eee;padding:10px;"><b>16:40 </b> Oct 09<br><small class="text-muted">Mumbai (BOM)</small></td>
<td style="border:1px solid #eee;padding:10px;"><b>18:20 </b> Oct 09<br><small class="text-muted">Bangalore (BLR)</small></td>
</tr>
</tbody>
</table>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;"><i class="zmdi zmdi-receipt"></i> Insurance</h6>
<div class="alert alert-warning">
<h6 class="m-0" style=" font-size:13px; margin:0;">Your trip is not insured with travel insurance. If you want buy please call us at +91 08069-335-000.</h6>
</div>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;"><i class="zmdi zmdi-receipt"></i> Fare Detail</h6>
<table class="table table-borderless" style="width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;">
<thead>
<tr>
<th style="border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;" width="25%" scope="col">Traveller</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;" width="25%" scope="col">Base Fare</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;" width="25%" scope="col">Taxes & Fee</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;" width="25%" scope="col">Total Fare</th>
</tr>
</thead>
<tbody>
<tr>
<td style="border:1px solid #eee;text-align:right; padding:10px;">1 Adult</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;">&#8377;5230</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;">&#8377;760</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;5990</b></td>
</tr>
<tr>
<td style="border:1px solid #eee;text-align:right; padding:10px;">1 Child</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;">&#8377;5230</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;">&#8377;760</td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;5990</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style="border:1px solid #eee;text-align:right; padding:10px;" colspan="3"><b>Insurance <span style="color:#dc3545">(Not Included)</span> </b></td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;0</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style="border:1px solid #eee;text-align:right; padding:10px;" colspan="3"><b>Convenience Fee</b></td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;300</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style="border:1px solid #eee;text-align:right; padding:10px;" colspan="3"><b>Coupon Code <span style="color:#28a745"> [FLYDAY] </span></b></td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;200 (OFF)</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style="border:1px solid #eee;text-align:right; padding:10px;" colspan="3"><b>Total</b></td>
<td style="border:1px solid #eee;text-align:right; padding:10px;"><b>&#8377;12080</b></td>
</tr>
</tbody>
</table>

<h6 class="font-weight-bold pb-3" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;">Booking Terms & Conditions</h6>
<div class="small text-muted mb-3"><i class="zmdi zmdi-chevron-right"></i> All passengers, including children and infants, have to present their valid ID proof at the time of check-in.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> We recommend you checkin at least 3 hours prior to departure of your domestic flight and 4 hours prior to your international flight.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Carriage and other facilities provided by the carrier are subject to their Terms and Condition. We are not liable for missing any facility
of the carrier.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i>To cancel tickets in less than 6 hours prior to departure, please contact the airlines directly. We are not at all responsible for any losses on receiving the request in such cases.<br><br>
 
<i class="zmdi zmdi-chevron-right"></i> For Fare Rules / Cancellation policy- refer to fare rules laid by the carrier.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Please check covid advisory before travel.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Taxes and convenience charges are non - refundable in any cases.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Flight timings are subject to change without prior notice. Please recheck with the carrier prior to departure.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Recheck your baggage with your respective airline before travelling for hassle-free travel experience.<br>
</div>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin-top:20px; margin-bottom:10px;"><i class="zmdi zmdi-account-o"></i> Customer Support</h6>
<table class="table table-borderless" style="width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;">
<thead>
<tr>
<th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;" width="40%" scope="col">SastaSafar Support</th>
<th style="border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px; " width="40%" scope="col">Passengers Information </th>
</tr>
</thead>
<tbody>
<tr>
<td style="border:1px solid #eee;padding:10px;" scope="row">
<div style="padding:4px 2px;"> <i class="zmdi zmdi-email"></i> Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfcccacfcfd0cdcbffcbcddec9dad3ccdadacc91dcd0d2">[email&#160;protected]</a></div>
<div style="padding:4px 2px;"><i class="zmdi zmdi-phone-in-talk"></i> Phone: 08069-335-000</div>
</td>
<td style="border:1px solid #eee;padding:10px;">
<div style="padding:4px 2px;"> <i class="zmdi zmdi-email"></i> Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="addfd8dec5c4cfcfc5ccdfccd9c4edcac0ccc4c183cec2c0">[email&#160;protected]</a></div>
<div style="padding:4px 2px;"><i class="zmdi zmdi-phone-in-talk"></i> Phone: 8879430551</div>
<div style="font-size: 11px; color: #989696; padding: 3px 2px;">Information about primary traveller. Any communication by airlines will be sent to these details.</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
';   

$dompdf->set_option('isRemoteEnabled',TRUE);

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4','portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$file = $dompdf->output();
$filename = 'Ticket.pdf';
$encode = 'base64';
$type = 'application/pdf';



require 'vendor/autoload.php';


	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.sendgrid.net';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '587';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'apikey';					//Sets SMTP username
	$mail->Password = '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';					//Sets SMTP password
	$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'iammohammadfaizz@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'Mohd Faiz';			//Sets the From name of the message
	$mail->AddAddress('mohd.Faiz@tripodeal.com');		//Adds a "To" address
	$mail->WordWrap = 30;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddStringAttachment($file,$filename,$encode,$type);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Tripodeal Ticket Booking';			//Sets the Subject of the message
	$mail->Body = $html;				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}


}
?>

<!doctype html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://www.sastasafar.com/css/bootstrap.min.css">


<title>Your E-Ticket - TripOdeal.com</title>

</head>
<body class="bgshade-1">

<div class="body-mains">
<div class="bg-white  header">
<div class="container">
<form method="post">
				<input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
			</form>
<nav class="navbar navbar-expand-xl navbar-light">
<a class="navbar-brand" href="/">
<img src="https://www.sastasafar.com/img/sastasafar_logo.png" alt="SastaSafar" class="pt-0 pb-0" width="160">
</a>
<div class="collapse navbar-collapse " id="navbarText" style="text-align:left">
<div class="breadcrumb_a ml-auto mr-auto flat">
<a href="#" class="active">Search</a>
<a href="#" class="active">Select</a>
<a href="#" class="active">Payment</a>
<a href="#" class="active">Confirmation</a>
</div>
</div>



<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

</nav>

</div>
</div>

<div class="container">
<div class="row">
<div class="col col-sm-12 col-md-8 ml-auto mr-auto pt-3">
<div class='bg-light rounded  p-3 mb-1 text-right'>
<div class="row">
<div class="col-12 col-md-4 mb-3 mb-md-0">
<div style="text-align: left; font-size:13px;"><i class="zmdi zmdi-calendar"></i><small> Booking Date & Time</small><br><b>Tue, 27 Sep 2022, 12:00 PM</b></div>
</div>
<div class="col-12 col-md-8 pr-3 dontprint">
<div class="btn-group" role="group" aria-label="Basic example">
<button type="button" class="btn btn-info" onclick="window.print();"><i class="zmdi zmdi-print"></i> Print</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#emailModal"><i class="zmdi zmdi-email"></i> Email</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#supportModal"><i class="zmdi zmdi-phone-msg"></i> Support</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#supportModal"><i class="zmdi zmdi-close"></i> Cancel</button>
</div>
</div>
</div>
</div>
<div class="bg-light mt-2 mb-3 bg-white p-3  rounded">
<div class="float-left"><b class="h3">E-TICKET</b>
<br>Status :<span style="margin-top: 3px;float: right; color: #fff; line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25rem; display: inline-block;  padding: .40em .6em;  font-size: 75%; font-weight: 500;background-color:#155724">
Confirmed </span>
</div>
<div class="float-right"> SastaSafar Booking Id.<br> <b>#SSF00341284</b></div>
<div style="clear: both;"></div>
</div>


<div class="bg-light mt-2 mb-3 bg-white p-3  rounded ">


<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-bottom:10px;"><i class="zmdi zmdi-account-o"></i> Passengers</h6>
<table class="table table-borderless" style='width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;'>
<thead>
<tr>
<th style='border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;' width="2%" scope="col">#</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;' width="10%" scope="col">Type</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px; ' width="28%" scope="col">Name</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;' width="30%" scope="col">Airline PNR </th> <th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;' width="30%" scope="col">Ticket Number </th> </tr>
</thead>
<tbody>
<tr>
<td style='border:1px solid #eee;padding:10px;' scope="row">1</td>
<td style='border:1px solid #eee;padding:10px;'> Adult</td>
<td style='border:1px solid #eee;padding:10px;'>Ms Archana Gosavi</td>
<td style='border:1px solid #eee;padding:10px;'>67PCX7</td> <td style='border:1px solid #eee;padding:10px;'>0985241693771</td> </tr>
<tr>
<td style='border:1px solid #eee;padding:10px;' scope="row">2</td>
<td style='border:1px solid #eee;padding:10px;'> Child</td>
<td style='border:1px solid #eee;padding:10px;'>Master Aarav Bharati</td>
<td style='border:1px solid #eee;padding:10px;'>67PCX7</td> <td style='border:1px solid #eee;padding:10px;'></td> </tr>
</tbody>
</table>

<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-bottom:10px;"><i class="zmdi zmdi-airplane"></i> Flights</h6>
<table class="table table-borderless" style='width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;'>
<thead>
<tr>
<th style='border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;' scope="col">Airline</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;' scope="col">Flight</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;' scope="col">Origin</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left; padding:10px;' scope="col">Destination</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row" colspan="3" style="background-color: #d9e5fb;text-align:left; padding:10px;">Flight #1 </th>
<th style="background-color: #d9e5fb;"> <a href="http://www.airindia.in/web-check-in.htm" target="_blank" style="float: right; color: #fff; background-color: #007bff;line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25rem; display: inline-block;  padding: .40em .6em;  font-size: 75%; font-weight: 500;">Web check-in</a></th>
</tr>
<tr>
<th style="border:1px solid #eee;padding:10px;" scope="row"><img src="https://www.tripodeal.com/img/air/AI.png" width="30"></th>
<td style="border:1px solid #eee;padding:10px;">Air India<br><small class="text-muted">AI 607</small></td>
<td style="border:1px solid #eee;padding:10px;"><b>16:40 </b> Oct 09<br><small class="text-muted">Mumbai (BOM)</small></td>
<td style="border:1px solid #eee;padding:10px;"><b>18:20 </b> Oct 09<br><small class="text-muted">Bangalore (BLR)</small></td>
</tr>
</tbody>
</table>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;"><i class="zmdi zmdi-receipt"></i> Insurance</h6>
<div class="alert alert-warning">
<h6 class="m-0" style=" font-size:13px; margin:0;">Your trip is not insured with travel insurance. If you want buy please call us at +91 08069-335-000.</h6>
</div>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;"><i class="zmdi zmdi-receipt"></i> Fare Detail</h6>
<table class="table table-borderless" style='width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;'>
<thead>
<tr>
<th style='border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;' width="25%" scope="col">Traveller</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;' width="25%" scope="col">Base Fare</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;' width="25%" scope="col">Taxes & Fee</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:right; padding:10px;' width="25%" scope="col">Total Fare</th>
</tr>
</thead>
<tbody>
<tr>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>1 Adult</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>&#8377;5230</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>&#8377;760</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;5990</b></td>
</tr>
<tr>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>1 Child</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>&#8377;5230</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'>&#8377;760</td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;5990</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style='border:1px solid #eee;text-align:right; padding:10px;' colspan="3"><b>Insurance <span style='color:#dc3545'>(Not Included)</span> </b></td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;0</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style='border:1px solid #eee;text-align:right; padding:10px;' colspan="3"><b>Convenience Fee</b></td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;300</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style='border:1px solid #eee;text-align:right; padding:10px;' colspan="3"><b>Coupon Code <span style='color:#28a745'> [FLYDAY] </span></b></td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;200 (OFF)</b></td>
</tr>
<tr style="border-top: 1px solid rgba(0,0,0,.1); border-bottom: 1px solid rgba(0,0,0,.1);">
<td style='border:1px solid #eee;text-align:right; padding:10px;' colspan="3"><b>Total</b></td>
<td style='border:1px solid #eee;text-align:right; padding:10px;'><b>&#8377;12080</b></td>
</tr>
</tbody>
</table>

<h6 class="font-weight-bold pb-3" style="background-color:#eee; padding:5px;  font-size:18px; margin:0; margin-top:10px; margin-bottom:10px;">Booking Terms & Conditions</h6>
<div class="small text-muted mb-3"><i class="zmdi zmdi-chevron-right"></i> All passengers, including children and infants, have to present their valid ID proof at the time of check-in.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> We recommend you checkin at least 3 hours prior to departure of your domestic flight and 4 hours prior to your international flight.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Carriage and other facilities provided by the carrier are subject to their Terms and Condition. We are not liable for missing any facility
of the carrier.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i>To cancel tickets in less than 6 hours prior to departure, please contact the airlines directly. We are not at all responsible for any losses on receiving the request in such cases.<br><br>
 
<i class="zmdi zmdi-chevron-right"></i> For Fare Rules / Cancellation policy- refer to fare rules laid by the carrier.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Please check covid advisory before travel.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Taxes and convenience charges are non - refundable in any cases.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Flight timings are subject to change without prior notice. Please recheck with the carrier prior to departure.<br>
<br>
<i class="zmdi zmdi-chevron-right"></i> Recheck your baggage with your respective airline before travelling for hassle-free travel experience.<br>
</div>
<h6 class="mb-2 text-primary" style="background-color:#eee; padding:5px;  font-size:18px; margin-top:20px; margin-bottom:10px;"><i class="zmdi zmdi-account-o"></i> Customer Support</h6>
<table class="table table-borderless" style='width:100%; padding:10px; border-collapse: collapse; border:1px solid #eee;'>
<thead>
<tr>
<th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px;' width="40%" scope="col">SastaSafar Support</th>
<th style='border:1px solid #eee; background-color:#eee;text-align:left;  padding:10px; ' width="40%" scope="col">Passengers Information </th>
</tr>
</thead>
<tbody>
<tr>
<td style='border:1px solid #eee;padding:10px;' scope="row">
<div style="padding:4px 2px;"> <i class="zmdi zmdi-email"></i> Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfcccacfcfd0cdcbffcbcddec9dad3ccdadacc91dcd0d2">[email&#160;protected]</a></div>
<div style="padding:4px 2px;"><i class="zmdi zmdi-phone-in-talk"></i> Phone: 08069-335-000</div>
</td>
<td style='border:1px solid #eee;padding:10px;'>
<div style="padding:4px 2px;"> <i class="zmdi zmdi-email"></i> Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="addfd8dec5c4cfcfc5ccdfccd9c4edcac0ccc4c183cec2c0">[email&#160;protected]</a></div>
<div style="padding:4px 2px;"><i class="zmdi zmdi-phone-in-talk"></i> Phone: 8879430551</div>
<div style="font-size: 11px; color: #989696; padding: 3px 2px;">Information about primary traveller. Any communication by airlines will be sent to these details.</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="supportModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body text-center">
<img src="img/Call-center-bro.png" width="200">
<br>
<span class="h5 text-primary font-weight-bold">Please call us for any further information.</span>
<br>
<span class="h6 font-weight-bold text-success">08069-335-000</span>
<br>
</div>
</div>
</div>
</div>
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="supportModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-primary"><h5><i class="zmdi zmdi-email"></i> Email Itinerary</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body text-center">
<form action='' method='post' name="emailUser" id="emailUser">
<div class="col-12 ">
<div class="form-group">
<input type='text' name='reEmail' id='reEmail' value="" class='form-control required' placeholder="Please enter email">
<input type="hidden" name='booking_id' value="341284" id="booking_id">
<input type="hidden" name='tod_order_id' value="SSF00341284" id="tod_order_id">
<input type="hidden" name='tod_book_id' value="633298227f6252f77801ec57" id="tod_book_id">
</div>
</div>
<div class="col-12 ">
<div class="form-groupNew">

<button class="btn btn-block btn-danger bgshade-2" type="button" id="emailSendUser" onclick="emailResend();">SUBMIT</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>