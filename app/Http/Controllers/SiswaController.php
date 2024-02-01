<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $siswas = Siswa::latest()->paginate(5);
        return view('admin.siswa.index', compact('siswas'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('admin.siswa.create', compact('kelas', 'spps'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nisn'       => 'required|integer',
            'nis'        => 'required|integer',
            'nama'       => 'required|string',
            'kelas_id'   => 'required|exists:kelas,id',
            'alamat'     => 'required|string',
            'no_hp'      => 'required|integer',
            'spp_id'     => 'required|exists:spps,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show($id): View
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.show', compact('siswa'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spps = Spp::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas', 'spps'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nisn'       => 'required|integer',
            'nis'        => 'required|integer',
            'nama'       => 'required|string',
            'kelas_id'   => 'required|exists:kelas,id',
            'alamat'     => 'required|string',
            'no_hp'      => 'required|integer',
            'spp_id'     => 'required|exists:spps,id',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**p
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
