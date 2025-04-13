<?php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function profile()
    {
        $account = Auth::user(); // hoặc Account::find(Auth::id())
        return view('user.account_profile', compact('account'));
    }

    public function updateAccount(Request $request)
    {
        $account = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'gender' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ]);

        $account->update($request->only([
            'username', 'gender', 'phone', 'email', 'birth_date', 'address'
        ]));

        return redirect()->route('account.profile')->with('success', 'Cập nhật thành công!');
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|min:6',
            'gender' => 'required|in:0,1',
            'phone' => 'nullable|max:15',
            'email' => 'nullable|email|max:255',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        $account = Account::create($validated);
        return redirect()->route('accounts.index');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    // Controller Method
public function update(Request $request, $id)
{
    $request->validate([
        'username' => 'required|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|max:15',
        'gender' => 'required|boolean',
    ]);

    // Lấy tài khoản từ database
    $account = Account::findOrFail($id);

    // Cập nhật thông tin tài khoản
    $account->username = $request->input('username');
    $account->email = $request->input('email');
    $account->phone = $request->input('phone');
    $account->gender = $request->input('gender');

    // Lưu lại dữ liệu
    $account->save();

    return redirect()->route('accounts.index')->with('success', 'Tài khoản đã được cập nhật!');
}


    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index');
    }
}
