<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .wardrobe-container {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: flex-start;
            }

            .wardrobe-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 200px;
            }

            .item-image {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border: 1px solid #ddd;
                border-radius: 4px;
            }

            .item-name {
                margin-top: 10px;
            }

            .item-description {
                margin-top: 5px;
            }

            #drop-area {
                width: 200px;
                height: 200px;
                border: 2px dashed #ccc;
                border-radius: 4px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }

            .upload-label {
                margin-bottom: 10px;
            }

            #drop-area.drag-over {
                background-color: #f2f2f2;
            }

            #image-input {
                display: none;
            }

            #upload-button {
                margin-top: 10px;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
    <div class="container">
            @yield('content')
        </div>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
