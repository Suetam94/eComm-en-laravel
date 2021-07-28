<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-comm Project</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="geral">
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}
</div>
</body>
<style>
    html, body {
        height: 100%;
    }

    .geral {
        position: relative;
        min-height: 100%;
    }

    .custom-login {
        height: 500px;
        padding-top: 100px;
    }

    img.slider-img {
        height: 400px !important;
    }

    .custom-product {
        height: 600px;
    }

    .slider-text {
        background-color: #35443585 !important;
    }

    .trending-image {
        height: 100px;
    }

    .trending-style {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .trending-wrapper {
        margin: 30px;
    }

    .panel {
        position: absolute;
        width: 100%;
        margin-top: 100vh;
    }

    .detail-image {
        height: 400px;
        text-align: left;
    }

    .search-box {
        width: 500px !important;
    }

    .custom-searched {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .searched-wrapper {
        margin: 30px;
    }

    .searched-image {
        height: 200px;
    }

    .cart-image {
        height: 250px;
    }

    .cart-item, .cart-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .cart-item {
        margin-bottom: 15px;
    }

    .cart-wrapper {
        display: flex;
        justify-content: center;
    }

    .cart-wrapper h2 {
        margin-bottom: 30px;
    }

    tfoot {
        border-top: 2px solid black;
        font-weight: bold;
    }

    a {
        text-decoration: unset;
        color: inherit;
    }

    a:hover {
        text-decoration: none;
    }
</style>
</html>
