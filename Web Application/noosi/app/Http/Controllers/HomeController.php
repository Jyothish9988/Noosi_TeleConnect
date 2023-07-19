<?php

namespace App\Http\Controllers;
use App\Mail\BookingMailer;
use App\Models\blog;
use App\Models\booking;
use App\Models\category;
use App\Models\consultation;
use App\Models\contact;
use App\Models\doctor;
use App\Models\Patients;
use App\Models\review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationConfirmation;
use Session;
use Stripe;
class HomeController extends Controller
{



 
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') 
        {
            $dr = DB::table('doctors')->limit(6)->get();

            return view('user.user',compact('dr'));
        } 
        elseif($usertype == '2')
        {

            $dr = DB::table('doctors')->limit(6)->get();

            return view('doctor.home',compact('dr'));
        }
        elseif($usertype == '0')
        {
            return view('admin.home');
        }
        elseif($usertype == '3')
        {
            
        $date = date('Y-m-d');
        $data= DB::table('bookings')

                ->join('patients', 'bookings.lid', '=', 'patients.reg_id')
                ->where('bookings.date','=', $date)
                ->get();
            return view('patient.home',compact('data'));
        }
    }
    

    public function index()
    {
        
        $dr = DB::table('doctors')->limit(6)->get();
            return view('user.user',compact('dr'));
      
    }

    public function doctor()
    {
        
        $dr = doctor::all();
            return view('user.doctors',compact('dr'));
      
    }
    public function doctor_dr()
    {
        
        $dr = doctor::all();
            return view('doctor.doctor_dr',compact('dr'));
      
    }

    public function consultation()
    {
        $lid = Auth::user()->id;
        $data= Consultation::where('lid', $lid)->get();
        return view('doctor.consultation', compact('data'));
      
    }

    public function add_consultation(Request $request)
    {
        $data = new consultation;
        $lid = Auth::user()->id;
        $data->date = $request->input('date');
        $data->from = $request->input('from');
        $data->to = $request->input('to');       
        $data->slots = $request->input('slots');
        $data->fee = $request->input('fee');
        $data->slots_available = $request->input('slots');
        $data->lid = $lid ;
        $data->save();
    
        return redirect()->back()->with('message', ' Added Successfully');
    }

    public function booking_delete($id)
    {
        $data = Consultation::find($id);
        if ($data) 
        {
             $data->delete();
             return redirect()->back()->with('messagee', 'Deleted successfully');
        } 
        else 
        {
             return redirect()->back()->with('errore', 'Failed to delete ');
        }
    }

    public function bookings_view($id)
    {
        $data = DB::table('bookings')
                ->join('users', 'bookings.lid', '=', 'users.id')
                ->where('co_id', $id)
                ->get();
               
        return view('doctor.bookings_view',compact('data'));
    }

    public function book_now($id)
    {
        if (Auth::check()) 
        {
            $user = Auth::user();

            // Check if any required fields are empty
            if (empty($user->address) || empty($user->pin) || empty($user->gender) || empty($user->dob) || empty($user->image2)) {
                return redirect('view_profile')->with('message', 'Please update your bio for booking slots');

            }


        $currentDate = date('Y-m-d');
        $data = DB::table('doctors')
        ->join('consultations', 'doctors.lid', '=', 'consultations.lid')
        ->where('doctors.id', '=', $id)
        ->where('consultations.date', '>=', $currentDate)
        ->get();
        }
        else
        {
            return redirect('login');
        }
       

    
        return view('user.slots', compact('data'));
   
    }

    public function view_profile()
    {
        $lid = Auth::user()->id;
        $data = DB::table('users')
        ->where('id', $lid)
        ->get();
       
        return view('user.profile',compact('data'));
    }

    public function add_profile(Request $request, $id)
    {
        $data = User::find($id);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imagename);
            $data->image = $imagename;
        }
    
       
       
       
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->pin = $request->input('pin');
        $data->phone = $request->input('phone');   
        $data->dob = $request->input('dob');
        $data->gender = $request->input('gender');
      
        $data->save();
    
        return redirect()->back()->with('message', 'Address Added Successfully');
    }

    public function stripe($fee,$id)
    {
        return view('user.stripe', compact('fee','id'));
    }


    public function stripePost(Request $request,$fee,$id)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $fee * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for payment" 

        ]);

       

        $datas = DB::table('consultations')
                ->where('id', $id)
                ->first();
        
        $updatedSlots = $datas->slots_available - 1;

        $update = DB::table('consultations')
                    ->where('id', $id)
                    ->update(['slots_available' => $updatedSlots]);
     
                $data = new booking;

                $lid = Auth::user()->id;
                $name=  Auth::user()->name;
                $userEmail=  Auth::user()->email;

                $data->date = $datas->date;
                $data->bkey = uniqid();
                $data->dr_id = $datas->lid; 
                $data->lid = $lid;
                $data->co_id = $id;
                $data->amount = $fee;

                $data->save();
       

                    
        Session::flash('success', 'Payment successful!');

        Mail::to($userEmail)->send(new BookingMailer($name));

        return back();

    }

    public function appoinments_view()
    {
        $lid = Auth::user()->id;
        $data = Booking::where('lid', $lid)  
            ->get();
        return view('user.appoinments_view',compact('data'));
    }

    public function consultation_schedule($bkey)
    {
       
       
        return view('doctor.schedule',compact('bkey'));
    }





    public function user_videocall_join($url)
    {

    return view('user.videocall_join', compact('url'));

    }

    public function videocall_join($url)
    {
        return view('doctor.videocall_join', compact('url'));
    }

    public function registration()
    {
        return view('user.register');
    }


    public function upload_patient(Request $request)
    {
        // Handle the image upload
        if ($request->has('capturedImageData')) {
            $imageData = $request->input('capturedImageData');
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $fileName = uniqid() . '.png';
            $filePath = public_path('uploads/' . $fileName);
    
            // Save the image file to the specified path
            file_put_contents($filePath, base64_decode($imageData));
    
            
            $maxRegId = Patients::max('reg_id');

            // Increment the maxRegId to get the next available reg_id
            $regId = $maxRegId ? $maxRegId + 1 : 1000;
    
            // Save the patient details in the database
            $patient = new Patients();
            $patient->image = $fileName;
            $patient->name = $request->input('name');
            $patient->age = $request->input('age');
            $patient->dob = $request->input('dob');
            $patient->gender = $request->input('gender');
            $patient->blood = $request->input('blood');
            $patient->address = $request->input('address');
            $patient->pin = $request->input('pin');
            $patient->phone = $request->input('phone');
            $patient->email = $request->input('email');
            $patient->hid = $request->input('hid');
            $patient->reg_id = $regId;
            $patient->status = 0;
            $patient->save();
    
            // Send the registration confirmation email
            Mail::to($patient->email)->send(new RegistrationConfirmation($patient, $regId));
    
            // Display a success message with the generated ID
            session()->flash('message', 'Patient details uploaded successfully');

            // Redirect to a specific URL
            return redirect('/patient');
        }
    
        // Handle the case when no image is captured or an error occurred
        session()->flash('message', 'Failed to upload the patient details.');
        return redirect()->back();
    }
    
    public function patient()
    {
        $data = DB::table('patients')->orderBy('created_at', 'desc')->get();
    // dd($data);
        return view('user.patients_view',compact('data'));
    }

 

    public function patient_booking($reg_id)
    {
        $date = date('Y-m-d');
        
        
        $booking = new Booking;
        $booking->date = $date;
        $booking->bkey = uniqid();
        $booking->lid = $reg_id;
        $booking->save();

        
        Patients::where('reg_id', $reg_id)->update(['status' => 1]);

        session()->flash('message', 'Patient booked successfully');
        return redirect()->back();
    }


    public function bookings_view_today()
    {

        
        $dr_lid = Auth::user()->id;
        $date = date('Y-m-d');
        // dd($date);
        $data= DB::table('bookings')

                ->join('patients', 'bookings.lid', '=', 'patients.reg_id')
                ->where('bookings.date','=', $date)
                ->orderBy('patients.id', 'desc')
                ->get();

        return view('doctor.bookings_view',compact('data','dr_lid'));
    
    }

    public function consultation_schedule_upload(Request $request, $bkey)
    {
        //NB: Here bkey is reg_id of the table patient
        $booking = DB::table('Bookings')
            ->where('lid', $bkey)
            ->first();
    
        $userEmail = DB::table('patients')
            ->where('reg_id', $bkey)
            ->value('email');
    
        $dr_name = Auth::user()->name;

        $dr_id = Auth::user()->id;
    
        $name = DB::table('patients')
            ->where('reg_id', $bkey)
            ->value('name');
    
        if ($booking) {
            $time = $request->input('time');
            $url = $booking->url;
    
            if (!$url) {
                $roomHash = strval(rand(0, 999999));
                $roomName = 'observable-' . $roomHash;
                $url = $roomName;
            }
            
            Patients::where('reg_id', $bkey)->update(['status' => 1]);

            Booking::where('lid', $bkey)
                ->update(['time' => $time, 'url' => $url, 'dr_id' => $dr_id]);
        }
    
        Mail::to($userEmail)->send(new BookingMailer($name, $dr_name, $request->input('time')));

        
        session()->flash('message', 'Consultation scheduled successfully');

        // Redirect to a specific URL
        return redirect('/bookings_view_today');
    }
    
    public function contact()
        {
            $category =DB::table('categories')->get();
            return view('user.contact',compact('category'));
        }
    public function uploadcontact(Request $request)
        {
                $data = new contact;
                $data->name = $request->input('name');
                $data->email = $request->input('email');
                $data->phone = $request->input('phone');
                $data->subject = $request->input('subject');
                $data->message = $request->input('message');
                $data->save();
                return redirect()->back()->with('message', 'Contact Added Successfully');
        }

    
    






















}
