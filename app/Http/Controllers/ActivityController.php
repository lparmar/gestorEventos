<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\BodyActivity;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::paginate(4);
        $typesActivity = ActivityType::all();
        $bodyActivity = BodyActivity::all();
        Session::flash('tittle', 'Listado de actividades');
        return view('activities.index', [
            'activities' => $activities, 'types_activities' => $typesActivity, 'body_activities' => $bodyActivity
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $activity = Activity::create([
            'name' => $request->name,
            'body_activity' => $request->bodyActivity,
            'date_of_celebration' => $request->dateCelebration,
            'activity_types' => $request->typeActivity,
            'place_of_celebration' => $request->place_of_celebration,
        ]);

        $activity->addMediaFromRequest('image_activity')->toMediaCollection('activities_avatar');

        Session::flash('message', 'Actividad creada correctamente.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
        $media = $activity->getMedia('documentation_activities');
        $typesActivity = ActivityType::all();
        $bodyActivity = BodyActivity::all();
        $avatar = $activity->getMedia('activities_avatar')->first();
        Session::flash('tittle', 'Editar actividad');
        return view('activities.edit', [
            'activity' => $activity, 'types_activity' => $typesActivity, 'body_activity' => $bodyActivity, 'media' => $media, 'avatar' => $avatar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
        if ($request->has('documentsActivities')) {
            foreach ($request->documentsActivities as $documentation) {
                $activity->addMedia($documentation)->toMediaCollection('documentation_activities');
            }
        }

        $activity->update([
            'activity_types' => $request->activity_type,
            'body_activity' => $request->activity_body,
        ]);

        return redirect()->back();
    }

    public function deleteMedia(Activity $activity, $id)
    {
        $media = $activity->getMedia('documentation_activities')->where('id', $id)->first(); // Obtener el archivo en específico
        $media->delete(); // Eliminar el archivo
        return redirect()->back();
    }

    public function listActivity()
    {
        $activities = Activity::all();
        $bodyActivity = BodyActivity::all();
        Session::flash('tittle', 'Listado de actividades');
        return view('activities.list', [
            'activities' => $activities, 'body_activities' => $bodyActivity
        ]);
    }


    public function listTeacher()
    {
        $teachers = Teacher::all();
        $teachers->load('user');
        Session::flash('tittle', 'Listado de profesores');
        return view('activities.list_teacher', ['teachers' => $teachers]);
    }

    public function listTeacherActivity()
    {
        $activities = Activity::all();
        Session::flash('tittle', 'Listado de actividades');
        return view('activities.list_teacher_activities', ['activities' => $activities]);
    }

    public function destroy(Activity $activity)
    {
        //
        $activity->delete();
        Session::flash('delete', "Actividad " . $activity->name . " eliminada correctamente.");
        return Redirect::to('activities');
    }

    public function trashed()
    {
        //
        Session::flash('tittle', 'Actividades eliminades');
        $activities = Activity::onlyTrashed()->get();
        return view('activities.trashed', ['activities' => $activities]);
    }

    public function deleting($id)
    {

        Activity::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return redirect()->back();
    }

    public function deleteAll()
    {

        Activity::onlyTrashed()
            ->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        Activity::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back();
    }
}
