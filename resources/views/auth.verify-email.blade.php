<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <div>
        <h1>Email Verification Required</h1>
        <p>Please check your email inbox for a verification link.</p>
        <p>If you haven't received the email, you can request another verification link by clicking the button below:</p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Resend Verification Email</button>
        </form>
    </div>
</body>
</html>
