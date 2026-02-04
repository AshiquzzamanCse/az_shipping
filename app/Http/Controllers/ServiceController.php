<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Service::latest()->get();
        return view('admin.pages.service.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:active,inactive',
            'name' => 'required|string|max:255',
            'short_descp' => 'required|string|max:300',

            'thumbnail_image' => 'nullable|image|max:2048', // Max size 2MB
            'banner_top_image' => 'nullable|image|max:2048', // Max size 2MB
            'banner_center_image' => 'nullable|image|max:2048', // Max size 2MB
        ]);

        // Create a new About instance
        $service = new Service();
        $service->name = $request->name;
        $service->short_descp = $request->short_descp;
        $service->description = $request->description;
        $service->status = $request->status;

        // Handle file uploads
        if ($request->hasFile('thumbnail_image')) {
            $service->thumbnail_image = $request->file('thumbnail_image')->store('service', 'public');
        }

        if ($request->hasFile('banner_top_image')) {
            $service->banner_top_image = $request->file('banner_top_image')->store('service', 'public');
        }

        if ($request->hasFile('banner_center_image')) {
            $service->banner_center_image = $request->file('banner_center_image')->store('service', 'public');
        }

        // Save the About instance to the database
        $service->save();

        // Redirect or return a response
        return redirect()->route('admin.service.index')->with('success', 'Service Created successfully.');
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
        $service = Service::find($id);

        return view('admin.pages.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:active,inactive',
            'name' => 'required|string|max:255',
            'short_descp' => 'required|string|max:500',
            
            'thumbnail_image' => 'nullable|image|max:2048',
            'banner_top_image' => 'nullable|image|max:2048', // Max size 2MB
            'banner_center_image' => 'nullable|image|max:2048', // Max size 2MB // Allow null for updating
        ]);

        // Update the fields
        $service->name = $request->name;
        $service->short_descp = $request->short_descp;
        $service->description = $request->description;
        $service->status = $request->status;

        // Handle file uploads
        if ($request->hasFile('thumbnail_image')) {
            // Delete the old thumbnail_image if it exists
            if ($service->thumbnail_image) {
                Storage::disk('public')->delete($service->thumbnail_image);
            }
            // Store the new image
            $service->thumbnail_image = $request->file('thumbnail_image')->store('service', 'public');
        }

        if ($request->hasFile('banner_top_image')) {
            // Delete the old banner_top_image if it exists
            if ($service->banner_top_image) {
                Storage::disk('public')->delete($service->banner_top_image);
            }
            // Store the new image
            $service->banner_top_image = $request->file('banner_top_image')->store('service', 'public');
        }

        if ($request->hasFile('banner_center_image')) {
            // Delete the old banner_center_image if it exists
            if ($service->banner_center_image) {
                Storage::disk('public')->delete($service->banner_center_image);
            }
            // Store the new image
            $service->banner_center_image = $request->file('banner_center_image')->store('service', 'public');
        }

        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the existing record
        $service = Service::findOrFail($id);

        // Delete associated images if they exist
        if ($service->thumbnail_image) {
            Storage::disk('public')->delete($service->thumbnail_image);
        }
        if ($service->banner_top_image) {
            Storage::disk('public')->delete($service->banner_top_image);
        }
        if ($service->banner_center_image) {
            Storage::disk('public')->delete($service->banner_center_image);
        }

        $service->delete();
    }

    public function updateStatusService(Request $request, $id)
    {
        $offer = Service::findOrFail($id);
        $offer->status = $request->input('status');
        $offer->save();

        return response()->json(['success' => true]);
    }
}
