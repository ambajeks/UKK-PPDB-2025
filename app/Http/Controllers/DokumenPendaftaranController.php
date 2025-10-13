<?php
namespace App\Http\Controllers;

use App\Models\DokumenPendaftaran;
use App\Models\FormulirPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenPendaftaranController extends Controller
{
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $dokumens = DokumenPendaftaran::whereHas('formulir', function($q){
            if(!Auth::user()->hasRole('admin'))
                $q->where('user_id',Auth::id());
        })->paginate(20);
        return view('dokumen.index',compact('dokumens'));
    }

    public function create(){
        $formulirs = FormulirPendaftaran::where('user_id',Auth::id())->get();
        return view('dokumen.create',compact('formulirs'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'formulir_id'=>'required|exists:formulir_pendaftaran,id',
            'jenis_dokumen'=>'required|string|max:50',
            'path_file'=>'required|file|max:5120'
        ]);
        $data['path_file']=$request->file('path_file')->store('dokumen','public');
        DokumenPendaftaran::create($data);
        return redirect()->route('dokumen.index')->with('success','Dokumen diupload');
    }

    public function show(DokumenPendaftaran $dokumen){
        if(!Auth::user()->hasRole('admin') && $dokumen->formulir->user_id!=Auth::id()) abort(403);
        return view('dokumen.show',compact('dokumen'));
    }

    public function destroy(DokumenPendaftaran $dokumen){
        if(!Auth::user()->hasRole('admin') && $dokumen->formulir->user_id!=Auth::id()) abort(403);
        Storage::disk('public')->delete($dokumen->path_file);
        $dokumen->delete();
        return redirect()->route('dokumen.index')->with('success','Dokumen dihapus');
    }
}
