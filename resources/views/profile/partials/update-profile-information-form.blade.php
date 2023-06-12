<section>

    <form id="updateProfile" method="POST" action="{{ route('profile.update', $userProfile->id) }}"
        enctype="multipart/form-data">

        @csrf
        @method('patch')

        <div class="grid gap-6 m-3 md:grid-cols-3">
            <div class="mr-auto ml-auto mt-4">

                @if ($image != null)
                    <input type="file" id="input-file-now-custom-1" name="image" class="dropify"
                        data-default-file="{{ $image->getUrl() }}" />
                @else
                    <input type="file" id="input-file-now" name="image" class="dropify" />
                @endif

                <p>Correo electrónico: <strong>{{ Auth::user()->email }}</strong></p>
            </div>

            <div>
                <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dni</label>
                <input type="dni" id="dni" name="dni"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ Auth::user()->dni }}">

                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                    electrónico</label>
                <input type="email" id="email" name="email"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ Auth::user()->email }}">

                <label for="surname_first" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer
                    apellido</label>
                <input type="text" id="surname_first" name="surname_first"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $userProfile->surname_first }}" required>

                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enseñanza
                    impartida</label>
                <select id="bodyActivity" name="bodyTeacher"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($bodyActivities as $bodyActivity)
                        <option value="{{ $bodyActivity->id }}">{{ $bodyActivity->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>

                <label for="name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="name" name="name"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $userProfile->name }}" required>

                <label for="surname_second" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo
                    apellido</label>
                <input type="text" id="surname_second" name="surname_second"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $userProfile->surname_second }}">

                <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de
                    nacimiento</label>
                <input type="date" id="birthdate" name="birthdate"
                    class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ date('Y-m-d', strtotime($userProfile->birthdate)) }}" required>

            </div>



        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="text-white bg-[#4263b8] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2">Guardar</button>
            <a class="focus:outline-none text-white bg-[#ce5858] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:focus:ring-red-900"
                href="{{ route('dashboard') }}">Cancelar</a>
        </div>
    </form>

    @section('js')
        <script src="{{ asset('js/profile/update_profile.js') }}"></script>
    </section>
