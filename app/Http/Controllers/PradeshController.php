<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PradeshController extends Controller
{
        public function PradeshDashboard()
    {
        $profileData=User::with('createdBy')->WhereNot('role','pradesh')->WhereNot('role', 'admin')->get();
        return view('pradesh.pradesh_dashboard',compact('profileData'));
    }


    public function PradeshLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function PradeshLogin()
    {
        return view('pradesh.pradesh_login');
    }


    public function pradeshProfile()
    {
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('pradesh.pradesh_profile',compact('profileData'));
    }


    public function PradeshData()
    {
        $id=Auth::user()->id;
        $profileData=User::WhereNot('role','admin')->get();
    return view('pradesh.pradesh_data',compact('profileData'));

    }


    public function Pradeshcreate()
    {
        return view('pradesh.pradesh_create');

    }


    public function PradeshStore(Request $request)
  {
    //validate input
    $validated=$request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
        'address'=>'required',
        'phone'=>'required',
        'salary'=>'required'
    ] );

    User::create($validated + [
        'created_by'=> auth()->user()->id
    ]);
   
    toast('User Update Successfully', 'success');

    return back()->with('success', 'User created successfully.');
}
    public function PradeshDelete(string $id,Request $request){
        $user = User::findOrFail($id);
    
        $user->delete();

        return redirect()->route('pradesh.data')->with('success', 'product deleted successfully');
    }

    //update profile
    public function PradeshProfileUpdate(Request $request)
    {
        
        $id=Auth::user()->id;
    $data=User::find($id);
    $data->name=$request->name;
    $data->email=$request->email;
    $data->address=$request->address;
    $data->phone=$request->phone;
    $data->photo=$request->photo;
    $data->update();
        toast('User Update Successfully', 'success');
        return redirect()->route('pradesh.data');

    }

    public function PradeshEdit(string $id,Request $request)
    {
        $user = User::findOrFail($id);
 
        return view('pradesh.pradesh_edit', compact('user'));
    }


    public function PradeshUpdate(Request $request,string $id)
    {
        $validated=$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address'=>'required',
            'salary'=>'required',
            'phone'=>'required',
            'role' => 'required'
        ]);
    
        $user=User::where('id',$id)->first();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'salary'=>$request->salary,
            'role'=>$request->role,
        ]);
        $user->update();
        toast('User Update Successfully', 'success');
        return redirect()->route('pradesh.data')->with('success', 'user updated successfully');
    }    

}
