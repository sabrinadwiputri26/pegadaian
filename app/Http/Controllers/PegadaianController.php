<?php

namespace App\Http\Controllers;

use App\Models\pegadaian;
use Illuminate\Http\Request;
use Carbon\Carbonx;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\PegadaiansExport;
use App\Models\Response;
// use App\Http\Controllers\pegadaianController\Auth;

class PegadaianController extends Controller
{
    public function exportPDF()
    {
        $data = Pegadaian::with('response')->get()->toArray();
        view()->share('pegadaians',$data);
        $pdf = PDF::loadView('dashboard.print',$data)->setPaper('a4', 'landscape');
        return $pdf->download('data_pegadaian_keseluruhan.pdf');
    }

    public function createdPDF($id)
    {
    $data = Pegadaian::with('response')->where('id',$id)->get()->toArray();
    view()->share('pegadaians',$data);
    $pdf = PDF::loadView('dashboard.print',$data);
    return $pdf->download('data_pegadaian.pdf');
}

    public function exportExcel()
    {
    $file_name = 'data_keseluruhan_pegadaian.xlsx';
    return Excel::download(new PegadaiansExport,$file_name);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pegadaian = Pegadaian::orderBy('created_at', 'DESC')
        ->simplePaginate(2);
        return view ('dashboard.home', compact('pegadaian'));
    }

    public function auth(Request $request)
    {
       $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required',
       ]);

       $user = $request->only('email', 'password');
       if(Auth::attempt($user)){
        if (Auth::user()->role == 'admin') {
            return redirect()->route('data');
        }elseif(Auth::user()->role == 'petugas') {
            return redirect()->route('data.petugas');
        }

       }else {
        return redirect()->back()->with('gagal', 'Gagal login, coba lagi!');
       }
    }


    
    public function login()
    {
        return view ('dashboard.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

        
    
    public function data(Request $request)
    {
        $search = $request->search;
        $pegadaians = Pegadaian::with('response')->Where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        return view ('dashboard.data', compact('pegadaians'));
    }

    public function petugas(Request $request)
    {
        $search = $request->search;
        $pegadaians = Pegadaian::with('response')->orderBy('created_at', 'DESC')->get();
        return view ('dashboard.petugas', compact('pegadaians'));
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
        // dd($request->all());
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'no' => 'required|max:13',
            'pegadaian' => 'required|min:5',
            'foto' => 'required|image|mimes:jpeg,jpg,png,svg,webp',
        ]);

        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $path = public_path('assets/image/');
        $image->move($path, $imgName);

        Pegadaian::create([
            'nik'=> $request->nik,
            'nama' => $request->nama,
            'no' => $request->no,
            'pegadaian' => $request->pegadaian,
            'foto' => $imgName,
        ]);
        return redirect()->back()->with('success', 'Berhasil mengirim data pegadaian!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pegadaian  $pegadaian
     * @return \Illuminate\Http\Response
     */
    public function show(pegadaian $pegadaian)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pegadaian  $pegadaian
     * @return \Illuminate\Http\Response
     */
    public function edit(pegadaian $pegadaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pegadaian  $pegadaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pegadaian $pegadaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pegadaian  $pegadaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegadaian::where('id', $id)->firstOrFail();
        $image = public_path('assets/image/'.$data['foto']);
        unlink($image);
        $data->delete();
        Response::where('pegadaian_id',$id)->delete();
        return redirect()->back();
    }
}
