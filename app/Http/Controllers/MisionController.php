<?php

namespace App\Http\Controllers;

use App\Models\Mision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Mision::latest()->get();
        return view('admin.pages.mision.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.mision.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // // Validate the request
        // $validator = Validator::make($request->all(), [
        //     'mision' => 'required|string', // Adjust max length as needed
        //     'status' => 'required', // Assuming status is a boolean
        // ]);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // // Insert the mission
        // Mision::insert([
        //     'mision' => $request->mision,
        //     'status' => $request->status,
        //     'added_by' => Auth::guard('admin')->user()->id,
        //     'created_at' => now(),
        // ]);

        ////////////////////////////////////////
        $request->validate([

            'mision' => 'required|string',             // Adjust max length as needed
            'status' => 'required|in:active,inactive', // Assuming status can only be 'active' or 'inactive'

            'image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example for image validation
        ]);

        $mainFile = $request->file('image');
        $imgPath  = storage_path('app/public/mision/');

        $data = [

            'mision'     => $request->mision,
            'status'     => $request->status,
            'added_by'   => Auth::guard('admin')->user()->id,
            'created_at' => now(),
        ];

        if (! empty($mainFile)) {
            $globalFunImg = customUpload($mainFile, $imgPath);

            if ($globalFunImg['status'] == 1) {
                $data['image'] = $globalFunImg['file_name'];
            } else {
                return redirect()->back()->withInput()->with('error', 'Upload failed! Please try again.');
            }
        }

        Mision::insert($data);
        ////////////////////////////////////////

        // Redirect or return a response
        return redirect()->route('admin.mision.index')->with('success', 'Mission section created successfully.');
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
        $mision = Mision::find($id);

        return view('admin.pages.mision.edit', compact('mision'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // // Validate the request
        // $validator = Validator::make($request->all(), [
        //     'mision' => 'required|string', // Adjust max length as needed
        //     'status' => 'required', // Assuming status is a boolean
        // ]);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // $mision = Mision::findOrFail($id); // Find the vision by ID

        // $mision->update([
        //     'mision' => $request->mision,
        //     'status' => $request->status,
        //     'updated_by' => Auth::guard('admin')->user()->id,
        // ]);

         //////////////////////////////////////////

        $mision = Mision::findOrFail($id);

        $mainFile   = $request->file('image');
        $uploadPath = storage_path('app/public/mision/');

        if (isset($mainFile)) {
            $globalFunImg = customUpload($mainFile, $uploadPath);
        } else {
            $globalFunImg['status'] = 0;
        }

        if (! empty($mision)) {

            if ($globalFunImg['status'] == 1) {
                if (File::exists(public_path('storage/mision/requestImg/') . $mision->image)) {
                    File::delete(public_path('storage/mision/requestImg/') . $mision->image);
                }
                if (File::exists(public_path('storage/mision/') . $mision->image)) {
                    File::delete(public_path('storage/mision/') . $mision->image);
                }

                if (File::exists(public_path('storage/files/') . $mision->image)) {
                    File::delete(public_path('storage/files/') . $mision->image);
                }
            }

            $mision->update([

                'mision'     => $request->mision,
                'status'     => $request->status,
                'updated_by' => Auth::guard('admin')->user()->id,

                'image'      => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $mision->image,

            ]);
        }

        /////////////////////////////////////

        // Redirect or return a response
        return redirect()->route('admin.mision.index')->with('success', 'Mission section created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $mision = Mision::findOrFail($id); // Find the vision by ID
        // $mision->delete();

        $item = Mision::findOrFail($id);

        if (File::exists(public_path('storage/mision/requestImg/') . $item->image)) {
            File::delete(public_path('storage/mision/requestImg/') . $item->image);
        }

        if (File::exists(public_path('storage/mision/') . $item->image)) {
            File::delete(public_path('storage/mision/') . $item->image);
        }

        if (File::exists(public_path('storage/files/') . $item->image)) {
            File::delete(public_path('storage/files/') . $item->image);
        }

        $item->delete();
    }

    public function updateStatusMision(Request $request, $id)
    {
        $offer = Mision::findOrFail($id);
        $offer->status = $request->input('status');
        $offer->save();

        return response()->json(['success' => true]);
    }
}
