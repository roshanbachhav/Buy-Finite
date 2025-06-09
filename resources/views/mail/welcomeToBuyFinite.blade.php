<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to BuyFinite</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
            }

            .logo {
                text-align: center !important;
            }

            .coupon {
                padding: 15px !important;
            }

            .cta-button {
                display: block !important;
                width: 100% !important;
                margin-bottom: 10px !important;
            }
        }
    </style>
</head>

<body
    style="
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
      background-color: #f8fafc;
      line-height: 1.6;
    ">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8fafc; padding: 40px 0">
        <tr>
            <td align="center">
                <table class="container" width="600" cellpadding="0" cellspacing="0"
                    style="
              background: #ffffff;
              border-radius: 12px;
              overflow: hidden;
              box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            ">
                    <tr>
                        <td
                            style="
                  padding: 30px;
                  text-align: center;
                  background: linear-gradient(135deg, #4f46e5, #7c3aed);
                ">
                            <table width="100%">
                                <tr>
                                    <td class="logo" style="text-align: left; width: 50%">
                                        <h1
                                            style="
                          color: #ffffff;
                          font-size: 24px;
                          font-weight: 700;
                          margin: 0;
                          letter-spacing: -0.5px;
                        ">
                                            BuyFinite
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                            <div
                                style="
                    margin: 20px auto;
                    width: 80px;
                    height: 80px;
                    background: rgba(255, 255, 255, 0.15);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                  ">
                                <span style="font-size: 40px">🙋‍♂️</span>
                            </div>
                            <h1
                                style="
                    color: #ffffff;
                    font-size: 28px;
                    font-weight: 700;
                    margin: 10px 0 0 0;
                    letter-spacing: -0.5px;
                  ">
                                Welcome to BuyFinite
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px">
                            <p style="font-size: 18px; color: #334155; margin: 0 0 25px 0">
                                Hi {{ $userData['user']->name }},
                            </p>
                            <p style="font-size: 16px; color: #475569; margin: 0 0 25px 0">
                                Thank you for joining BuyFinite! We're thrilled to have you as
                                part of our community.
                            </p>

                            <p style="font-size: 16px; color: #475569; margin: 0 0 10px 0">
                                To welcome you, we've created a special offer just for you:
                            </p>

                            <div class="coupon"
                                style="
                    margin: 30px 0;
                    padding: 25px;
                    background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
                    border: 1px solid #dbeafe;
                    border-radius: 12px;
                    text-align: center;
                    position: relative;
                    overflow: hidden;
                  ">
                                <div
                                    style="
                      position: absolute;
                      top: -20px;
                      right: -20px;
                      width: 60px;
                      height: 60px;
                      background: #4f46e5;
                      border-radius: 50%;
                      opacity: 0.1;
                    ">
                                </div>
                                <div
                                    style="
                      position: absolute;
                      bottom: -30px;
                      left: -30px;
                      width: 80px;
                      height: 80px;
                      background: #7c3aed;
                      border-radius: 50%;
                      opacity: 0.1;
                    ">
                                </div>

                                <p
                                    style="
                      font-size: 16px;
                      font-weight: 600;
                      color: #4f46e5;
                      margin: 0 0 15px 0;
                      text-transform: uppercase;
                      letter-spacing: 1px;
                    ">
                                    Exclusive Welcome Offer
                                </p>

                                <div
                                    style="
                      margin: 0 auto 15px;
                      width: fit-content;
                      background: #ffffff;
                      border-radius: 8px;
                      padding: 12px 20px;
                      border: 1px dashed #4f46e5;
                    ">
                                    <span
                                        style="
                        font-size: 26px;
                        font-weight: 700;
                        color: #4f46e5;
                        letter-spacing: 2px;
                      ">{{ $userData['coupon']->code }}</span>
                                </div>

                                <p
                                    style="
                      font-size: 18px;
                      font-weight: 600;
                      color: #1e293b;
                      margin: 0 0 8px 0;
                    ">
                                    {{ $userData['coupon']->value }}% OFF your first order
                                </p>
                                <p style="font-size: 14px; color: #64748b; margin: 0">
                                    Valid until
                                    {{ \Carbon\Carbon::parse($userData['coupon']->end_date)->format('M d, Y') }}
                                </p>
                            </div>

                            <p style="font-size: 16px; color: #475569; margin: 0 0 30px 0">
                                Use this coupon during checkout to enjoy your exclusive
                                discount.
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 0 0 30px 0">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('home') }}" class="cta-button"
                                            style="
                          display: inline-block;
                          background: linear-gradient(135deg, #4f46e5, #7c3aed);
                          color: white;
                          text-decoration: none;
                          padding: 14px 32px;
                          font-size: 16px;
                          font-weight: 600;
                          border-radius: 8px;
                          margin: 0 10px;
                          box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
                        ">
                                            Start Shopping
                                        </a>
                                        <a href="{{ route('productsPage') }}" class="cta-button"
                                            style="
                          display: inline-block;
                          background: #f1f5f9;
                          color: #4f46e5;
                          text-decoration: none;
                          padding: 14px 32px;
                          font-size: 16px;
                          font-weight: 600;
                          border-radius: 8px;
                          margin: 0 10px;
                          border: 1px solid #e2e8f0;
                        ">
                                            Browse Categories
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <!-- Features -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="
                    margin: 40px 0 0 0;
                    border-top: 1px solid #f1f5f9;
                    padding-top: 30px;
                  ">
                                <tr>
                                    <td style="text-align: center; padding: 0 10px">
                                        <div
                                            style="
                          width: 60px;
                          height: 60px;
                          background: #f0f9ff;
                          border-radius: 50%;
                          justify-content: center;
                          display: flex;
                          align-items: center;
                          margin: 0 auto 15px;
                        ">
                                            <span style="font-size: 24px; color: #4f46e5">🚚</span>
                                        </div>
                                        <p
                                            style="
                          font-size: 15px;
                          font-weight: 600;
                          color: #1e293b;
                          margin: 0 0 5px 0;
                        ">
                                            Fast Shipping
                                        </p>
                                        <p style="font-size: 14px; color: #64748b; margin: 0">
                                            Delivery in 7-10 days
                                        </p>
                                    </td>
                                    <td style="text-align: center; padding: 0 10px">
                                        <div
                                            style="
                          width: 60px;
                          height: 60px;
                          background: #f0f9ff;
                          border-radius: 50%;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          margin: 0 auto 15px;
                        ">
                                            <span style="font-size: 24px; color: #4f46e5">🔄</span>
                                        </div>
                                        <p
                                            style="
                          font-size: 15px;
                          font-weight: 600;
                          color: #1e293b;
                          margin: 0 0 5px 0;
                        ">
                                            Easy Returns
                                        </p>
                                        <p style="font-size: 14px; color: #64748b; margin: 0">
                                            30-day guarantee
                                        </p>
                                    </td>
                                    <td style="text-align: center; padding: 0 10px">
                                        <div
                                            style="
                          width: 60px;
                          height: 60px;
                          background: #f0f9ff;
                          border-radius: 50%;
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          margin: 0 auto 15px;
                        ">
                                            <span style="font-size: 24px; color: #4f46e5">🔒</span>
                                        </div>
                                        <p
                                            style="
                          font-size: 15px;
                          font-weight: 600;
                          color: #1e293b;
                          margin: 0 0 5px 0;
                        ">
                                            Secure Payment
                                        </p>
                                        <p style="font-size: 14px; color: #64748b; margin: 0">
                                            SSL encrypted
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <div
                                style="
                    margin-top: 40px;
                    padding-top: 30px;
                    border-top: 1px solid #f1f5f9;
                  ">
                                <p style="font-size: 16px; color: #475569; margin: 0 0 15px 0">
                                    Need assistance? Our support team is here to help.
                                </p>
                                <a href="{{ route('contact.us') }}"
                                    style="
                      display: inline-block;
                      color: #4f46e5;
                      text-decoration: none;
                      font-weight: 600;
                      font-size: 15px;
                    ">
                                    Contact Support →
                                </a>
                            </div>

                            <p
                                style="
                    margin-top: 40px;
                    font-size: 14px;
                    color: #94a3b8;
                    text-align: center;
                  ">
                                We're excited to serve you,<br />The BuyFinite Team
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td
                            style="
                  background-color: #f1f5f9;
                  padding: 25px;
                  text-align: center;
                  font-size: 13px;
                  color: #64748b;
                ">
                            <p style="margin: 0 0 10px 0">
                                © {{ date('Y') }} BuyFinite. All rights reserved.
                            </p>
                            <p style="margin: 0 0 10px 0">
                                <a href="{{ route('privacy.policy') }}"
                                    style="
                      color: #4f46e5;
                      text-decoration: none;
                      margin: 0 10px;
                    ">Privacy
                                    Policy</a>
                                |
                                <a href="{{ route('terms.condition') }}"
                                    style="
                      color: #4f46e5;
                      text-decoration: none;
                      margin: 0 10px;
                    ">Terms
                                    of Service</a>
                                |
                                <a href="{{ route('contact.us') }}"
                                    style="
                      color: #4f46e5;
                      text-decoration: none;
                      margin: 0 10px;
                    ">Contact
                                    Us</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
