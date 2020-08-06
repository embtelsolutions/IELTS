<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Teachers;
use App\Mail\teachermail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Input;
use Auth;
use Mail;

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
    protected $redirectTo = '/home';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        //abort_unless(config('access.registration'), 404);
        if(Auth::guard('user')->check())
        {
            return redirect()->route('front.index');
        }
        return view('admin.registration');
        
        // ->withSocialiteLinks((new Socialite)->getSocialLinks());
    }
     /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function register(Request $request)
    {
		// dd($request);
        $validator = $this->validator($request);

        if ($validator->passes()) {
            // Store your user in database
            $user = $this->create($request->all());
            event(new Registered($user));
            //Auth::login($user, true);
            // return response(['success' => true]);
            session()->flash('message', "You've Successfully registered");
            return redirect()->back();
        }
        // session()->flash('errors', $validator->errors());
        return redirect()->back()->with('errors',$validator->errors());
        // return response(['errors' => $validator->errors()]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return Validator::make( Input::all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'role'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>$data['role'],
        ]);
        $user->save();
        return response(['success' => 'Account Registered Successfully.']);
        // return redirect()->back();
    }
    protected function validatorTeacher(Request $request)
    {
        return Validator::make( Input::all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'qualification' => ['required', 'string'],
            'experience' => ['required', 'integer'],
            'photo' => ['required'],
            'subjects' => ['required','string'],
            'about' => ['required'],
            'password'=>['required'],
            'confirm_pass'=>['same:password']
        ]);
    }

    public function ShowRegisterTeacher(){
        return view('admin.registration-teacher');
    }
    public function registerTeacher(Request $request){
        // dd($request->all());
        $validator = $this->validatorTeacher($request);

        if ($validator->passes()) {
            // Store your teacher in database
            $user = new User;
            $user->name=$request->name ;
            $user->email=$request->email;
            $user->mobile=$request->contact_no;
            $user->role="Teacher";
            $user->institute_id=$request->icode;
            $user->password=bcrypt($request->password);
            $user->save();
            $teachers = new Teachers();
            $teachers->user_id =  $user->id;
            
            $teachers->qualification = $request->qualification;
            $teachers->experience = $request->experience;
            if($files = $request->file('photo')){
                $name = time().'_'.$files->getClientOriginalName();
                $target = public_path().'/storage/uploads';
                $files->move($target, $name);
                $teachers->photo = $name;
            }
            if($files_video = $request->file('video')){
                $name = time().'_'.$files_video->getClientOriginalName();
                $target = public_path().'/storage/uploads';
                $files_video->move($target, $name);
                
                $teachers->subjects = $name;
            }
            $teachers->experience = $request->experience;
            $teachers->subjects = $request->subjects;
            $teachers->about = $request->about;

            // dd($teachers);
            $teachers->save();
            // $this->sendmail($request->name,$request->email);

            session()->flash('message', "You've Successfully registered");
            return redirect()->back();
        }else{
            // dd($validator->errors());
            return redirect()->back()->with('errors',$validator->errors());

        }

    }
    public function sendmail($name ,$email){
            Mail::to($email)->send(new teachermail($name));
    }
}
