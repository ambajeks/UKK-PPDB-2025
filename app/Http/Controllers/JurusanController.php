<?php
namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:admin']);
    }

    public function index()
    {
        $jurusans = Jurusan::paginate(20);
        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'kode_jurusan' => 'required|string|max:10|unique:jurusan,kode_jurusan'
        ]);
        Jurusan::create($data);
        return redirect()->route('jurusan.index')->with('success','Jurusan dibuat');
    }

    public function show(Jurusan $jurusan)
    {
        return view('jurusan.show', compact('jurusan'));
    }

    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'kode_jurusan' => 'required|string|max:10|unique:jurusan,kode_jurusan,'.$jurusan->id,
        ]);
        $jurusan->update($data);
        return redirect()->route('jurusan.index')->with('success','Jurusan diupdate');
    }

    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success','Jurusan dihapus');
    }
}
