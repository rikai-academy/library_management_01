<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        min-width: 100%;
        width: 100% !important;
        height: 100% !important;
    }

    body,
    table,
    td,
    div,
    p,
    a {
        -webkit-font-smoothing: antialiased;
        text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        line-height: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        border-collapse: collapse !important;
        border-spacing: 0;
    }

    img {
        border: 0;
        line-height: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
    }

    #outlook a {
        padding: 0;
    }

    .ReadMsgBody {
        width: 100%;
    }

    .ExternalClass {
        width: 100%;
    }

    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
        line-height: 100%;
    }

    /* Rounded corners for advanced mail clients only */

    @media all and (min-width: 560px) {
        .container {
            border-radius: 8px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -khtml-border-radius: 8px;
        }
    }

    a,
    a:hover {
        color: #127DB3;
    }

    .footer a,
    .footer a:hover {
        color: #999999;
    }

</style>

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
        background-color: #F0F0F0;
        color: #000000;" bgcolor="#F0F0F0" text="#000000">

    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
                bgcolor="#F0F0F0">
                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
        max-width: 560px;" class="container">
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                padding-top: 25px;
                color: #000000;
                font-family: sans-serif;" class="header">
                            {{ __('message.title_notification') }}
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
                                padding-top: 5px;
                                color: #000000;
                                font-family: sans-serif;" class="subheader">
                            {{ __('message.dear') }} {{ $name }} : {{ __('message.thank2') }}
                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 20px;" class="hero">

                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                padding-top: 25px; 
                                color: #000000;
                                font-family: sans-serif;" class="paragraph">
                            {{ $title }}
                            <br>
                            <span style="color: red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                padding-top: 25px;
                padding-bottom: 5px;" class="button">

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
        padding-top: 25px;" class="line">
                            <hr color="#E0E0E0" align="center" width="100%" size="1" noshade
                                style="margin: 0; padding: 0;" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%;"
                            class="list-item">
                            <table align="center" border="0" cellspacing="0" cellpadding="0"
                                style="width: inherit; margin: 0; padding: 0; border-collapse: collapse; border-spacing: 0;">
                                <!-- LIST ITEM -->
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" style="margin: 5px 0px 0px 251px;">
                                <tr>
                                    <td style="border-radius: 2px;" bgcolor="#ED2939">
                                        <a href="{{route('homepage.show',$book_id)}}" target="_blank"
                                            style="padding: 8px 12px; border: 1px solid #ED2939;border-radius: 2px;font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;text-decoration: none;font-weight:bold;display: inline-block;">
                                           {{__('message.go_to')}}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                padding-top: 25px;" class="line">
                <hr color="#E0E0E0" align="center" width="100%" size="1" noshade style="margin: 0; padding: 0;" />
            </td>
        </tr>
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                padding-top: 20px;
                                padding-bottom: 25px;
                                color: #000000;
                                font-family: sans-serif;" class="paragraph">
                {{ __('message.quest') }} <a href="#" target="_blank"
                    style="color: #127DB3; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 160%;">{{ __('message.gmail') }}</a>
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>

</body>

</html>
