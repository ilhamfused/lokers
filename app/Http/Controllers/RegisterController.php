<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\JobseekerProfile;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexCompany()
    {
        return view('front.register.register', [
            'title' => 'Company',
            'method' => 'storeCompany',
        ]);
    }

    public function indexJobseeker()
    {
        return view('front.register.register', [
            'title' => 'Jobseeker',
            'method' => 'storeJobseeker',
        ]);
    }

    public function storeCompany(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'username' => 'required|max:30|unique:company_profiles',
            'name' => 'required|max:255',
        ]);

        $validatedDataUser = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);
        $validatedDataUser['role_id'] = 2;
        $user = User::create($validatedDataUser);


        $validatedDataCompany = [
            'username' => $validatedData['username'],
            'name' => $validatedData['name']
        ];
        $validatedDataCompany['user_id'] = $user->id;
        CompanyProfile::create($validatedDataCompany);


        // $request->session()->flash('success', 'Registration successfull! please login');
        return redirect('/login')->with('success', 'Registration successfull! please login');
    }

    public function storeJobseeker(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255',
            'username' => 'required|max:30|unique:jobseeker_profiles',
            'name' => 'required|max:255',
        ]);
        $validatedDataUser = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);
        $validatedDataUser['role_id'] = 3;
        $user = User::create($validatedDataUser);


        $validatedDataJobseeker = [
            'username' => $validatedData['username'],
            'name' => $validatedData['name']
        ];
        $validatedDataJobseeker['user_id'] = $user->id;
        JobseekerProfile::create($validatedDataJobseeker);


        // $request->session()->flash('success', 'Registration successfull! please login');
        return redirect('/login')->with('success', 'Registration successfull! please login');
    }
}
