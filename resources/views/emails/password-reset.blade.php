<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px;">
    <!-- Logo -->
    <div style="text-align: center;">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="Academics Logo" style="max-width: 150px;">
    </div>

    <!-- Greeting -->
    <h2>Hello!</h2>
    <p>You requested to reset your password. Click the button below to continue:</p>

    <!-- Reset Password Button -->
    <a href="{{ url('/reset-password/' . $token . '?email=' . urlencode($email)) }}"
        style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">
        Reset Password
    </a>

    <p>If you didn’t request this, feel free to ignore this message.</p>
</body>

</html>