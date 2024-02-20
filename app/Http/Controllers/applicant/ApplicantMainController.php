<?php

namespace App\Http\Controllers\applicant;

use App\Http\Controllers\Controller;
use App\Models\applicant\User1AOEAA;
use App\Models\applicant\User1Applicant;
use App\Models\applicant\User1Education;
use App\Models\applicant\User1Eligibility;
use App\Models\applicant\User1Experience;
use App\Models\applicant\User1LD;
use App\Models\applicant\User1OutstandingAccomplishment;
use App\Models\applicant\User1OutstandingAccomplishmentType;
use App\Models\applicant\User1PerformanceRating;
use App\Models\applicant\User1Training;
use App\Models\personel\AvailableJobs;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

class ApplicantMainController extends Controller
{
    function index() {
        $jobs = AvailableJobs::all();
        return view('applicant.mainPage')
        ->with('jobs', $jobs);
    }

    function dashboard() {
        return view('applicant.pages.dashboard');
    }

    function personalInfo() {
        $educationalAttainment = User1Education::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $experience = User1Experience::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $training = User1Training::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $eligibility = User1Eligibility::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $performanceRating = User1PerformanceRating::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $outstandingAccomplishment = User1OutstandingAccomplishment::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $aoeaa = User1AOEAA::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $ld = User1LD::where('user1_applicant_id', Auth::guard('user1')->user()->id)->get();
        $outstandingAccomplishmentType = User1OutstandingAccomplishmentType::all();

        //get all provinces
        $json = file_get_contents('https://raw.githubusercontent.com/darklight721/philippines/master/provinces.json');
        $provinces = json_decode($json);

        return view('applicant.pages.personalInfo')
        ->with('user', Auth::guard('user1')->user())
        ->with('educationalAttainment', $educationalAttainment)
        ->with('experience', $experience)
        ->with('training', $training)
        ->with('eligibility', $eligibility)
        ->with('performanceRating', $performanceRating)
        ->with('outstandingAccomplishment', $outstandingAccomplishment)
        ->with('aoeaa', $aoeaa)
        ->with('ld', $ld)
        ->with('outstandingAccomplishmentType', $outstandingAccomplishmentType)
        ->with('provinces', $provinces);
    }

    function applicationHistory() {
        return view('applicant.pages.applicationHistory');
    }

    function applicationForm() {
        return view('applicant.pages.applicationForm');
    }

    function saveInfo(Request $request) {
        $data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix_name' => $request->suffix_name,

            'street' => $request->street,
            'barangay' => $request->barangay,
            'city_municipality' => $request->city_municipality,
            'province' => $request->province,

            'civil_status' => $request->civil_status,
            'religion' => $request->religion,
            'contact_number' => $request->contact_number,
            'ethnic_group' => $request->ethnic_group,
            'disability' => $request->disability,
        ];
        
        $update = User1Applicant::where('id', Auth::guard('user1')->user()->id) 
        -> update([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'suffix_name' => $data['suffix_name'],

            'street' => $data['street'],
            'barangay' => $data['barangay'],
            'city_municipality' => $data['city_municipality'],
            'province' => $data['province'],

            'civil_status' => $data['civil_status'],
            'religion' => $data['religion'],
            'contact_number' => $data['contact_number'],
            'ethnic_group' => $data['ethnic_group'],
            'disability' => $data['disability'],
        ]);

        if($update) {
            notify()->success('Data Updated Sucessfully!!!');
            return redirect('/applicant/personalInfo');
        } else {
            notify()->error('Data Update Error!!!');
            return redirect('/applicant/personalInfo');
        }

    }

    function addEducation(Request $request) {

        $validated = $request->validate([
            'educational_attainment' => ['required'],
            'units' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_education', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'educational_attainment' => $validated['educational_attainment'],
            'units' => $validated['units'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/education/', $filename);
            $validated2['document'] = $filename;
        }

        $addEducation = User1Education::create($validated2);

        if($addEducation) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#education');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#education');
        }
    }

    function editEducation(Request $request) {

        $validated = $request->validate([
            'id' => ['required'],
            'educational_attainment' => ['required'],
            'units' => ['required'],
        ]);

        $validated2 = [
            'educational_attainment' => $validated['educational_attainment'],
            'units' => $validated['units'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/education/', $filename);

            $validated2 = [
                'educational_attainment' => $validated['educational_attainment'],
                'units' => $validated['units'],
                'document' => $filename,
            ];
        }

        $editEducation = User1Education::where('id', $validated['id']) -> update($validated2);

        if($editEducation) {
            notify()->success('Data Edited Sucessfully');
            return redirect(url()->previous() .'#education');
        } else {
            notify()->error('Failed to Edited Data');
            return redirect(url()->previous() .'#education');
        }
    }

    function getEducationData(Request $request) {
        $data = User1Education::where('id', $request->id)->first();
        return "Test";
    }

    function addEligibility(Request $request) {
        $validated = $request->validate([
            'title' => ['required'],
            'rating' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_eligibility', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'rating' => $validated['rating'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/eligibility/', $filename);
            $validated2['document'] = $filename;
        }

        $addEligibility = User1Eligibility::create($validated2);

        if($addEligibility) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#eligibility');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#eligibility');
        }
    }

    function editEligibility(Request $request) {

        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'rating' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
            'rating' => $validated['rating'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/eligibility/', $filename);
            
            $validated2 = [
                'title' => $validated['title'],
                'rating' => $validated['rating'],
                'document' => $filename,
            ];
        }

        $editEligibility = User1Eligibility::where('id', $validated['id']) -> update($validated2);

        if($editEligibility) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#eligibility');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#eligibility');
        }
    }

    function addExperience(Request $request) {

        $validated = $request->validate([
            'title' => ['required'],
            'monthStarted' => ['required'],
            'dayStarted' => ['required'],
            'yearStarted' => ['required'],
            'monthEnded' => ['required'],
            'dayEnded' => ['required'],
            'yearEnded' => ['required'],
            'employer_company' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_experience', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'date_started' => $validated['monthStarted']."-".$validated['dayStarted']."-".$validated['yearStarted'],
            'date_ended' => $validated['monthEnded']."-".$validated['dayEnded']."-".$validated['yearEnded'],
            'years_covered' => '',
            'months_covered' => '',
            'employer_or_company' => $validated['employer_company'],
            'document' => '',
        ];

        $yearsCovered = $validated['yearEnded'] - $validated['yearStarted'];
        $monthsCovered = 0;

        $monthStarted = (int) $validated['monthStarted'];
        $monthEnded = (int) $validated['monthEnded'];
        $dayStarted = (int) $validated['dayStarted'];
        $dayEnded = (int) $validated['dayEnded'];

        if($monthStarted < $monthEnded) {
            $monthsCovered = $monthEnded - $monthStarted;
            if($dayStarted > $dayEnded) {
                $monthsCovered = $monthsCovered - 1;
            }
        }

        if($monthStarted > $monthEnded) {
            $yearsCovered = $yearsCovered - 1;
        } else if ($monthStarted == $monthEnded) {
            if($dayStarted > $dayEnded) {
                $yearsCovered = $yearsCovered - 1;
            }
        }

        $validated2['years_covered'] = $yearsCovered;
        $validated2['months_covered'] = $monthsCovered;

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/experience/', $filename);
            $validated2['document'] = $filename;
        }

        $addExperience = User1Experience::create($validated2);

        if($addExperience) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#experience');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#experience');
        }
    }

    function editExperience(Request $request) {

        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'monthStarted' => ['required'],
            'dayStarted' => ['required'],
            'yearStarted' => ['required'],
            'monthEnded' => ['required'],
            'dayEnded' => ['required'],
            'yearEnded' => ['required'],
            'employer_company' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
            'date_started' => $validated['monthStarted']."-".$validated['dayStarted']."-".$validated['yearStarted'],
            'date_ended' => $validated['monthEnded']."-".$validated['dayEnded']."-".$validated['yearEnded'],
            'years_covered' => '',
            'employer_or_company' => $validated['employer_company'],
        ];

        $yearsCovered = $validated['yearEnded'] - $validated['yearStarted'];

        $monthStarted = $validated['monthStarted'];
        $monthEnded = $validated['monthEnded'];
        $dayStarted = $validated['dayStarted'];
        $dayEnded = $validated['dayEnded'];

        if((int)$monthStarted > (int)$monthEnded) {
            $yearsCovered = $yearsCovered - 1;
        } else if ((int)$monthStarted == (int)$monthEnded) {
            if((int)$dayStarted > (int)$dayEnded) {
                $yearsCovered = $yearsCovered - 1;
            }
        }

        $validated2['years_covered'] = $yearsCovered;

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/experience/', $filename);

            $validated2 = [
                'user1_applicant_id' => Auth::guard('user1')->user()->id,
                'title' => $validated['title'],
                'date_started' => $validated['monthStarted']."-".$validated['dayStarted']."-".$validated['yearStarted'],
                'date_ended' => $validated['monthEnded']."-".$validated['dayEnded']."-".$validated['yearEnded'],
                'years_covered' => '',
                'employer_or_company' => $validated['employer_company'],
                'document' => $filename,
            ];
        }

        $editExperience = User1Experience::where('id', $request->id)->update($validated2);

        if($editExperience) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#experience');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#experience');
        }
    }

    function addTraining(Request $request) {
        
        $validated = $request->validate([
            'title' => ['required'],
            'hours' => ['required'],
            'year_attended' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_training', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'training_hours_no' => $validated['hours'],
            'year_attended' => $validated['year_attended'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/training/', $filename);
            $validated2['document'] = $filename;
        }

        $addTraining = User1Training::create($validated2);

        if($addTraining) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#training');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#training');
        }
    }

    function editTraining(Request $request) {
        
        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'hours' => ['required'],
            'year_attended' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
            'training_hours_no' => $validated['hours'],
            'year_attended' => $validated['year_attended'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/training/', $filename);
            
            $validated2 = [
                'title' => $validated['title'],
                'training_hours_no' => $validated['hours'],
                'year_attended' => $validated['year_attended'],
                'document' => $filename,
            ];
        }

        $editTraining = User1Training::where('id', $request->id) -> update($validated2);

        if($editTraining) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#training');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#training');
        }
    }

    function addPerformanceRating(Request $request) {
        $validated = $request->validate([
            'company' => ['required'],
            'year' => ['required'],
            'rating' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_performance_rating', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'employer_or_company' => $validated['company'],
            'year' => $validated['year'],
            'rating' => $validated['rating'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/performanceRating/', $filename);
            $validated2['document'] = $filename;
        }

        $addPerformanceRating = User1PerformanceRating::create($validated2);

        if($addPerformanceRating) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#performanceRatingHead');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#performanceRatingHead');
        }
    }

    function editPerformanceRating(Request $request) {
        $validated = $request->validate([
            'id' => ['required'],
            'company' => ['required'],
            'year' => ['required'],
            'rating' => ['required'],
        ]);

        $validated2 = [
            'employer_or_company' => $validated['company'],
            'year' => $validated['year'],
            'rating' => $validated['rating'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/performanceRating/', $filename);

            $validated2 = [
                'employer_or_company' => $validated['company'],
                'year' => $validated['year'],
                'rating' => $validated['rating'],
                'document' => $filename,
            ];
        }

        $editPerformanceRating = User1PerformanceRating::where('id', $validated['id']) -> update($validated2);

        if($editPerformanceRating) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#performanceRatingHead');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#performanceRatingHead');
        }
    }

    function addOutstandingAccomplishment(Request $request) {
        $validated = $request->validate([
            'title' => ['required'],
            'type' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_outstanding_accomplishment', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'type' => $validated['type'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/outstandingAccomplishment/', $filename);
            $validated2['document'] = $filename;
        }

        $addOutstandingAccomplishment = User1OutstandingAccomplishment::create($validated2);

        if($addOutstandingAccomplishment) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#outstandingAccomplishmentHead');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#outstandingAccomplishmentHeads');
        }
    }

    function editOutstandingAccomplishment(Request $request) {
        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'type' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
            'type' => $validated['type'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/outstandingAccomplishment/', $filename);
            $validated2 = [
                'title' => $validated['title'],
                'type' => $validated['type'],
                'document' => $filename,
            ];
    
        }

        $editOutstandingAccomplishment = User1OutstandingAccomplishment::where('id', $validated['id']) -> update($validated2);

        if($editOutstandingAccomplishment) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#outstandingAccomplishmentHead');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#outstandingAccomplishmentHead');
        }
    }

    function addAOEAA(Request $request) {
        $validated = $request->validate([
            'title' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_aoeaa_last_promotion', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/aoeaa/', $filename);
            $validated2['document'] = $filename;
        }

        $addAOEAA = User1AOEAA::create($validated2);

        if($addAOEAA) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#aoeaa');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#aoeaa');
        }
    }

    function editAOEAA(Request $request) {

        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/aoeaa/', $filename);

            $validated2 = [
                'title' => $validated['title'],
                'document' =>  $filename,
            ];
        }

        $editAOEAA = User1AOEAA::where('id', $validated['id']) ->update($validated2);

        if($editAOEAA) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#aoeaa');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#aoeaa');
        }
    }

    function addLD(Request $request) {
        $validated = $request->validate([
            'title' => ['required'],
            'document' => ['required'],
        ]);

        $validated2 = [
            'id' => IdGenerator::generate(['table' => 'user1_applicant_ld_last_promotion', 'length' => 10, 'prefix' => date('y')]),
            'user1_applicant_id' => Auth::guard('user1')->user()->id,
            'title' => $validated['title'],
            'document' => '',
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/ld/', $filename);
            $validated2['document'] = $filename;
        }

        $addLD = User1LD::create($validated2);

        if($addLD) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#ld');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#ld');
        }
    }


    function editLD(Request $request) {
        $validated = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
        ]);

        $validated2 = [
            'title' => $validated['title'],
        ];

        if($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/ld/', $filename);

            $validated2 = [
                'title' => $validated['title'],
                'document' => $filename,
            ];
        }

        $editLD = User1LD::where('id', $validated['id']) -> update($validated2);

        if($editLD) {
            notify()->success('Data Added Sucessfully');
            return redirect(url()->previous() .'#ld');
        } else {
            notify()->error('Failed to Add Data');
            return redirect(url()->previous() .'#ld');
        }
    }
}
