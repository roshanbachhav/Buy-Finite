<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; color: #333;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0"
                    style="background-color: #ffffff; border: 1px solid #e0e0e0;">
                    <tr>
                        <td>
                            <h2 style="margin-top: 0;">Reset your password</h2>
                            <p>Hello,</p>
                            <p>You’re receiving this email because we received a password reset request for your
                                account.</p>

                            <p style="text-align: center; margin: 30px 0;">
                                <a href="{{ route('recovery.password.url', $resetInfo['token']) }}"
                                    style="display: inline-block; padding: 10px 20px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 4px;">
                                    Reset Password
                                </a>
                            </p>

                            <p>If you didn’t request a password reset, no further action is required.</p>
                            <br>
                            <div
                                style="background-color: #f9f9f9; padding: 15px; border-radius: 5px; border: 1px solid #f1c40f; color: #e67e22; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                                <strong>⚠️ Important:</strong> This password reset link is only valid for 60 minutes.
                                After
                                that, you will need to request a new one.
                            </div>
                            <hr>
                            <p style="margin-top: 30px;">Thanks,<br>The BuyFinite Team</p>
                        </td>
                    </tr>
                </table>
                <p style="font-size: 12px; color: #999; margin-top: 20px;">
                    If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into
                    your web browser:<br>
                    <a href="{{ route('recovery.password.url', $resetInfo['token']) }}"
                        style="color: #4f46e5;">{{ route('recovery.password.url', $resetInfo['token']) }}</a>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
