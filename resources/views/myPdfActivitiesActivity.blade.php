<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor Eventos</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
</style>

<body>
    <div>
        <div>
            <div>
                <h1>Gestor de eventos</h1>
            </div>
            <ul>
                <li>
                    Listado de profesores de la actividad
                    {{ $activity->name }}
                </li>
                <li>
                    Fecha de celebración
                    {{ $activity->date_of_celebration }}
                </li>
            </ul>


            @if (count($teachers) <= 0)
                <span>No se han econtrado profesores asistentes a esta actividad.</span>
            @else
                <div>
                    <table style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Profesor
                                </th>
                                <th scope="col">
                                    Nivel de enseñanza
                                </th>
                                <th scope="col">
                                    Confirmación de asistencia
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr class="">
                                    <td>
                                        {{ $teacher->user->userProfile->name .
                                            ' ' .
                                            $teacher->user->userProfile->surname_first .
                                            ' ' .
                                            $teacher->user->userProfile->surname_second }}
                                    </td>
                                    <td>
                                        {{ $teacher->activityBody->name }}
                                    </td>
                                    <td>
                                        {{ $activity->teachers()->where('teacher_id', $teacher->id)->first()->pivot->confirmed_assistance? 'Confirmada': 'Sin confirmar' }}
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
