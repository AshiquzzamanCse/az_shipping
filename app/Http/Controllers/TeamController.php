<?php
namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Team::latest()->get();
        return view('admin.pages.team.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|string|max:255',
            'position'    => 'required|string|max:255',
            'order_team'  => 'required|integer',
            'short_descp' => 'nullable|string',
            'facebook'    => 'nullable|url|max:255',
            'whatup'      => 'nullable|string|max:15',
            'phone'       => 'nullable|string|max:15',
            'status'      => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example for image validation
        ]);

        $mainFile = $request->file('image');
        $imgPath  = storage_path('app/public/team/');

        $data = [

            'name'        => $request->name,
            'email'       => $request->email,
            'position'    => $request->position,
            'order_team'  => $request->order_team,
            'short_descp' => $request->short_descp,
            'facebook'    => $request->facebook,
            'whatup'      => $request->whatup,
            'phone'       => $request->phone,
            'status'      => $request->status,

            'created_at'  => now(),
        ];

        if (! empty($mainFile)) {
            $globalFunImg = customUpload($mainFile, $imgPath);

            if ($globalFunImg['status'] == 1) {
                $data['image'] = $globalFunImg['file_name'];
            } else {
                return redirect()->back()->withInput()->with('error', 'Upload failed! Please try again.');
            }
        }

        Team::insert($data);

        return redirect()->route('admin.team.index')->with('success', 'Data Inserted Successfully!');
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
        $team = Team::find($id);

        return view('admin.pages.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Team::findOrFail($id);

        $mainFile   = $request->file('image');
        $uploadPath = storage_path('app/public/team/');

        if (isset($mainFile)) {
            $globalFunImg = customUpload($mainFile, $uploadPath);
        } else {
            $globalFunImg['status'] = 0;
        }

        if (! empty($banner)) {

            if ($globalFunImg['status'] == 1) {
                if (File::exists(public_path('storage/team/requestImg/') . $banner->image)) {
                    File::delete(public_path('storage/team/requestImg/') . $banner->image);
                }
                if (File::exists(public_path('storage/team/') . $banner->image)) {
                    File::delete(public_path('storage/team/') . $banner->image);
                }

                if (File::exists(public_path('storage/files/') . $banner->image)) {
                    File::delete(public_path('storage/files/') . $banner->image);
                }
            }

            $banner->update([

                'name'        => $request->name,
                'email'       => $request->email,
                'position'    => $request->position,
                'order_team'  => $request->order_team,
                'short_descp' => $request->short_descp,
                'facebook'    => $request->facebook,
                'whatup'      => $request->whatup,
                'phone'       => $request->phone,
                'status'      => $request->status,

                'image'       => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $banner->image,

            ]);
        }

        return redirect()->route('admin.team.index')->with('success', 'Data Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Team::findOrFail($id);

        if (File::exists(public_path('storage/team/requestImg/') . $item->image)) {
            File::delete(public_path('storage/team/requestImg/') . $item->image);
        }

        if (File::exists(public_path('storage/team/') . $item->image)) {
            File::delete(public_path('storage/team/') . $item->image);
        }

        if (File::exists(public_path('storage/files/') . $item->image)) {
            File::delete(public_path('storage/files/') . $item->image);
        }

        $item->delete();
    }

    public function updateStatusTeam(Request $request, $id)
    {
        $offer         = Team::findOrFail($id);
        $offer->status = $request->input('status');
        $offer->save();

        return response()->json(['success' => true]);
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'order_team' => 'required|integer',
        ]);

        $item             = Team::find($request->id);
        $item->order_team = $request->order_team;
        $item->save();

        return response()->json(['success' => true]);
    }
}
