<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Sent</title>
</head>
<body>
    <form action="{{ route('verification.send')}}" method="post">
        @csrf
        <h1>Verification email sent successfully</h1>
        <p>didn't receive an email?</p>
        <button type="submit">Request a new one</button>
    </form>
</body>
</html>