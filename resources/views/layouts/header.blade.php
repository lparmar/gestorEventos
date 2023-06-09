<section>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ Session::get('tittle') }}</title>
        <link rel="stylesheet" href="{{ asset('dist/css/dropify.min.css') }}">
        <script src="{{ asset('js/sweetalert2/dist/sweetalert2.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.css') }}">
    </head>

    <body class="relative bg-[#fafaf9]">

</section>
