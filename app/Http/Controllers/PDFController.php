<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Teacher;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function generatePDFDateBody(Request $request)
    {

        if ($request->has('bodyActivity') && $request->bodyActivity !== 0) {
            $activities = Activity::where('body_activity', $request->bodyActivity)->get();
        } else {
            $activities = Activity::orderBy('name', 'asc')->get();
        }

        if ($request->has('date_of_celebration')) {
            $activities = Activity::orderBy('name', 'asc')->where('date_of_celebration', 'like', '%' . $request->date_of_celebration . '%')->get();
        }


        $pdf = PDF::loadView('myPdfActivities', ['activities' => $activities]);
        return $pdf->download('gestorEventosFecha/Cuerpo.pdf');
    }

    public function generatePDFTeacher(Request $request)
    {
        $teacher = Teacher::where('id', $request->teacher)->first();
        $teacher->load('activities');

        $pdf = PDF::loadView('myPdfActivitiesTeacher', ['activities' => $teacher->activities, 'teacher' => $teacher]);

        return $pdf->download('gestorEventosTeacher.pdf');
    }

    public function generatePDFActivity(Request $request)
    {
        $activity = Activity::where('id', $request->activity)->first();
        $activity->load('teachers');

        $pdf = PDF::loadView('myPdfActivitiesActivity', ['activity' => $activity, 'teachers' => $activity->teachers]);

        return $pdf->download('gestorEventosActivity.pdf');
    }
}
