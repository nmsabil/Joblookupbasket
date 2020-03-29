<?php namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller {
    public function loginView() {
        return view('admin.login');
    }

    public function login() {
        if(Auth::attempt(['email' => request()->input('email'), 'password' => request()->input('password')])) {
            return redirect()->intended('admin/show-all-users');
        }
    }

    public function showAllUsersView() {
        $users = Subscriber::where('email_verification_token', '')->get();
        return view('admin.show_all_users', ['users' => $users]);
    }
}
