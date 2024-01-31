<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Kelas;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KelasController extends Controller
{
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $kelas = Kelas::latest()->paginate(5);

        //render view with posts
        return view('admin.kelas.index', compact('kelas'));
    }
    public function create(): View
    {
        return view('admin.kelas.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_kelas' => 'required',
            'kompetensi_keahlian'=> 'required',

        ]);



        //create post
        Kelas::create([

            'nama_kelas'=> $request->nama_kelas,
            'kompetensi_keahlian'=> $request->kompetensi_keahlian
        ]);

        //redirect to index
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get post by ID
        $kelas = Kelas::findOrFail($id);

        //render view with post
        return view('admin.kelas.edit', compact('kelas'));
    }


    public function update(Request $request, $id): RedirectResponse
{
    // Validate the input
    $request->validate([
        'nama_kelas' => 'required',
        'kompetensi_keahlian' => 'required',
    ]);

    // Find the Kelas model by ID
    $kelas = Kelas::find($id);

    // Update the attributes
    $kelas->nama_kelas = $request->nama_kelas;
    $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;

    // Save the changes to the database
    $kelas->save();

    // Redirect to the index page with a success message
    return redirect()->route('kelas.index')->with(['success' => 'Data berhasil diperbarui!']);
}

public function destroy($id)
{
    $kelas = Kelas::find($id);
    $kelas->delete();

    return redirect()->route('kelas.index')->with(['success' => 'Data berhasil dihapus!']);
}
}
