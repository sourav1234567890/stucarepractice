<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="author" content="">
<title>new page</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('/public/css/bootstrap.min.css') }}" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="{{ asset('/public/css/custom.css') }}" rel="stylesheet">
<!-- Custom CSS -->
</head>
<body>
<header class="header-block"> 
</div>
</header>
@yield('content')
<footer class="footer">
</footer>

<!-- jQuery --> 


<script src="{{ asset('/public/js/jquery.min.js') }}"></script>
<script src="{{ asset('/public/js/bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('/public/js/custom.js') }}"></script>


</body>
</html>
