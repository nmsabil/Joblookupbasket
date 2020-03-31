<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email template</title>
</head>
<body style="background-color: #E0E0E0;">
<table style="margin-left:auto; margin-right:auto; text-align:center; background-color: #fff; padding:40px">
    <tr>
        <td><img src="/img/joblookupbasket.png"> <td>
    </tr>

    <tr>
        <td> <h1 style="margin-bottom: 0;"> Hey {{ $jobseekerName }}! </h1> </td>
    </tr>

    <tr>
        <td style="font-size: 17px"> Welcome to JobLookupBasket! </td>
    </tr>

    <tr>
        <td style="padding-top:20px " > <p style="font-weight: bold; font-size: 18px; margin-bottom:10px";>Please click the button below to verify your email address.</p> </td>
    </tr>

    <tr> 
        <td> <a href="/verify-email?token={{ $verificationToken }}"><button style="padding:20px 100px; border-radius: 15px; background-color: #20469C; color: #fff; border: none;"><b>Verify My Email</b></button></a> </td>
    </tr>

    <tr > 
        <td style="padding-top: 10px;"> or paste this link into your browser <span style="color: #20469C;">https://joblookupbasket.com/verify-email?token={{ $verificationToken }}</span></td>
    </tr>

    <tr>
        <td style="padding-top:20px"> <p style="font-size: 13px;">If you did not signup to JobLookupBasket, please ignore this email.</p> </td>
    </tr>
</table>
</body>
</html>



