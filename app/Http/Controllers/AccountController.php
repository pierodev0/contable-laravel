<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\StoreRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin')->only('create','edit','destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        $total = $accounts->sum('amount');
        $latestUpdate = null;
        if(!$accounts->isEmpty()){

            $latestUpdate = Account::orderBy('updated_at', 'desc')->first()->updated_at->format('Y-m-d');
        }
        

        return view('accounts.index', compact('accounts', 'total', 'latestUpdate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('accounts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {


        $request->request->add(['user_id' => auth()->user()->id]);
        $all = $request->all();

        if (is_null($request->get('amount'))) {
            unset($all['amount']);
        }

        Account::create($all);

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {

        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', [
            "account" => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {

        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'number' => 'nullable|unique:accounts,type,' . $account->id
        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')->with('updated', 'Cuenta actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'ok');
    }
}
