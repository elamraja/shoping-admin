<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SVI - Authentication</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
    {{ HTML::style('sadmin/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('sadmin/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('sadmin/css/main.css') }}
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <h2>SVI Shopping</h2>
            </div>
            <div class="menu">
                <ul>
                    <li class="{{ Request::is('/') ? 'active':'' }}"><a href="{{ URL::to('/') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li class="{{ Request::is('products') || Request::is('products/*') ? 'active': '' }}"><a href="{{ URL::to('/products') }}"><i class="fa fa-product-hunt"></i> Products</a></li>
                    <li class="{{ Request::is('orders') || Request::is('orders/*') ? 'active': '' }}"><a href="{{ URL::to('/orders') }}"><i class="fa fa-first-order"></i> Orders</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="header">
                <ul>
                    <li><a href="#">{{ Auth::guard('user')->user()->name }}</a></li>
                    <li><a href="{{ URL::to('/signout') }}"><i class="fa fa-power-off"></i></a></li>
                </ul>
            </div>
            <div class="main_content">
                @yield('main-content')
            </div>
        </div>
    </div>
</body>
</html>
