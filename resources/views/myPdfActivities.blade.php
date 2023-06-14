<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor Eventos</title>
</head>

<body>
    <div>
        <div>
            <div>
                <h1>Gestor de eventos</h1>
            </div>
            <ul>
                <li>
                    Listado de actividades
                </li>
            </ul>


            @if (count($activities) <= 0)
                <span>No se han econtrado actividades en la base de datos.</span>
            @else
                <div>
                    <table style="border: 1px">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Nombre
                                </th>
                                <th scope="col">
                                    Cuerpo de la actividad
                                </th>
                                <th scope="col">
                                    Fecha de celebración
                                </th>
                                <th scope="col">
                                    Tipo de actividad
                                </th>
                                <th scope="col">
                                    Lugar de celebración
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr class="">
                                    <td>
                                        {{ $activity->name }}
                                    </td>
                                    <td>
                                        {{ $activity->activityBody->name }}
                                    </td>
                                    <td>
                                        {{ $activity->date_of_celebration }}
                                    </td>
                                    <td>
                                        {{ $activity->activityType->name }}
                                    </td>
                                    <td>
                                        {{ $activity->place_of_celebration }}
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
