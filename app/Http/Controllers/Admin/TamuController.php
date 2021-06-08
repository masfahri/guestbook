<?php

namespace App\Http\Controllers\Admin;

use Session;

use App\Models\TamuModel;
use Illuminate\Http\Request;
use App\Http\Requests\TamuRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TamuModel $tamuModel)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamuRequest $request, TamuModel $tamuModel)
    {
        try {
            $validator = Validator::make($request->all());
            DB::beginTransaction();
            $tamuModel->nama = ucwords(strtolower($request->nama));
            $tamuModel->email = strtolower($request->email);
            $tamuModel->instansi = ($request->instansi);
            $tamuModel->keperluan = ($request->keperluan);
            $tamuModel->kontak = ($request->kontak);
            $tamuModel->_meta = '';
            $simpan = $tamuModel->save();
            DB::commit();
            Session::flash('success', 'Selamat Datang '.$request->nama);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th->getMessage());
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
