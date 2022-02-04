<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="grid grid-cols-6">
            <div class="col-span-1">
    
 
            <main class="flex justify-center items-center p-4 h-screen w-full bg-gradient-to-r from-green-100 to-blue-100">
  <div class="bg-white w-full sm:w-1/2 lg:w-96 border border-gray-200 divide-y divide-gray-200">
    <details>
      <summary class=" py-3 px-4 cursor-pointer select-none w-full outline-none">How is this made?</summary>
      <p class="pt-1 pb-3 px-4">With the HTML5 <code class="text-sm text-red-500">details</code> element and some Tailwind for showcase.</pre>
    </details>
    <details>
      <summary class=" py-3 px-4 cursor-pointer select-none w-full">Can I use it?</summary>
      <p class="pt-1 pb-3 px-4">Of course. It's yours to use wherever and whenever you like.</p>
    </details>
  </div>
</main>

            
            </div>
            <div class="col-span-5 border">
                
            <div class="min-h-screen bg-gray-100">
                    @livewire('navigation-menu')

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
            </div>
        </div>


        @stack('modals')

        @livewireScripts
    </body>
</html>
