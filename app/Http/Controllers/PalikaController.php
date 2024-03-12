<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PalikaController extends Controller
{
        public function PalikaDashboard()

    {

        $salary=User::where('role' ,'user')->sum('salary');
        $id=Auth::User()->id;
        $profile=User::find($id);
        $profileData=User::with('createdBy')->WhereNot('role','pradesh')->WhereNot('role', 'admin')->WhereNot('role', 'Palika')->get();
        $totalAllUsers=User::count();
        $totalUser=User::where('role','user')->count();
        $totalAdmin=User::where('role','admin')->count();
        $totalPalika=User::where('role','Palika')->count();
        $totalPradesh=User::where('role','Pradesh')->count();
        $totalUsers=$totalUser + $totalPalika+ $totalAdmin +$totalPradesh;
        $totalUser=User::where('role','user')->count();
        $totalAdmin=User::where('role','admin')->count();
        $totalPradesh=User::where('role','Pradesh')->count();
       return view('palika.palika_dashboard',compact('totalUsers','totalAdmin','profile', 'totalPradesh','profileData','salary'));
    }
    public function PalikaLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function PalikaLogin()
    {
        return view('palika.palika_login');
    }
    public function palikaProfile()
    {
        $id=Auth::user()->id;
        $profileData=User::find($id);
        return view('palika.palika_profile',compact('profileData'));
    }
    public function PalikaData()
    { 
        $id=Auth::user()->id;
        $profileData=User::WhereNot('role','pradesh')->WhereNot('role', 'admin')->WhereNot('role', 'Palika')->get();
    return view('palika.palika_data',compact('profileData'));

    }
    public function Palikacreate()
    {
        return view('palika.palika_create');

    }
    public function PalikaStore(Request $request)
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
    dd($validated);
    User::create($validated + [
        'created_by'=> auth()->user()->id
    ]);

    toast('Palika Added Successfully', 'success');

    return back()->with('success', 'User created successfully.');
}

public function PalikaDelete(string $id,Request $request){
    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('palika.data')->with('success', 'product deleted successfully');
}
    public function PalikaEdit(string $id,Request $request)
    {
        $user = User::findOrFail($id);
 
        return view('palika.palika_edit', compact('user'));
    }
 
    public function PalikaUpdate(Request $request,string $id)
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
    return redirect()->route('palika.data')->with('success', 'user updated successfully');
  
}
  public function PalikaProfileUpdate(Request $request)
  {
    $id=Auth::user()->id;
    $data=User::find($id);
    $data->name=$request->name;
    $data->email=$request->email;
    $data->address=$request->address;
    $data->phone=$request->phone;
    $data->photo=$request->photo;
    $data->update();
    return redirect()->back();
}
}