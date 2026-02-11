<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageReceived;
use App\Models\About;
use App\Models\Admin;
use App\Models\ApplyPost;
use App\Models\Banner;
use App\Models\CeoMessage;
use App\Models\Choose;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Legal;
use App\Models\Mision;
use App\Models\Policy;
use App\Models\Principle;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //Homepage
    public function index()
    {
        // $banners = Banner::where('status', 'active')->latest()->get();
        // $services = Service::where('status', 'active')->latest()->get();
        // $about = About::latest('id')->first();
        // $clients = Client::where('status', 'active')->latest()->get();

        // return view('frontend.pages.home', compact('banners', 'about', 'services', 'clients'));

        $adminStatus = Setting::where('maintenance_mode', 'active')->exists();

        if (! $adminStatus) {

            $banners  = Banner::where('status', 'active')->latest()->get();
            $services = Service::where('status', 'active')->latest()->get();
            $about    = About::latest('id')->first();
            $clients  = Client::where('status', 'active')->latest()->get();

            return view('frontend.pages.home', compact('banners', 'about', 'services', 'clients'));
        } else {
            // Handle the case when the admin panel is active (site in maintenance mode)
            return response()->view('errors.site_problem', );
        }
    }

    //allTeam
    public function allTeam()
    {
        $teams = Team::where('status', 'active')->orderBy('order_team')->get();
        return view('frontend.pages.team', compact('teams'));
    }

    //legal Papers
    public function legalPapers()
    {
        $legals = Legal::where('status', 'active')->latest()->get();
        return view('frontend.pages.legal_papers', compact('legals'));
    }

    //Mission-Vision
    public function vision()
    {
        $mission = Mision::where('status', 'active')->latest('id')->first();
        $vission = Vision::where('status', 'active')->latest('id')->first();

        return view('frontend.pages.vision', compact('mission', 'vission'));
    }

    //ceoMessage
    public function ceoMessage()
    {
        $message = CeoMessage::latest('id')->first();
        return view('frontend.pages.ceo_message', compact('message'));
    }

    //why Choose Us
    public function whyChooseUs()
    {
        $choose = Choose::where('status', 'active')->latest('id')->first();
        return view('frontend.pages.choose', compact('choose'));
    }

    //serviceDetails
    public function serviceDetails($slug)
    {
        $serviceItem = Service::where('slug', $slug)->firstOrFail();
        $services    = Service::where('status', 'active')->latest()->get();

        return view('frontend.pages.service_details', compact('serviceItem', 'services'));
    }

    //principleDetails
    public function principleDetails($slug)
    {
        $principleItem = Principle::where('slug', $slug)->firstOrFail();
        $services      = Service::where('status', 'active')->latest()->get();

        return view('frontend.pages.principle_details', compact('principleItem', 'services'));
    }

    //about
    public function about()
    {

        $about = About::latest('id')->first();
        return view('frontend.pages.about', compact('about'));
    }

    //allJob
    public function allJob()
    {
        $jobs = Job::where('status', 'active')->latest()->get();
        return view('frontend.pages.job', compact('jobs'));
    }

    //jobDetails
    public function jobDetails($id)
    {
        $job = Job::findOrfail($id);
        return view('frontend.pages.job_details', compact('job'));
    }

    //jobApply
    public function jobApply($id)
    {
        $job    = Job::findOrfail($id);
        $policy = Policy::where('status', 'active')->latest('id')->first();

        return view('frontend.pages.job_apply', compact('job', 'policy'));
    }

    //dropCv
    public function dropCv()
    {
        $jobs   = Job::latest()->get();
        $policy = Policy::where('status', 'active')->latest('id')->first();

        return view('frontend.pages.drop_cv', compact('jobs', 'policy'));
    }

    //jobApplyEmployee
    public function jobApplyEmployee(Request $request)
    {
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'job_id'          => 'nullable', // Ensure job exists
                'name'            => 'required|string|max:255',
                'email'           => 'required|email|max:255',
                'phone'           => 'required',
                'passport_number' => 'required|string|max:50', // Adjust as necessary
                'cdc_number'      => 'required|string|max:50', // Adjust as necessary
                'nationality'     => 'required|string|max:100',
                'attachment'      => 'nullable|file|mimes:pdf,doc,docx|max:2048', // File validation
                'agree'           => 'required|accepted',                         // Ensure terms are accepted
            ]);

            // Check validation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Create a new job application
            $application                  = new ApplyPost();
            $application->job_id          = $request->job_id;
            $application->name            = $request->name;
            $application->email           = $request->email;
            $application->phone           = $request->phone;
            $application->passport_number = $request->passport_number;
            $application->cdc_number      = $request->cdc_number;
            $application->nationality     = $request->nationality;
            $application->agree           = $request->agree;

            // Handle file upload
            if ($request->hasFile('attachment')) {
                $file     = $request->file('attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('attachments', $filename, 'public');
                $application->attachment = $filename;
            }

            // Save the application
            $application->save();

            // Get all admins with 'mail_status' set to 'mail'
            $admins = Admin::where('mail_status', 'mail')->get();

            // foreach ($admins as $admin) {
            //     Notification::send($admin, new JobApplyNotification($application)); // Pass the entire application
            // }

            // Redirect with success message
            return redirect()->back()->with('success', 'Application submitted successfully!');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Job application failed: ' . $e->getMessage());

            // Optionally, send an error message to the user
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    //Contact
    public function contact()
    {
        return view('frontend.pages.contact');
    }

    //contactStore
    public function contactStore(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:150',
            'email'                => 'required|email|max:150',
            'phone'                => 'nullable|string|max:20',
            'subject'              => 'required|string',
            'message'              => 'required|string|max:1200',
            'g-recaptcha-response' => 'required|captcha', // Validate reCAPTCHA
        ]);

        // If validation fails, redirect back with errors
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Start a database transaction
        DB::beginTransaction();

        try {
                                 // Generate a unique message code
            $typePrefix = 'MSG'; // Adjust this as needed
            $today      = date('dmy');
            $lastCode   = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
                ->orderBy('id', 'desc')
                ->first();

            $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;
            $code      = $typePrefix . '-' . $today . '-' . $newNumber;

            // Create a new contact object (but do not save it yet)
            $contact = new Contact([
                'code'       => $code,
                'name'       => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'subject'    => $request->subject,
                'message'    => $request->message,
                'ip_address' => $request->ip(),
            ]);

            // Send an email to all admins

            // $admins = Admin::where('mail_status', 'mail')->get();
            // foreach ($admins as $admin) {
            //     Mail::to($admin->email)->send(new ContactMessageReceived($contact));
            // }

            // If emails were successfully sent, store the contact record
            $contact->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Thank You. We have received your message. We will contact you very soon');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Log the error to the log file for debugging
            Log::error('Error sending email or saving contact: ' . $e->getMessage());

            // Optionally, you can redirect with an error message
            return redirect()->back()->with('error', 'There was an issue sending the email or saving your message. Please try again later.');
        }
    }
}
