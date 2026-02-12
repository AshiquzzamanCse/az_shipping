{{-- <!DOCTYPE html>
<html>

<head>
    <title>{{ $subjectText }}</title>
</head>

<body>
    <h3>{{ $subjectText }}</h3>
    <p>{!! $messageText !!}</p>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $subjectText }}</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9; padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#5a6e8b; padding:20px; text-align:center;">
                            <h2 style="color:#ffffff; margin:0; font-size:22px;">
                                {{ config('app.name') }}
                            </h2>
                        </td>
                    </tr>

                    <!-- Subject -->
                    <tr>
                        <td style="padding:30px 30px 10px 30px;">
                            <h3 style="margin:0; color:#333333; font-size:20px;">
                                {{ $subjectText }}
                            </h3>
                        </td>
                    </tr>

                    <!-- Message Body -->
                    <tr>
                        <td style="padding:10px 30px 30px 30px; color:#555555; font-size:15px; line-height:1.7;">
                            {!! $messageText !!}
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 30px;">
                            <hr style="border:none; border-top:1px solid #eeeeee;">
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px 30px; text-align:center; font-size:13px; color:#999999;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                            <br>
                            This is an automated message. Please do not reply.
                        </td>
                    </tr>

                </table>
                <!-- End Main Container -->

            </td>
        </tr>
    </table>

</body>

</html>
