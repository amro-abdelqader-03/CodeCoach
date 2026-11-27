<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginForm(){if(auth()->check() && auth()->user()->role==='admin')return redirect()->route('admin.dashboard');return view('auth.login');}
    public function adminLoginForm(){if(auth()->check() && auth()->user()->role==='admin')return redirect()->route('admin.dashboard');return view('auth.admin-login');}
    public function registerForm(){return view('auth.register');}
    public function login(Request $r){$data=$r->validate(['email'=>'required|email','password'=>'required']); if(!Auth::attempt($data+['role'=>'user'],$r->boolean('remember'))) return back()->withErrors(['email'=>'بيانات المستخدم غير صحيحة'])->onlyInput('email'); $r->session()->regenerate(); return redirect()->intended(route('profile'));}
    public function adminLogin(Request $r){$data=$r->validate(['email'=>'required|email','password'=>'required']); if(!Auth::attempt($data+['role'=>'admin'],$r->boolean('remember'))) return back()->withErrors(['email'=>'بيانات المدير غير صحيحة'])->onlyInput('email'); $r->session()->regenerate(); return redirect()->intended(route('admin.dashboard'));}
    public function register(Request $r){$d=$r->validate(['name'=>'required|string|max:255','email'=>'required|email|unique:users,email','password'=>'required|string|min:8|confirmed']); $user=User::create($d+['role'=>'user']); Auth::login($user); $r->session()->regenerate(); return redirect()->route('profile');}
    public function logout(Request $r){$route=$r->user()?->role==='admin'?'admin.login':'login';Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route($route);}
}
