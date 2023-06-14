const email = document.getElementById('email').addEventListener('change', validation);
const emailError = document.getElementById('error').addEventListener('change', validationError);
const regexEmail = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/;

function validation(event)
{
    if(!regexEmail.test(event.target.value))
    {
        event.target.parentElement.style.display = 'none';
        event.target.parentElement.nextElementSibling.style.display = 'block';
        event.target.parentElement.nextElementSibling.children[1].value = event.target.value;
        document.getElementById('submit').setAttribute('disabled',true);
    }
}

function validationError(event)
{

    if(regexEmail.test(event.target.value))
    {
        event.target.parentElement.style.display = 'none';
        event.target.parentElement.previousElementSibling.style.display = 'block';
        event.target.parentElement.previousElementSibling.children[1].value = event.target.value;
        document.getElementById('submit').removeAttribute('disabled');
    }

}


