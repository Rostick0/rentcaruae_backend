<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <style>
        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
            line-height: 100%;
        }

        [style*="Arial"] {
            font-family: Arial, sans-serif !important;
        }

        table td {
            border-collapse: collapse;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
    </style>
</head>

<body width="100%" style="margin:0;padding:0">
    <div style="font-size:0px;font-color:#ffffff;opacity:0;visibility:hidden;width:0;height:0;display:none;">
        @yield('title')
    </div>
    <table cellpadding="0" cellspacing="0" style="font-family:Arial,Helvetica,sans-serif;width:100%">
        <tr>
            <td style="padding:0 0 154px 0">
                <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr align="center">
                        <td style="padding:16px 0 90px 0">
                            <img src="{{ url('images/mail/RentCarUAE.png') }}" alt="RentCarUAE" width="171px"
                                height="33px" />
                        </td>
                    </tr>
                    @yield('content')
                </table>
            </td>
        </tr>

        <tr>
            <td style="background:#616161;padding:20px 20px 4px 20px">
                <table cellpadding="0" cellspacing="0" style="width:100%">
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" style="color:#ffffff;width:100%">
                                <tr>
                                    <td style="font-size:1.75em;font-weight:700;letter-spacing:0.05em">
                                        RentCarUAE
                                    </td>
                                    <td align="right" style="text-align:right;white-space:nowrap;">
                                        <a href="" align="right"
                                            style="background:#009639;color:#ffffff;border-radius:8px;display:inline-block;font-size:0.875em;letter-spacing:0.02em;text-decoration:none;padding:14px 26px 14px 26px">
                                            Sell your car FREE
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 0 48px 0">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 0 16px 0 0">
                                        <a href="">
                                            <img src="{{ url('images/mail/facebook.png') }}" alt="facebook"
                                                width="20px" height="20px" />
                                        </a>
                                    </td>
                                    <td style="padding: 0 16px 0 0">
                                        <a href="">
                                            <img src="{{ url('images/mail/telegram.png') }}" alt="telegram"
                                                width="23px" height="20px" />
                                        </a>
                                    </td>
                                    <td style="padding: 0 16px 0 0">
                                        <a href="">
                                            <img src="{{ url('images/mail/whatsapp.png') }}" alt="whatsapp"
                                                width="20px" height="20px" />
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="{{ url('images/mail/instagram.png') }}" alt="instagram"
                                                width="20px" height="20px" />
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:0.875em;">
                            <span style="color:#d3d3d3;display:inline-block;padding:0 16px 4px 0">
                                © RentCarUAE 2024
                            </span>
                            <a href="" style="color:#d3d3d3;display:inline-block;padding:0 8px 4px 0">
                                Privacy policy</a>
                            <a href="" style="color:#d3d3d3;display:inline-block;padding:0 8px 4px 0">
                                Terms of use
                            </a>
                            <a href="" style="color:#d3d3d3;display:inline-block;padding:0 0 4px 0">
                                Unsubscribe
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</body>

</html>
