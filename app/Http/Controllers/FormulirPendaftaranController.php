<?php
namespace App\Http\Controllers;

use App\Models\FormulirPendaftaran;
use App\Models\GelombangPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FormulirPendaftaranController extends Controller
{
    public function __construct(){ $this->middleware('auth'); }

    public function index()
    {
        // admin melihat semua; user hanya melihat miliknya
        if (Auth::user()->hasRole('admin')) {
            $forms = FormulirPendaftaran::paginate(20);
        } else {
            $forms = FormulirPendaftaran::where('user_id', Auth::id())->paginate(20);
        }
        return view('formulir.index', compact('forms'));
    }

    public function create()
    {
        $gelombangs = GelombangPendaftaran::all();
        return view('formulir.create', compact('gelombangs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'=>'required|string|max:100',
            'nisn'=>'nullable|string|max:20|unique:formulir_pendaftaran,nisn',
            'asal_sekolah'=>'nullable|string|max:100',
            'tempat_lahir'=>'nullable|string|max:50',
            'tanggal_lahir'=>'nullable|date',
            'agama'=>'nullable|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'nik'=>'nullable|string|max:20|unique:formulir_pendaftaran,nik',
            'anak_ke'=>'nullable|integer',
            'alamat'=>'nullable|string',
            'desa'=>'nullable|string|max:50',
            'kelurahan'=>'nullable|string|max:50',
            'kecamatan'=>'nullable|string|max:50',
            'kota'=>'nullable|string|max:50',
            'no_hp'=>'nullable|string|max:20',
            'gelombang_id'=>'required|exists:gelombang_pendaftaran,id'
        ]);

        $data['user_id'] = Auth::id();
        // nomor pendaftaran: buat otomatis unik (prefix + timestamp + random)
        $data['nomor_pendaftaran'] = 'PPDB-'.date('Ymd').'-'.Str::upper(Str::random(6));

        $form = FormulirPendaftaran::create($data);
        return redirect()->route('formulir.show', $form)->with('success','Formulir tersimpan.');
    }

    public function show(FormulirPendaftaran $formulir)
    {
        $this->authorize('view', $formulir); // opsional jika pakai policy
        return view('formulir.show', compact('formulir'));
    }

    public function edit(FormulirPendaftaran $formulir)
    {
        if (!Auth::user()->hasRole('admin') && $formulir->user_id !== Auth::id()) {
            abort(403);
        }
        $gelombangs = GelombangPendaftaran::all();
        return view('formulir.edit', compact('formulir','gelombangs'));
    }

    public function update(Request $request, FormulirPendaftaran $formulir)
    {
        if (!Auth::user()->hasRole('admin') && $formulir->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'nama_lengkap'=>'required|string|max:100',
            'nisn'=>'nullable|string|max:20|unique:formulir_pendaftaran,nisn,'.$formulir->id,
            'asal_sekolah'=>'nullable|string|max:100',
            'tempat_lahir'=>'nullable|string|max:50',
            'tanggal_lahir'=>'nullable|date',
            'agama'=>'nullable|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'nik'=>'nullable|string|max:20|unique:formulir_pendaftaran,nik,'.$formulir->id,
            'anak_ke'=>'nullable|integer',
            'alamat'=>'nullable|string',
            'desa'=>'nullable|string|max:50',
            'kelurahan'=>'nullable|string|max:50',
            'kecamatan'=>'nullable|string|max:50',
            'kota'=>'nullable|string|max:50',
            'no_hp'=>'nullable|string|max:20',
            'gelombang_id'=>'required|exists:gelombang_pendaftaran,id'
        ]);

        $formulir->update($data);
        return redirect()->route('formulir.show',$formulir)->with('success','Formulir diperbarui.');
    }

    public function destroy(FormulirPendaftaran $formulir)
    {
        if (!Auth::user()->hasRole('admin') && $formulir->user_id !== Auth::id()) {
            abort(403);
        }
        $formulir->delete();
        return redirect()->route('formulir.index')->with('success','Formulir dihapus.');
    }
}
