const inputDni = document.getElementById('dni');
inputDni.addEventListener('change',validationDni);

const inputDniError = document.getElementById('error');
inputDniError.addEventListener('change',validationDniError);

const inputName = document.getElementById('name');
const regexDni = /^(\d{8})([A-Z])$/i;

    if(inputName.value === '' || inputDni.value === '')
    {
        Swal.fire({
        title: '¡Por favor, complete todos los campos requeridos antes de continuar!',
        icon: 'info',
        confirmButtonText: 'Aceptar'
        })
    }

function validationDni(event)
{
    if (!regexDni.test(event.target.value)) {
        event.target.nextElementSibling.style.display = 'block';
        event.target.style.display = 'none';
        event.target.nextElementSibling.value=event.target.value;
        document.getElementById('submit').setAttribute('disabled',true);
    }
}

function validationDniError(event)
{
    if (regexDni.test(event.target.value)) {
        event.target.style.display = 'none';
        event.target.previousElementSibling.style.display = 'block';
        event.target.previousElementSibling.value= event.target.value;
        document.getElementById('submit').removeAttribute('disabled');
    }
}


