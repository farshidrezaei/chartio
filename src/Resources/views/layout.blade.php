<!doctype html>
<html dir="{{$rtl?'rtl':'ltr'}}" lang="fa">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title>Chart</title>
    @include('chartio::styles')
</head>
<body>

<div class="main">

    <table cellpadding="0px" cellspacing="0px" border="1px" align="center">

        <tbody>
        <tr>
            <td>
                <div class="content">
                    @yield('chart')
                </div>
            </td>
        </tr>

        </tbody>

    </table>

</div>

@include('chartio::scripts')
</body>
</html>
