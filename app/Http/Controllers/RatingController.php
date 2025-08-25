<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Rating::latest()->get();
        return view('admin.pages.rating.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.rating.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [

            'rating_type' => 'required|string',
            'name' => 'required|string|max:255',
            'rank' => 'nullable|string|max:255',
            // 'cdc_no' => 'nullable|string|max:255',
            'cdc_no' => 'required|string|max:255|unique:ratings',

            'remarks' => 'nullable|string',

            'contact' => 'nullable|string|max:255',
            'academy' => 'nullable|string|max:255',
            'status' => 'nullable|string',
            'ship_name' => 'nullable|string',
            'passport_number' => 'nullable|string',
            'batch' => 'nullable|string|max:255',
            'passport' => 'nullable|string|max:255',

            'ship_cook' => 'nullable|date',
            'cdc' => 'nullable|date',
            'sid' => 'nullable|date',
            'ph' => 'nullable|date',
            'pst' => 'nullable|date',
            'aff' => 'nullable|date',
            'atoto' => 'nullable|date',
            'fpff' => 'nullable|date',
            'efa' => 'nullable|date',
            'pssr' => 'nullable|date',
            'sat' => 'nullable|date',
            'dsd' => 'nullable|date',
            'pscrb' => 'nullable|date',
            'nwr' => 'nullable|date',
            'rasd' => 'nullable|date',
            'covid' => 'nullable|string',
            'discharge_date' => 'nullable|date',
            'end_of_contract' => 'nullable|date',
            'readiness' => 'nullable|date',

            'other_one' => 'nullable|string',
            'other_two' => 'nullable|string',
            'other_three' => 'nullable|date',
            'other_four' => 'nullable|date',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new Rating instance and fill it with request data
        $rating = new Rating();
        $rating->rating_type = $request->rating_type;
        $rating->name = $request->name;
        $rating->rank = $request->rank;
        $rating->cdc_no = $request->cdc_no;
        $rating->contact = $request->contact;
        $rating->academy = $request->academy;
        $rating->status = $request->status;
        $rating->ship_name = $request->ship_name;
        $rating->ship_cook = $request->ship_cook;
        $rating->passport_number = $request->passport_number;

        $rating->remarks = $request->remarks;

        $rating->batch = $request->batch;
        $rating->cdc = $request->cdc;
        $rating->passport = $request->passport;
        $rating->sid = $request->sid;
        $rating->ph = $request->ph;
        $rating->pst = $request->pst;
        $rating->aff = $request->aff;
        $rating->fpff = $request->fpff;
        $rating->atoto = $request->atoto;
        $rating->efa = $request->efa;
        $rating->pssr = $request->pssr;
        $rating->sat = $request->sat;
        $rating->dsd = $request->dsd;
        $rating->pscrb = $request->pscrb;
        $rating->nwr = $request->nwr;
        $rating->rasd = $request->rasd;
        $rating->covid = $request->covid;
        $rating->readiness = $request->readiness;
        $rating->discharge_date = $request->discharge_date;
        $rating->end_of_contract = $request->end_of_contract;

        $rating->other_one = $request->other_one;
        $rating->other_two = $request->other_two;
        $rating->other_three = $request->other_three;
        $rating->other_four = $request->other_four;

        // Save the new rating to the database
        $rating->save();

        // Redirect or respond with a success message
        return redirect()->route('admin.rating.index')->with('success', 'Rating saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rating = Rating::find($id);

        return view('admin.pages.rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'rating_type' => 'required|string',
            'name' => 'required|string|max:255',
            'rank' => 'nullable|string|max:255',
            'cdc_no' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'academy' => 'nullable|string|max:255',
            'status' => 'nullable|string',
            'ship_name' => 'nullable|string',
            'passport_number' => 'nullable|string',
            'batch' => 'nullable|string|max:255',
            'passport' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',

            'ship_cook' => 'nullable|date',
            'cdc' => 'nullable|date',
            'sid' => 'nullable|date',
            'ph' => 'nullable|date',
            'pst' => 'nullable|date',
            'aff' => 'nullable|date',
            'atoto' => 'nullable|date',
            'fpff' => 'nullable|date',
            'efa' => 'nullable|date',
            'pssr' => 'nullable|date',
            'sat' => 'nullable|date',
            'dsd' => 'nullable|date',
            'pscrb' => 'nullable|date',
            'nwr' => 'nullable|date',
            'rasd' => 'nullable|date',
            'covid' => 'nullable|string',
            'discharge_date' => 'nullable|date',
            'end_of_contract' => 'nullable|date',
            'readiness' => 'nullable|date',

            'other_one' => 'nullable|string',
            'other_two' => 'nullable|string',
            'other_three' => 'nullable|date',
            'other_four' => 'nullable|date',
        ]);

        // Find the rating by ID and update it
        $rating = Rating::findOrFail($id);
        $rating->update($validatedData);

        // Redirect back to the edit form with success message
        return redirect()->route('admin.rating.index', $rating->id)
            ->with('success', 'Rating updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Rating::findOrFail($id);
        $item->delete();
    }

    public function validateCdcNo(Request $request)
    {
        $cdcNo = $request->input('cdc_no');

        // Example validation: check if the CDC number exists in the database
        $exists = Rating::where('cdc_no', $cdcNo)->exists();

        if ($exists) {
            return response()->json(['error' => 'This CDC No already exists.']);
        }

        // If validation passes, return a successful response
        return response()->json(['error' => null]);
    }

    // public function generateRatingPDF($id)
    // {
    //     $item = Rating::findOrFail($id);
    //     $pdf = PDF::loadView('myRatingPDF', compact('item'));

    //     return $pdf->download('rating-details.pdf');
    // }

    public function generateRatingPDF($id)
    {
        $item = Rating::findOrFail($id);
        $fileName =  $item->name . '.pdf';
        $pdf = PDF::loadView('myRatingPDF', compact('item'));

        return $pdf->download($fileName);
    }
}
