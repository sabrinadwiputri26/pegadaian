<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit($pegadaian_id)
    {
       $pegadaian = Response::where('pegadaian_id', $pegadaian_id)->first();
       $pegadaianId = $pegadaian_id;
       return view('response', compact('pegadaian', 'pegadaianId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pegadaian_id)
    {
        $request->validate([
            'status' => 'required',
            'pesan' => 'required',
        ]);
        if($request->status == 'ditolak'){
            $pesan = '-';
        }
        else{
            $pesan = $request->pesan;
        }

        Response::updateOrCreate(
            [
                'pegadaian_id' => $pegadaian_id,
            ],
            [
                'status' => $request->status,
                'pesan' => $pesan,  
            ]     
        );
    return redirect()->route('petugas')->with('responseSuccess', 'Berhasil mengubah response!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
