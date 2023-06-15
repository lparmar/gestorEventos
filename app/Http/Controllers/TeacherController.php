<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Activity;
use App\Models\ActivityType;
use App\Models\BodyActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teaching_body_user =  Teacher::where('user_id', Auth::user()->id)->first()->teaching_body;
        $activities = Activity::where('body_activity', $teaching_body_user)->get();
        $typesActivity = ActivityType::all();
        $bodyActivity = BodyActivity::where('id', $teaching_body_user)->first();
        $confirmed_assistance = 0;
        Session::flash('tittle', 'Listado de actividades');
        return view('teachers.activities', [
            'activities' => $activities, 'types_activities' => $typesActivity, 'body_activity' => $bodyActivity, 'confirmed_assistance' => $confirmed_assistance
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activities_list)
    {
        //
        $media = $activities_list->getMedia('documentation_activities');
        $activities_list->load('teachers');
        $userregister = false;
        Session::flash('tittle', 'Actividad' . $activities_list->name);
        foreach ($activities_list->teachers as $teacher) {
            if (Auth::user()->id === $teacher->user_id) {
                $userregister = true;
            }
        }
        return view('activities.show', ['activity' => $activities_list, 'media' => $media, 'userregister' => $userregister]);
    }


    public function confirmAttendanceShow(Activity $activity)
    {
        //
        $media = $activity->getMedia('documentation_activities');
        $activity->load('teachers');

        return view('activities.confirmAttendanceShow', ['activity' => $activity, 'media' => $media]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function createInscription(Request $request)
    {
        $activity = Activity::find($request->activity);

        $teacher = Teacher::where('user_id', $request->teacher)->first();
        $activity->teachers()->attach($teacher->id);
        Session::flash('message', 'Inscrito correctamente.');
        return redirect()->back();
    }

    public function confirmAttendance(Request $request)
    {
        $activity = Activity::find($request->activity);
        $teacher = Teacher::where('user_id', $request->teacher)->first();

        $activityTeacher = $activity->teachers()->where('teacher_id', $teacher->id)->first();

        $activityTeacher->pivot->confirmed_assistance = true;
        $activityTeacher->pivot->save();
        $confirmed_assistance = $activityTeacher->pivot->confirmed_assistance;
        Session::flash('message', 'Incsripción confirmada correctamente.');
        return redirect()->back()->with(['confirmed_assistance' => $confirmed_assistance]);
    }

    public function activitiesListTeacher()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        $teacher->load('activities');

        $typesActivity = ActivityType::all();
        $bodyActivity = BodyActivity::where('id', $teacher->teaching_body)->first();

        return view('teachers.activitiesInscription', [
            'activities' => $teacher->activities, 'types_activities' => $typesActivity, 'body_activity' => $bodyActivity
        ]);
    }
}
