@include('layouts.header')
@include('layouts.navegation')
<div class="p-4 sm:ml-64">
    <div class="mx-auto justify-center items-center grid gap-6 m-3">
        <h1 class="text-lgl font-bold dark:text-white">Actividades eliminadas</h1>
        @if (count($activities) > 0)

            <div class="flex items-center justify-end mt-4">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="mr-2 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Opciones
                        <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownActionButton">
                            <li class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <a href="{{ route('users.deleteAll') }}">Eliminar todos</a>
                            </li>

                            <li class="block hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <button type="button" class="px-4 py-2">Restaurar todos</button>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="lg:static overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-[#ecfdf5] dark:bg-gray-700 dark:text-gray-400">
                        <tr style="text-align:center">
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cuerpo de la actividad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo de actividad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha de celebración
                            </th>
                            <th scope="col" class="px-6 py-3" colspan="2">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $activity->name }}
                                </th>
                                <td class="px-6 py-4 text-center">
                                    {{ $activity->activityBody->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $activity->activityType->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <a class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-full text-xs px-3 py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"
                                        href="{{ route('activities.restore', $activity->id) }}">RESTAURAR</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-xs px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                        href="{{ route('activities.deleting', $activity->id) }}"> ELIMINAR</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <span class="font-medium">No existen actividades eliminadas.</span>
            </div>
        @endif
    </div>
</div>

@include('layouts.footer')
