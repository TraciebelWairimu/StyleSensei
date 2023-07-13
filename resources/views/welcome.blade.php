<!DOCTYPE html>
<html>
<head>
    <title>StyleSensei</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: white; 
            text-align: center; 
        }
        .container{
            padding:60px;
        }

        nav {
            background-color: #e6f7ff; 
            padding: 10px 0;
            text-align: right;
            
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black; /* Black links */
            transition: color 0.3s ease; /* Transition color change on hover */
        }

        nav ul li a:hover {
            color: green; /* Green links on hover */
        }

        .container {
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .sub-menu {
            display: none;
            position: absolute;
            background-color: #fff; 
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); 
            padding: 10px;
            min-width: 120px; 
            z-index: 1;
        }

        .has-submenu:hover .sub-menu {
            display: block;
        }
        .user-message {
            position: absolute;
            top: 20px;
            left: 10px;
            font-weight: bold;
            color: #555;
        }
        a {
            text-decoration: none; /* Remove underline */
            color: blue; /* Set link color to blue */
}

    </style>
</head>
<body>
    
    <nav class="flex justify-end p-6">
        <ul>
    @if (Route::has('login'))
        @auth
           <li> <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900">Home</a></li>
        @else
            <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a></li>

            @if (Route::has('register'))
               <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a></li>
            @endif
        @endauth
    @endif
    </ul>
</nav>
        <div class="container">
        @if (Route::has('login'))
        @auth
            <h1>Welcome!!</h1>
            <p>This website helps you manage your wardrobe, create outfits, and get style recommendations.</p>
            @else
            <h1>Welcome!!</h1>
            <p>This website helps you manage your wardrobe, create outfits, and get style recommendations.</p>
            <p>Get started by <a href="{{ route('login') }}">logging in</a> or <a href="{{ route('register') }}">creating an account</a>.</p>
            @endauth
          @endif
        </div>
    </div>
</body>
</html>


