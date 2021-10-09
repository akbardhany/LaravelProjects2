<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Contents;
  
  
class AuthController extends Controller
{
    public function dashboard(){
        $contents = Contents::latest()->paginate(25);
        return view('dashboard', ['contents' => $contents]);
        // return view('dashboard');
    }
    // public function selectSearch(Request $request)
    // {
    //     $contents = [];
    //     if ($request->has('q')) {
    //         $search = $request->q;
    //         $contents = Contents::select('*')
    //             ->where('contents', 'LIKE', "%$search%")
    //             ->get();
    //     }
    //     return response()->json($contents);
    // }
    
    // public function selectSearch(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $output = '';
    //         $query = $request->get('query');
    //         if($query != '')
    //         {
    //             $data = Contents::select('*')
    //                 ->where('contents', 'LIKE', "%$search%")
    //                 ->get();
    //         } else {
    //             $data = Contents::latest()->get();
    //         }
    //         $total_row = $data->count();
    //         if($total_row > 0)
    //         {
    //             foreach($data as $row)
    //         {
    //             $output .= '<p>'.$row->contents.'</p>';
    //         }
    //         } else {
    //             $output = '<p>No data Found</p>';
    //         }

    //         $data = array(
    //         'table_data'  => $output,
    //         'total_data'  => $total_row
    //         );

    //         echo json_encode($data);
    //     }
    // }

    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('admin.index');
        }
        return view('login');
    }
  
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('admin.index');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
  
    }
  
    public function showFormRegister()
    {
        return view('register');
    }
  
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('dashboard');
    }
  
  
}