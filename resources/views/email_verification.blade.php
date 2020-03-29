<table cellspacing="10" style="margin-left:auto; margin-right:auto; text-align:center">
    <tr>
        <td><img src="/img/joblookupbasket.png"> <td>
    </tr>

    <tr>
        <td> <h1> Hey {{ $jobseekerName }}! </h1> </td>
    </tr>

    <tr>
        <td> Welcome to JobLookupBasket! </td>
    </tr>

    <tr>
        <td style="padding-top:20px"> <p>Please click the button below to verify your email address.</p> </td>
    </tr>

    <tr> 
        <td> <a href="/verify-email?token={{ $verificationToken }}"><button style="padding:20px 100px"><b>Verify My Email</b></button></a> </td>
    </tr>

    <tr> 
        <td> or paste this link into your browser https://joblookupbasket.com/verify-email?token={{ $verificationToken }}</td>
    </tr>

    <tr>
        <td style="padding-top:20px"> <p>If you did not signup to JobLookupBasket, please ignore this email.</p> </td>
    </tr>
</table>