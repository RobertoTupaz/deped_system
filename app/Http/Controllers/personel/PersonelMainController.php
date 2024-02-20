<?php

namespace App\Http\Controllers\personel;

use App\Http\Controllers\Controller;
use App\Models\personel\AvailableJobs;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PersonelMainController extends Controller
{
    function index() {
        return view('personel.mainPage');
    }

    function addJobs(Request $request) {
        $validated = $request->validate([
            'position' => ['required'],
            'category' => ['required'],
            'education' => ['required'],
            'experience' => ['required'],
            'plantilla_item_no' => ['required'],
            'training' => ['required'],
            'eligibility' => ['required'],
            'salaryGrade' => ['required'],
            'postingDate' => ['required'],
            'closingDate' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'available_jobs', 'length' => 8, 'prefix' => date('y')]),
            'position' => $validated['position'],
            'category' => $validated['category'],
            'education' => $validated['education'],
            'experience' => $validated['experience'],
            'plantilla_item_no' => $validated['plantilla_item_no'],
            'training' => $validated['training'],
            'eligibility' => $validated['eligibility'],
            'salary_grade' => $validated['salaryGrade'],
            'posting_date' => $validated['postingDate'],
            'closing_date' => $validated['closingDate'],
        ];

        $addJobs = AvailableJobs::create($validated2);

        if($addJobs) {
            notify()->success('Jobs Added Sucessfully');
            return redirect('/personel') -> with('message', 'Jobs Added Sucessfully');
        } else {
            notify()->error('Failed to add Jobs');
            return back() -> with('message', 'Jobs Failed to Add');
        }
    }
}
