<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
class AdminController extends Controller
{
public function AdminDashboard()
{
    
    
    $id=Auth::user()->id;
    $profileData=User::all();
    $totalAllUsers=User::count();
    
    $totalUser=User::where('role','user')->count();
    $totalPalika=User::where('role','Palika')->count();
    $totalPradesh=User::where('role','Pradesh')->count();
    $totalUser=User::where('role','user')->count();
    $totalUsers=$totalUser +  $totalPalika +$totalPradesh+ $totalUser;

    $salary=User::sum('salary');
    $pradeshsalary=User::where('role','pradesh')->sum('salary');
    $palikasalary=User::where('role','palika')->sum('salary');
    $usersalary=User::where('role','user')->sum('salary');

    return view('admin.admin_dashboard',compact('totalUsers','totalPalika','totalPradesh','totalUser','profileData','salary','pradeshsalary','palikasalary','usersalary'));
}
public function AdminLogout(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}
public function AdminLogin()
{
    return view('admin.admin_login');
}
public function AdminProfile()
{
    $id=Auth::user()->id;
    $profileData=User::find($id);
    return view('admin.admin_profile',compact('profileData'));
}
public function AdminData()
{
    $id=Auth::user()->id;
    $profileData=User::all();
 return view('admin.admin_data',compact('profileData'));

}
public function PradeshDashboard()
{
    return view('pradesh.pradesh_dashboard');
}
public function Admincreate()
{
    return view('admin.admin_create');
}
public function AdminStore(Request $request)
{
    //validate input
    $validated=$request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required',
        'address'=>'required',
        'salary'=>'required'
    ]);

    // $user = new User();
    // $user->name = $request->name;
    // $user->email = $request->email;
    // $user->password = Hash::make($request->password);
    // $user->role = $request->role;
    // $user->save();

    User::create($validated + [
        'created_by'=> auth()->user()->id
    ]);

    return back()->with('success', 'User/Admin created successfully.');

}
  public function AdminDelete(string $id,Request $request){
    $user = User::findOrFail($id);
 
    $user->delete();

    return redirect()->route('admin.data')->with('success', 'product deleted successfully');
}
public function AdminEdit(string $id,Request $request)
    {
        $user = User::findOrFail($id);
 
        return view('admin.admin_edit', compact('user'));
    }
 
public function AdminUpdate(Request $request,string $id)
{
    $validated=$request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable',
        'salary'=>'required',
        'role' => 'required',
    ]);
    $user=User::where('id',$id)->first();

    $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'salary'=>$request->salary,
        'password'=> Hash::make('1234'),
        'role'=>$request->role,
    ]);
    // $user->update();
    return redirect()->route('admin.data')->with('success', 'product deleted successfully');
}
  
public function AdminProfileUpdate(Request $request)
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
    return redirect()->route('admin.data');

}

}
