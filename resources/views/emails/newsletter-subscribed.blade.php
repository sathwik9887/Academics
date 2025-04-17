<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Our Newsletter</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px;">
    <!-- Logo -->
    <div style="text-align: center;">
        <img src="{{ asset('assets/images/logo.jpg') }}" alt="Academics Logo" style="max-width: 150px;">
    </div>

    <!-- Welcome Message -->
    <h1>Welcome!</h1>
    <p>Thanks for subscribing to our newsletter: {{ $email }}</p>

    <p>We're excited to have you on board. Stay tuned for our latest updates!</p>
</body>

</html>