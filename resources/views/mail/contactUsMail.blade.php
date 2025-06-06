<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        * {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif;
        }

        .container {
            max-width: 680px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            padding: 32px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 32px;
            border-bottom: 2px solid #f1f5f9;
        }

        .header h1 {
            font-size: 32px;
            color: #0f172a;
            letter-spacing: -0.75px;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin: 0;
        }

        .header-icon {
            padding: 12px;
            background: #dcdcdc;
            border-radius: 50%;
        }

        .section-title {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.25px;
            margin: 0;
        }

        .field-container {
            display: block;
            margin-bottom: 24px;
        }

        .field-box {
            width: 100%;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 16px;
        }


        .field-box-full {
            flex: 1 1 100%;
        }

        .field-content {
            font-size: 18px;
            font-weight: 600;
            color: #0f172a;
            padding-left: 52px;
            margin: 0;
        }

        .field-icon {
            display: inline-block;
            padding: 8px;
            background: #dcdcdc;
            border-radius: 8px;
            margin-right: 18px;
        }

        .message-box {
            margin-top: 32px;
            padding: 24px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .message-content {
            color: #0f172a;
            font-size: 16px;
            line-height: 1.7;
            padding-left: 52px;
            white-space: pre-wrap;
        }

        .footer {
            margin-top: 40px;
            padding-top: 32px;
            border-top: 2px solid #f1f5f9;
            text-align: center;
        }

        .footer p {
            margin: 8px 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        @media only screen and (max-width: 600px) {
            .field-box {
                flex: 1 1 100%;
            }

            .field-content {
                padding-left: 0;
            }

            .message-content {
                padding-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1><span class="header-icon">✉️</span><span>New Contact Message</span></h1>
            <p style="color: #64748b; font-size: 16px; margin-top: 16px; margin-right: 20px;">You've received a new
                message from your website
                contact form</p>
        </div>

        <div class="field-container">
            <div class="field-box">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <span class="field-icon">👤</span>
                    <p class="section-title">FIRST NAME</p>
                </div>
                <p class="field-content">{{ $contactMailData['firstName'] }}</p>
            </div>

            <div class="field-box">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <span class="field-icon">👤</span>
                    <p class="section-title">LAST NAME</p>
                </div>
                <p class="field-content">{{ $contactMailData['lastName'] }}</p>
            </div>

            <div class="field-box field-box-full">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <span class="field-icon">📧</span>
                    <p class="section-title">EMAIL ADDRESS</p>
                </div>
                <p class="field-content">{{ $contactMailData['email'] }}</p>
            </div>

            <div class="field-box field-box-full">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <span class="field-icon">📱</span>
                    <p class="section-title">PHONE NUMBER</p>
                </div>
                <p class="field-content">{{ $contactMailData['phoneNo'] ?? 'Not provided' }}</p>
            </div>

            <div class="field-box field-box-full">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 8px;">
                    <span class="field-icon">📌</span>
                    <p class="section-title">SUBJECT</p>
                </div>
                <p class="field-content">{{ $contactMailData['subject'] }}</p>
            </div>
        </div>

        <div class="message-box">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <span class="field-icon">💬</span>
                <p class="section-title">MESSAGE</p>
            </div>
            <div class="message-content">
                {{ $contactMailData['message'] }}
            </div>
        </div>

        <div class="footer">
            <p>This message was sent via contact form on {{ config('app.name') }}<br>
                🕒 Received at: {{ now()->format('M j, Y \a\t g:i A') }}</p>
        </div>
    </div>
</body>

</html>
