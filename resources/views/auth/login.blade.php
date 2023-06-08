<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="ml-20 mt-4">
        <img src="images/logo.png" class="h-400" alt="  Logo" />
    </div>

    <div class="w-full max-w-lg m-auto p-4 bg-white sm:p-6 md:p-8 dark:bg-gray-800">
        <form class="space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="text-3xl font-bold dark:text-[#013500]">Inicia sesión en tu cuenta</h3>
            <div class="text-md font-medium text-[#013500] dark:text-gray-300">
                ¿Aún no tienes cuenta? <a href="{{ route('register') }}"
                    class="text-[#27CE4C] underline dark:text-blue-500"><strong>Regístrate</strong></a>
            </div>
            <div>
                <label for="email" class="block mb-2 text-md font-medium text-gray-900 dark:text-[#013500]">Correo
                    electrónico</label>
                <input type="email" name="email" id="email"
                    class="bg-[#F5F5F5] border border-[#D9D9D9] text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>
            <div>
                <label for="password"
                    class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Contraseña</label>
                <input type="password" name="password" id="password"
                    class="bg-[#F5F5F5] border border-[#D9D9D9] text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required>
            </div>

            <button type="submit"
                class="w-full text-[#013500] bg-[#6CF88B] hover:bg-[#32DB57] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-lg px-5 py-2.5 text-center dark:bg-[#32DB57] dark:hover:bg-[#32DB57] dark:focus:ring-[#32DB57]">Iniciar
                sesión</button>
            <div class="flex items-start">
                <a href="#" class="text-md text-[#27CE4C] underline dark:text-blue-500">¿Has olvidado tu
                    contraseña?</a>
            </div>
        </form>
    </div>
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
</body>

</html>
