<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    //
    public function generatePDF(Request $request)
    {
        $query = Activity::where('body_activity', $request->bodyActivity);

        if ($request->has('date_of_celebration')) {
            $query->where('date_of_celebration', 'like', '%' . $request->date_of_celebration . '%');
        }


        $activities = $query->get();


        $pdf = PDF::loadView('myPDFActivities', ['activities' => $activities]);
        $pdf->setBasePath(public_path(asset('resources/css/app.css'))); // Ruta a tu archivo CSS de Flowbite
        return $pdf->download('itsolutionstuff.pdf');
    }
}
