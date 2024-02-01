<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SppController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $spps = Spp::latest()->paginate(5);
        return view('admin.spp.index', compact('spps'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.spp.create');
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
            'tahun'   => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        Spp::create([
            'tahun'   => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show($id): View
    {
        $spp = Spp::findOrFail($id);
        return view('spps.show', compact('spp'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit($id): View
    {
        $spp = Spp::findOrFail($id);
        return view('admin.spp.edit', compact('spp'));
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
            'tahun'   => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        $spp = Spp::findOrFail($id);
        $spp->update([
            'tahun'   => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();

        return redirect()->route('spp.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
