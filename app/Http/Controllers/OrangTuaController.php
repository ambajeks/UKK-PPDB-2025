<?php
namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\FormulirPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrangTuaController extends Controller
{
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $data = OrangTua::whereHas('formulir', fn($q)=>$q->where('user_id',Auth::id()))->paginate(10);
        return view('orangtua.index',compact('data'));
    }

    public function create(){
        $formulirs = FormulirPendaftaran::where('user_id',Auth::id())->get();
        return view('orangtua.create',compact('formulirs'));
    }

    public function store(Request $r){
        $d=$r->validate(['formulir_id'=>'required|exists:formulir_pendaftaran,id','nama_ayah'=>'nullable','nama_ibu'=>'nullable']);
        OrangTua::create($d);
        return redirect()->route('orangtua.index')->with('success','Data orang tua tersimpan');
    }

    public function edit(OrangTua $orangtua){ return view('orangtua.edit',compact('orangtua')); }

    public function update(Request $r, OrangTua $orangtua){
        $orangtua->update($r->all());
        return redirect()->route('orangtua.index')->with('success','Data diperbarui');
    }
}
