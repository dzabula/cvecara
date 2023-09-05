<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield("description")">
    <meta name="keyword" content="@yield("keyword")">
    <meta name="author" content="Marko">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield("title")</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="{{asset("asset/image/x-icon")}}">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset("asset/img/apple-touch-icon-57x57-precomposed.png")}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset("asset/img/apple-touch-icon-72x72-precomposed.png")}}"/>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset("asset/img/apple-touch-icon-114x114-precomposed.png")}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset("asset/img/apple-touch-icon-144x144-precomposed.png")}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset("asset/css/bootstrap.custom.min.css")}}" rel="stylesheet">
    <link href="{{asset("asset/css/style.css")}}" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="{{asset("asset/css/home_1.css")}}" rel="stylesheet">

    @yield("aditional_head")
    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset("asset/css/custom.css")}}" rel="stylesheet">

</head>

<body>
<div id="page">

@include("fixed.headers.nav")

@yield("content")

@include("fixed.footer.footer")

<!--/footer-->
</div>
<!-- page -->

<div id="toTop"></div><!-- Back to top button -->

@yield("snackbar")

@include("fixed.script")

@yield("aditionalScripts")
</body>
</html>
