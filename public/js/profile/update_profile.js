const inputDni = document.getElementById('dni');
const inputName = document.getElementById('name');


    if(inputName.value === '' || inputDni.value === '')
    {
        Swal.fire({
        title: '¡Por favor, complete todos los campos requeridos antes de continuar!',
        icon: 'info',
        confirmButtonText: 'Aceptar'
        })
    }


