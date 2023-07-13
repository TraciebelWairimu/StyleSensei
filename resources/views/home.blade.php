<!DOCTYPE html>
<html>
<head>
    <title>StyleSensei</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: white; /* Baby blue background */
            text-align: center; /* Centered text */
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
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="has-submenu">
                <a href="#" class="submenu-toggle">Wardrobe</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('wardrobe.create') }}">Create</a></li>
                    <li><a href="{{ route('wardrobe.index') }}">My Items</a></li>
                </ul>
            </li>
            <li><a href="">Outfit</a></li>
            <li><a href="#">Account</a></li>
            <li>
             <form method="POST" action="{{ route('logout') }}">
               @csrf
             <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
             </a>
            </form>
            </li>

            <li><div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            </div></li>
            <div class="user-message">
                    {{ __("You're logged in!") }}
                </div>
        </ul>

    </nav>

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth

                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container">
            <h1>Welcome once again!!</h1>
            <p>This website helps you manage your wardrobe, create outfits, and come up with outfits.</p>
        </div>
    </div>
</body>
</html>
