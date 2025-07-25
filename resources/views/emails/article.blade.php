<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mail Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: #f4f4f7;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 32px 24px;
        }

        .logo {
            display: block;
            margin: 0 auto 24px auto;
            height: 75px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 16px;
            text-align: center;
        }

        .content {
            color: #444;
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .footer {
            font-size: 13px;
            color: #888;
            text-align: center;
            margin-top: 32px;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}">
            <img src="https://cdn-icons-png.flaticon.com/512/646/646176.png" class="logo" alt="Mail Logo">
        </a>
        <h1>Hello {{ $user->name }}</h1>
        <div class="content">
            {!! nl2br(e($articleContent ?? 'No content provided.')) !!}
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>
