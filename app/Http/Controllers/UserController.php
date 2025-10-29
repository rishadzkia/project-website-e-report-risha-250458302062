<?php 
namespace App\Http\Controllers; 
use App\Models\User; 
use Illuminate\Http\Request; 
class UserController extends Controller { 
    public function indexUser(){ 
        $user = User::all(); 
        return view('Admin.dataUser.indexDU', compact('user')); 
    } 
    
    public function createUser(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required|unique:users',
        'nik' => 'required|unique:users',
        'gender' => 'required',
        'role' => 'required',
        'password' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ]);

    $filename = null;
    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/usersImages', $filename);
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'nik' => $request->nik,
        'image' => $filename,
        'address' => $request->address,
        'gender' => $request->gender,
        'role' => $request->role,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->back()->with('success', "Data Berhasil Ditambahkan!");
}
}