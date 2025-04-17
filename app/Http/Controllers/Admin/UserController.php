<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
    $users = User::orderBy('created_at', 'desc')->get();
       $title = 'Users';
       $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'User', 'url' => route('admin.users')],
    ];
      return view('admin.users.index', compact('users', 'title', 'breadcrumbs'));
   }

   public function show($id)
   {
     $users = User::find($id);
     $title = 'View User';
     $breadcrumbs = [
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'User', 'url' => route('admin.users')],
        ['label' => 'View', 'url' => route('admin.users.show', $id)]
     ];
        return view('admin.users.show', compact('users', 'title', 'breadcrumbs'));
   }
}
