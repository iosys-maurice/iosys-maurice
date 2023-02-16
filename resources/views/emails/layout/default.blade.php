<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
    <style>
        a {text-decoration:none;}
        a:hover {text-decoration:underline;}
        .afooter {color:#0044cc !important;}
        table td {border-collapse:collapse;margin:0;padding:0;}
        .button {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 12px;
            font-size: 16px;
        }
        .headimg {
            font-size: 24px;
        }
        .headby {
            font-size: 8px;
            color:red;
        }

    </style>
</head>
<body>

    <table width="800" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td width="800" align="right" valign="middle" style="padding-right:20px;color:#3d3d3d; font-family:'Segoe UI',Arial,sans-serif; font-size:12px; font-weight:bold;">
                <p>
        Contact Request
    </p>
            </td>
        </tr>
    </table>
    <table width="800" cellpadding="0" cellspacing="0" align="center">
        <tr>
             <td width="20" valign="middle" style="color:#000000; font-family:'Segoe UI',Arial,sans-serif; font-size:12px; font-weight:bold;">
                &nbsp;
             </td>
             <td width="800" valign="middle" style="color:#000000; font-family:'Segoe UI',Arial,sans-serif; font-size:12px; font-weight:bold;">
                <img style='vertical-align:middle;'
                src="https://iosys.com.jm/img/logo.png" width="38" height="44">
                <div style="vertical-align:bottom; display:inline;" class="headimg">
                    Token Generator
                    <span class="headby">by I.O. Systems Limited</span>
                </div>
                <h1 style="color:#000; font-family:'Segoe UI Light','Segoe UI',Arial,sans-serif; font-size:38px; font-weight:100; line-height:15px;">
                    @yield('title')
                </h1>
             </td>
             <td width="20" valign="middle" style="color:#000000; font-family:'Segoe UI',Arial,sans-serif; font-size:12px; font-weight:bold;">
                &nbsp;
             </td>
        </tr>
    </table>
    <table width="800" cellpadding="0" cellspacing="0" align="center">
        <tr align='left'>
            <td colspan="3" width="100%" align="left" valign="top" style="">
                <hr width="100%">
            </td>
        <tr>
            <td width="20">&nbsp;</td>
            <td width="760" align="left" valign="top" style="font-family:'Segoe UI',Arial,sans-serif; font-size:13px; line-height:16px; padding-top:5px;">
                <p>
                    <strong>@yield('name')</strong>,<br>
                </p><!-- END AMPSCRIPT -->
                <p>
                        @yield('body')
                </p>
                <p>
                    Thank you,<br>
                    from Your Team
                </p>
            </td>
            <td width="20">&nbsp;</td>
        </tr>
    </table>

</body>
</html>
    
    


