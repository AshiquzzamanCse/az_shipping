<?php
namespace App\Http\Controllers;

use App\Mail\AdminMessageMail;
use App\Models\Admin;
use App\Models\SentMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SentMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = SentMessage::latest()->get();
        return view('admin.pages.sent_message.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = Admin::latest()->where('status', 'active')->get();
        return view('admin.pages.sent_message.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the incoming request
        $validated = $request->validate([
            'status'   => 'required|in:active,inactive', // Ensure status is either active or inactive
            'time'     => 'nullable|date',               // Ensure datetime is a valid date
            'subject'  => 'required|string|max:255',     // Subject should be required and a string
            'message'  => 'required|string',             // Message should be required and a string
            'emails'   => 'required|array',
            'emails.*' => 'email',
        ]);

        // Step 2: Store the validated data in the database
        $item = SentMessage::create([
            'status'  => $validated['status'],
            'time'    => $validated['time'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Send email to selected admins
        foreach ($validated['emails'] as $email) {
            Mail::to($email)->send(
                new AdminMessageMail($validated['subject'], $validated['message'])
            );
        }

        return redirect()->route('admin.sent-message.index')->with('success', 'Message Sent Successfully!!!!!');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = SentMessage::findOrFail($id);

        $item->delete();
    }

    public function updateStatusSentMessage(Request $request, $id)
    {
        $offer         = SentMessage::findOrFail($id);
        $offer->status = $request->input('status');
        $offer->save();

        return response()->json(['success' => true]);
    }
}
