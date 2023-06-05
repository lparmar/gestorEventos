@include('layouts.header')
@include('layouts.navegation')
<div class="p-4 sm:ml-64">
    <h1 class="text-3xl font-bold dark:text-white">Perfil usuario</h1>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h5 class="m-3 text-xl font-bold dark:text-white">Información del perfil</h5>
            <div class="grid gap-6 m-3 md:grid-cols-2">
                <div class="m-auto">
                    @if ($user->userProfile->getMedia('users_avatar')->first() == null)
                        <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    @else
                        <img class="rounded-full w-60 h-60"
                            src="{{ $user->userProfile->getMedia('users_avatar')->first()->getUrl() }}"
                            alt="Bonnie image" />
                    @endif
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Nombre
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->userProfile->name }}
                                </td>

                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apellidos
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->userProfile->surname_first }} {{ $user->userProfile->surname_second }}
                                </td>

                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Fecha de nacimiento
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->userProfile->birthdate }}
                                </td>

                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Tipo de usuario
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->roles()->first()->name }}
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end mt-12">
                <a class="focus:outline-none text-white bg-[#ce5858] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:focus:ring-red-900"
                    href="{{ route('dashboard') }}">Volver</a>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
