@include('layouts.header')
    @include('layouts.navegation')
    <div class="p-4 sm:ml-64">
        <h1 class="text-3xl font-bold dark:text-white">Perfil</h1>
            <div class="py-12">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg">
                        <h5 class="m-3 text-xl font-bold dark:text-white">Información del perfil</h5>
                            <h6 class="m-2 text-lg font-light dark:text-white">Actualice la información de perfil.</h6>
                            <div class="mx-auto">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                    </div>
                </div>

            </div>
    </div>
@include('layouts.footer')
