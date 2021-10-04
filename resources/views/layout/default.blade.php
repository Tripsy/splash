<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<title>Splash</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <style>
        body {
            color: #4d4d4d;
            font-size: 1rem;
        }
        header {
            margin: 12px 0;
        }
        header .header_label {
            text-transform: uppercase;
            font-weight: bold;
            color: #038fce;
            font-size: 2rem;
        }
        header .header_txt {
            font-style: italic;
        }
        header .header_menu {
            margin-top: 12px;
            text-align: right;
        }
        footer {
            margin: 48px 0 24px 0;
            text-align: center;
        }
        h1 {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
<header class="container">
    <div class="header_label">
        Splash
    </div>
    <div class="header_txt">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </div>
    <div class="header_menu">
        <a href="{{ route('commercial.index') }}" title="List ads">List ads</a> /
        <a href="{{ route('commercial.create') }}" title="Add commercial ad">Create ad</a> /
        <a href="{{ route('category.index') }}" title="List categories">Categories</a> /
        <a href="{{ route('category.create') }}" title="Add category">Create category</a>
    </div>
</header>
<main class="container">
    @yield('content')
</main>
<footer>
    Copyright © <script type="text/javascript">document.write(new Date().getFullYear());</script> All rights reserved
</footer>
</body>
</html>