<?php

namespace App\Http\Controllers;

use App\Models\BidangModel;
use App\Models\KategoriModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('dt_userBidang', 'dt_userKategori')->get();
        return view('users.index',[
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');


        $bidang = BidangModel::get();
        $kategori = KategoriModel::get();
        return view('users.create', compact(['bidang', 'kategori'])); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $this->validate($request, [
                'username' => 'required',
                'name' => 'required',
                'bidang_id' => 'required',
                'kategori_id' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]);
            User::create($data);
            return redirect()->route('users.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view('users.show',['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware(function($request, $next){
        if(Gate::allows('manage-users')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

}
