<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct(){ $this->middleware(['auth','can:admin']); }

    public function index(){
        $kelas = Kelas::with('jurusan')->paginate(20);
        return view('kelas.index',compact('kelas'));
    }

    public function create(){
        $jurusans = Jurusan::all();
        return view('kelas.create',compact('jurusans'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'jurusan_id'=>'required|exists:jurusan,id',
            'nama_kelas'=>'required|string|max:100',
            'tipe_kelas'=>'required|in:Reguler,Unggulan',
            'kapasitas'=>'required|integer|min:0',
            'tahun_ajaran'=>'required|digits:4'
        ]);
        Kelas::create($data);
        return redirect()->route('kelas.index')->with('success','Kelas dibuat');
    }

    public function show(Kelas $kela){
        return view('kelas.show',['kelas'=>$kela]);
    }

    public function edit(Kelas $kela){
        $jurusans = Jurusan::all();
        return view('kelas.edit',['kelas'=>$kela,'jurusans'=>$jurusans]);
    }

    public function update(Request $request, Kelas $kela){
        $data = $request->validate([
            'jurusan_id'=>'required|exists:jurusan,id',
            'nama_kelas'=>'required|string|max:100',
            'tipe_kelas'=>'required|in:Reguler,Unggulan',
            'kapasitas'=>'required|integer|min:0',
            'tahun_ajaran'=>'required|digits:4'
        ]);
        $kela->update($data);
        return redirect()->route('kelas.index')->with('success','Kelas diupdate');
    }

    public function destroy(Kelas $kela){
        $kela->delete();
        return redirect()->route('kelas.index')->with('success','Kelas dihapus');
    }
}
