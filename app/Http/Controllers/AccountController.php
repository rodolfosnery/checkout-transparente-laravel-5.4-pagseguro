<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {

    }
    public function orders()
    {
        $orders = Auth::user()->orders;
        return view('accounts.orders', compact('orders'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('accounts.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()
            ->route('account.edit', $id)
            ->withSuccess('Alterado com sucesso!');
    }


}
