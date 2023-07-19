<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\doctor;
use App\Models\category;
use App\Models\contact;
use App\Models\patients;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Mail\ContactMailer;
use App\Mail\DoctorCreated;
use App\Mail\StaffCreated;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    

    public function add_doctor()
    {
        $category=category::all();
        return view('admin.add_doctor',compact('category'));
        
    }

    public function add_staff()
    {
      
        return view('admin.add_staff');
        
    }
    
    public function view_category()
    {
        $datas=category::all();
        return view('admin.category',compact('datas'));
    }

    public function add_category(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;
        $data->description=$request->desc;
        $data->save();
        if ($data->save()) {
            return redirect()->back()->with('message', 'Category added successfully');
        } else {
            return redirect()->back()->with('error','Failed to add category');
        }

    }

    public function delete_category($id)
    {
        $data = category::find($id);

            if ($data) 
            {
                 $data->delete();
                 return redirect()->back()->with('messagee', 'Category deleted successfully');
            } 
            else 
            {
                 return redirect()->back()->with('errore', 'Failed to delete category');
            }
    }

    public function edit_category($id)
    {
        $datas=category::find($id);
        return view('admin.category_edit',compact('datas'));
    }

    public function category_edit(Request $request ,$id)
    {
        $datas=category::find($id);
        $datas->category_name = $request->input('category_name');
        $datas->save();
        return redirect()->back()->with('message', 'Category Edited Successfully');
    }


    public function upload_doctor(Request $request)
    {
      
        $data = new doctor;
        $user = new user;
    
        
    if ($request->hasFile('file')) {
        $image = $request->file('file');
        $imagename = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imagename);
        $data->image = $imagename;
    }

   
    if ($request->hasFile('file1')) {
        $image1 = $request->file('file1');
        $imagename1 = uniqid() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('uploads'), $imagename1);
        $data->image1 = $imagename1;
    }

    
    if ($request->hasFile('file2')) {
        $image2 = $request->file('file2');
        $imagename2 = uniqid() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('uploads'), $imagename2);
        $data->image2 = $imagename2;
    }


        $data->name = $request->input('name');
        $data->gender = $request->input('gender');
        $data->address = $request->input('address');  
        $data->category_name = $request->input('category');       
        $data->pin = $request->input('pin');
        $data->phone = $request->input('phone');
        $data->dob = $request->input('dob');
        $data->email = $request->input('email');
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->usertype = $usertype ?? '2';
        $user->status = $status ?? '1';
        $user->password = Hash::make($request->input('phone'));
      
        $user->save();

        $data->lid = $user->id; 

        $data->save();
        Mail::to($data->email)->send(new DoctorCreated($data->name, $request->input('phone'))); // Use the 'phone' instead of 'password'
        return redirect()->back()->with('message', 'Doctor Added Successfully');





    }

    public function upload_staff(Request $request)
    {
      
       
        $data = new user;

        $data->name = $request->input('name');
       
        $data->email = $request->input('email');
        
        $data->phone = $request->input('phone');
        $data->usertype = $usertype ?? '1';
        $data->status = $status ?? '1';
        $data->password = Hash::make($request->input('phone'));
      
        $data->save();

       

        $data->save();
        Mail::to($data->email)->send(new StaffCreated($data->name, $request->input('phone'))); 
        return redirect()->back()->with('message', 'Doctor Added Successfully');





    }


    

    public function doctor_view()
    {
        $data =  DB::table('Users')
        ->join('doctors', 'doctors.lid', '=', 'users.id')
        ->get();
        return view('admin.doctor_view', compact('data'));
    }


    public function doctor_delete($lid,$id)
    {
        
        $data = User::find($lid);
        $dataa= Doctor::find($id);
    
        if ($data && $dataa) 
        {
             $data->delete();
             $dataa->delete();
             return redirect()->back()->with('messagee', 'Deleted successfully');
        } 
        else 
        {
             return redirect()->back()->with('errore', 'Failed to delete ');
        }
    }

   function doctor_approve($lid)
   {
    $data = User::find($lid);
    $data->status = $status ?? '1';
    $data->save();
    return redirect()->back()->with('message', 'Approved Successfully');
   }

   function doctor_reject($lid)
   {
    $data = User::find($lid);
    $data->status = $status ?? '0';
    $data->save();
    return redirect()->back()->with('message', 'Customer Rejected Successfully');
   }


    public function patient_view()
    {
        $data = DB::table('patients')
       
        ->get();
        return view('admin.patient_view', compact('data'));
    }

    public function patient_delete($id)
    {
        $data = patients::find($id);
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

   function patient_approve($id)
   {
    $data = patients::find($id);
    $data->status = $status ?? '1';
    $data->save();
    return redirect()->back()->with('message', 'Approved Successfully');
   }

   function patient_reject($id)
   {
    $data = patients::find($id);
    $data->status = $status ?? '0';
    $data->save();
    return redirect()->back()->with('message', 'Rejected Successfully');
   }


   public function staff_view()
   {
       $data = DB::table('users')
       ->where('usertype','=', '1')
       ->get();
       return view('admin.staff_view', compact('data'));
   }

   public function staff_delete($id)
   {
       $data = user::find($id);
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

  function staff_approve($id)
  {
   $data = user::find($id);
   $data->status = $status ?? '1';
   $data->save();
   return redirect()->back()->with('message', 'Approved Successfully');
  }

  function staff_reject($id)
  {
   $data = user::find($id);
   $data->status = $status ?? '0';
   $data->save();
   return redirect()->back()->with('message', 'Rejected Successfully');
  }



  
    public function contact_view()
    {
        $data = contact::all();
        return view('admin.contact_view', compact('data'));
    }

    public function contact_reply_view($id)
    {
        $data = contact::find($id);
        return view('admin.contact_reply_view', compact('data'));
    }

    public function contact_reply(Request $request, $id)
    {
        $data = contact::find($id);
        $data->reply = $request->input('reply');
        $data->save();
        if ($data) {
            
            $reply = $data->reply;
            $email = $data->email;
            $messagee = $data->message;
            $name = $data->name;
 
            // Send the email without image attachment
            Mail::to($email)->send(new ContactMailer($reply,$messagee,$name));
        }
        return redirect()->back()->with('message', 'Replied Successfully');
    }








}
