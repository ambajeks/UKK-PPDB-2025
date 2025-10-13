<?php
namespace App\Http\Controllers;

use App\Models\Wali;
use App\Models\FormulirPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliController extends Controller
{
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $data = Wali::whereHas('formulir', fn($q)=>$q->where('user_id',Auth::id()))->paginate(10);
        return view('wali.index',compact('data'));
    }

    public function create(){
        $formulirs = FormulirPendaftaran::where('user_id',Auth::id())->get();
        return view('wali.create',compact('formulirs'));
    }

    public function store(Request $r){
        $d=$r->validate(['formulir_id'=>'required|exists:formulir_pendaftaran,id','nama_wali'=>'required']);
        Wali::create($d);
        return redirect()->route('wali.index')->with('success','Data wali tersimpan');
    }

    public function edit(Wali $wali){ return view('wali.edit',compact('wali')); }

    public function update(Request $r, Wali $wali){
        $wali->update($r->all());
        return redirect()->route('wali.index')->with('success','Data wali diperbarui');
    }
}
