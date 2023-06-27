<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Rules\EmailValidationRule;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', new EmailValidationRule],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'branch' => ['required'],
            'year' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // $newImageName = time() . '-' . 'profile_image' . '.' .
        //     $data['image_path']->extension();

        // $data['image_path']->move(public_path('images'), $newImageName);

        $user =  User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'branch_id' => $data['branch'],
            'year_id' => $data['year'],
        ]);

        // dd(storage_path('pic5.jpg'));
        $user->addMedia(storage_path('pic5.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('profile_picture');
        $user->assignRole('Student');
        $user->designation_id = Qs::designationIDStudent();
        return $user;
    }
}
