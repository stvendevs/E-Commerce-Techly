<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi OTP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            color: rgba(255, 255, 255, 0.9);
            margin: 10px 0 0 0;
            font-size: 14px;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .otp-box {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .otp-code {
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 8px;
            color: #667eea;
            font-family: 'Courier New', monospace;
        }
        .expiry {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 15px;
        }
        .warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 25px 0;
            text-align: left;
            border-radius: 0 8px 8px 0;
        }
        .warning p {
            margin: 0;
            color: #856404;
            font-size: 13px;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #eee;
        }
        .footer p {
            color: #999;
            font-size: 12px;
            margin: 5px 0;
        }
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🛒 Techly</div>
            <p>Gadget & Elektronik Terbaru</p>
        </div>
        
        <div class="content">
            <p class="greeting">Halo, <strong>{{ $userName }}</strong>!</p>
            
            <p class="message">
                Terima kasih telah mendaftar di Techly. Gunakan kode OTP berikut untuk memverifikasi alamat email Anda:
            </p>
            
            <div class="otp-box">
                <div class="otp-code">{{ $otp }}</div>
                <p class="expiry">⏱️ Kode berlaku selama 5 menit</p>
            </div>
            
            <div class="warning">
                <p>⚠️ <strong>Jangan bagikan kode ini kepada siapa pun.</strong> Tim Techly tidak akan pernah meminta kode OTP Anda.</p>
            </div>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis oleh sistem.</p>
            <p>© {{ date('Y') }} Techly. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
