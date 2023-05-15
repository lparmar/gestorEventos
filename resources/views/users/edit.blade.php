@include('layouts.header')
    @include('layouts.navegation')
        <div class="p-4 sm:ml-64">
            <h1 class="text-3xl font-bold dark:text-white">Perfil usuario</h1>
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                                <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <div class="ml-3 text-sm font-medium">
                                    <li>{{ $error }}</li>
                                </div>
                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                            </div>
                        @endforeach
                    @endif
                <form id="formUpdate" method="POST" action="{{ route('users.update',$userProfile) }}" enctype="multipart/form-data" >

                    @csrf
                    @method('patch')
                <div class="max-w-md m-auto p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10">
                            <input type="file" id="input-file-now" name="image" class="dropify"/>
                        <h5 class="mb-1 mt-3 text-xl font-light dark:text-white">Correo electrónico: <strong>{{$user->email}}</strong></h5>
                    </div>

                </div>




                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-6">
                    <h5 class="mb-6 text-xl font-bold dark:text-white">Información del perfil</h5>
                    <div class="mx-auto">

                            <div class="grid gap-6 mb-6 md:grid-cols-2">

                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo electrónico</label>
                                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$user->email}}">
                                </div>

                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$userProfile->name}}">
                                </div>

                                <div>
                                    <label for="surname_first" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer apellido</label>
                                    <input type="text" id="surname_first" name="surname_first" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$userProfile->surname_first}}">
                                </div>

                                <div>
                                    <label for="surname_second" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo apellido</label>
                                    <input type="text" id="surname_second" name="surname_second" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$userProfile->surname_second}}">
                                </div>

                                <div>
                                    <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                                    <input type="date" id="birthdate" name="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{date('Y-m-d', strtotime($userProfile->birthdate))}}" required>
                                </div>

                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2">Guardar</button>
                                <a class="focus:outline-none text-white bg-[#e75353] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" href="{{ route('users.index') }}">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h5 class="mb-6 text-xl font-bold dark:text-white">Actualizar contraseña</h5>
                    <div class="mx-auto">
                        <form id="formUpdate" method="POST" action="{{ route('users.update',$userProfile) }}">

                            @csrf
                            @method('patch')
                            <div class="grid gap-6 mb-6 md:grid-cols-1">

                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva contraseña</label>
                                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>

                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar contraseña</label>
                                    <input type="password" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>

                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@include('layouts.footer')
