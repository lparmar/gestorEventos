<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Session::get('tittle') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="ml-20 mt-4">
        <img src="images/logo.png" alt="  Logo" />
    </div>

    <div class="w-full max-w-lg m-auto p-4 bg-white sm:p-6 md:p-4 dark:bg-gray-800">
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <ul class="pl-4 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <h3 class="text-3xl font-bold dark:text-[#013500]">Regístrate</h3>
            <div class="text-md font-medium text-[#013500] dark:text-gray-300">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}"
                    class="text-[#27CE4C] underline dark:text-blue-500"><strong>Inicia sesión</strong></a>
            </div>
            <div style="display:block;">
                <label for="email" class="block mb-1 text-md font-medium text-gray-900 dark:text-[#013500]">Correo
                    electrónico</label>
                <input type="email" name="email" id="email"
                    class="bg-[#F5F5F5] border border-[#D9D9D9] text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>
            <div style="display:none;">
                <label for="error" class="block mb-1 text-md font-medium text-red-700 dark:text-red-500">Correo
                    electrónico</label>
                <input type="email" name="error" id="error"
                    class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-md rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500">
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Por favor, ingresa un
                        correo electrónico válido de Gmail o Hotmail.</p>
            </div>

            <div>
                <label for="password" class="block mb-1 text-md font-medium text-gray-900 dark:text-white">Crear una
                    contraseña</label>
                <input type="password" name="password" id="password"
                    class="bg-[#F5F5F5] border border-[#D9D9D9] text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
                <label class="text-sm text-[#645C5C] dark:text-blue-500">La contraseña debe contener al menos 8
                    caracteres.</label>
            </div>


            <div>
                <label for="password_confirmation"
                    class="block mb-1 text-md font-medium text-gray-900 dark:text-white">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="bg-[#F5F5F5] border border-[#D9D9D9] text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>

            <button id="submit" type="submit"
                class="w-full text-[#013500] bg-[#6CF88B] hover:bg-[#32DB57] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-lg px-5 py-2.5 text-center dark:bg-[#32DB57] dark:hover:bg-[#32DB57] dark:focus:ring-[#32DB57]">Crear
                cuenta</button>

        </form>
    </div>

</body>
@section('js')
    <script src="{{ asset('js/register/register_validation.js') }}"></script>

    </html>
