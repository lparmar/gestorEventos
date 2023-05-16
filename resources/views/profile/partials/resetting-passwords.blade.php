<section>

    <form id="resettingPassword" method="POST" action="{{ route('profile.resettingPasswords',$userProfile->id) }}" >

        @csrf

        <div class="grid gap-6 m-3 md:grid-cols-1">

            <div>

                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña actual</label>
                <input type="password" id="current_password" name="current_password" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva contraseña</label>
                <input type="password" id="password" name="password" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

            </div>



        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white bg-[#4263b8] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2">Guardar</button>
        </div>
    </form>

</section>
