const bodyActivity = document.getElementById('body_activity');

if (bodyActivity.value === '') {
        Swal.fire({
        title: 'Por favor, complete toda su información para poder ver las actividades disponibles.',
        icon: 'info',
        confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "http://gestoreventos.test/profile";
            }
        })
}
