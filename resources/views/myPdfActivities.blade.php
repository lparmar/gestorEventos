<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor Eventos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('flowbite . css') }}">
</head>

<body>
    <div class="p-4 sm:ml-64">
        <div class="mx-auto justify-center items-center grid gap-6 m-3">
            <div class="flex items-center justify-between">

                <h1 class="font-bold dark:text-white">Gestor de eventos</h1>
            </div>
            <ul
                class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
                <li
                    class="mr-2 inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">
                    Listado de actividades
                </li>
            </ul>


            @if (count($activities) <= 0)
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                    <span class="font-medium">No se han econtrado actividades en la base de datos.</span>
                </div>
            @else
                <div class="lg:static overflow-x-auto shadow-md sm:rounded-lg ">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-[#ecfdf5] dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cuerpo de la actividad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha de celebración
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo de actividad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Lugar de celebración
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{ $activity->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $activity->body_activity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $activity->date_of_celebration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $activity->activity_types }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $activity->place_of_celebration }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</body>

</html>
