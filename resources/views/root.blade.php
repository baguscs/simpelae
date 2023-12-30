<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

         <!-- PWA  -->
        <meta name="theme-color" content="#696cff"/>
        <link rel="manifest" href="{{ asset('/manifest.json') }}">

         <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite([
            "resources/assets/vendor/fonts/boxicons.css",
            "resources/assets/vendor/css/core.css",
            "resources/assets/vendor/css/theme-default.css",
            "resources/assets/css/demo.css",
            "resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css",
            "resources/assets/vendor/css/pages/page-auth.css",
            'resources/js/app.js',
        ])

        <!-- Helpers -->
        <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
        <script src="{{ asset('assets/js/config.js') }}"></script>

        @seoDescription('Aplikasi yang membantu warga dalam membuat surat keterangan desa Sawo Bringin, Sambikerep, Surabaya')
        @seoKeywords('Simpelae, Splade, PWA')

        @spladeHead
    </head>
    <body class="font-sans antialiased">
        @splade
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite([
      "resources/assets/vendor/libs/jquery/jquery.js",
      "resources/assets/vendor/libs/popper/popper.js",
      "resources/assets/vendor/js/bootstrap.js",
      "resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js",
      "resources/assets/vendor/js/menu.js",
      "resources/assets/js/main.js",
    //   "resources/assets/vendor/libs/apex-charts/apexcharts.js",
    //   "resources/assets/js/dashboards-analytics.js",
      "public/sw.js"
    ])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    {{-- PWA --}}
    @stack('js')
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

</html>
