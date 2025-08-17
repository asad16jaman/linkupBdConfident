<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authCheck(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            $Cradentials = $request->only('username', 'password');
            if (Auth::attempt($Cradentials)) {
                return redirect()->intended('/dashboard')->with('success', 'Login Successful');
            }
            return redirect()->back()->withInput($request->only('username'))
                ->with('error', 'Username or Password was invalid.');
        } catch (\Exception $e) {
            return Redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function registration()
    {
        $users = User::latest()->get();
        return view('auth.register', compact('users'));
    }

    public function newUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'image' => 'mimes:jpg,png.jpeg,bmp',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand() . "." . $ext;
            $image->move('uploads/user', $imageName);
            $user->image = 'uploads/user/' . $imageName;
        }
        $user->save();
        if ($user) {

            $notification = array(
                'message' => 'New User Created Successfully',
                'alert-type' => 'success',
            );
            return back()->with($notification);
        }
        return redirect()->back()->withInput();
    }

    public function userEdit($id)
    {
        $users = User::latest()->get();
        $userData = User::find($id);
        return view('auth.register', compact('users', 'userData'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password) ?? '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . 'image' . '.' . $extenstion;
            $file->move('uploads/user/', $filename);
            $user->image = 'uploads/user/' . $filename;
        }

        $user->update();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('admin.registration')->with($notification);
    }

    public function userDelete(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user) {
                if (file_exists($user->image) and !empty($user->image)) {
                    unlink($user->image);
                }
                $user->delete();
            }

            return response()->json([
                'message' => 'Data Deleted Successfully',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'success' => false,
            ]);
        }
    }

    // password change
    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
        ]);

        $has_password = Auth::user()->password;
        if (Hash::check($request->old_password, $has_password)) {
            if (!Hash::check($request->password, $has_password)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('success', 'Password Change Successful');
            } else {
                return redirect()->back()->withInput();
            }
        } else {
            return 'password dose not match';
        }
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp',
        ]);

        $user = User::findOrFail(Auth::check());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $profileImage = $user->image;
        if ($request->hasfile('image')) {
            if (file_exists($user->image) && $user->image != null) {
                unlink($user->image);
            }
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = rand() . "." . $ext;
            $image->move('uploads/user', $imageName);
            $user->image = 'uploads/user/' . $imageName;
        }
        $user->update();
        if ($user) {
            $notification = array(
                'message' => 'Profile Update Successfully',
                'alert-type' => 'success',
            );
            return back()->with($notification);
        }
        return redirect()->back()->withInput();
    }
}
