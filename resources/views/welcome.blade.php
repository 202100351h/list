<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="/node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <!-- Livewire Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="leading-normal tracking-normal text-gray-900" style="font-family: 'Source Sans Pro', sans-serif;"> 
    <!-- Navigation -->
    <div class="w-full container mx-auto p-6">
        <div class="flex items-center justify-between">
            <!-- Reemplazado con nuevo código -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <!-- Tailwind CSS CDN link -->
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            </head>
            <body>
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <div class="p-6 hover:bg-green-600 hover:text-white transition duration-300 ease-in">
                        <h1 class="text-2xl font-semibold mb-3">ToDoList</h1>
                    </div>
                </div>
            </body>
            </html>

            <div class="flex justify-end content-center text-green-600">
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif 
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-center">
        <!-- Left Col - Text -->
        <div class="w-full md:w-1/2 text-center md:text-left md:pr-12">
            <h1 class="my-4 text-3xl md:text-5xl text-green-800 font-bold leading-tight animate-fadeIn">¡HOLA BUENAS! Aquí está tu aplicación de tareas simple para una gestión fácil de tareas</h1>
            <p class="leading-normal text-base md:text-2xl mb-8 animate-fadeIn">Una forma moderna de gestionar tus tareas diarias de manera fácil y sencilla.</p>
        </div>
        <!-- Right Col - Image -->
        <div class="w-full md:w-1/2">
            <img class="w-1/1 mx-auto md:mx-0 hover:scale-110 transition-transform duration-300" src="https://cdn.pixabay.com/photo/2022/05/22/17/22/to-do-7214069_960_720.png" alt="Tablero con lápiz">
        </div>
    </div>
    <!-- Footer -->
    <div class="w-full pt-16 pb-6 text-sm text-center">
        <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; Todo List 2024</a>
    </div>
    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
