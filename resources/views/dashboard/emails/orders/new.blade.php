<!DOCTYPE html>

<html>

<head>

    <title>nqla.com</title>

</head>

<body>

<h1>{{ $data['title'] }}</h1>

<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
    <div style="margin:50px auto;width:70%;padding:20px 0">
        <div style="border-bottom:1px solid #eee">
            <a href="nqla.com" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Nqla</a>
        </div>
        <p style="font-size:1.1em">Hi,</p>
        <p>Thank you for choosing Nqla. Use the following OTP to complete your Sign Up . OTP is valid for 5 minutes</p>
        <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            Sub Total: {{ $data['sub_total'] }}  SAR
        </h2>

        <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
            Total : {{ $data['total'] }}  SAR
        </h2>

        <p style="font-size:0.9em;">Regards,<br />Nqla</p>
        <hr style="border:none;border-top:1px solid #eee" />
    </div>
</div>

</body>

</html>
