<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];
        $page = (object)[
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];
        $activeMenu = 'barang';   //set menu yg sdg aktif

        $kategori = KategoriModel::all();

        return view('barang.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $barangs = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual')
            ->with('kategori');


        // Praktikum 4 JS 7 - Filter data user berdasarkan level_id
        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nmaa kolom: DT_RowINdex)
            ->addColumn('aksi', function ($barang) {
                $btn = '<a href="' . url('/barang/' . $barang->barang_id) . '" class="btn btn-info btn-sm">Detail</a>  &nbsp;';
                $btn .= '<a href="' . url('/barang/' . $barang->barang_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>  &nbsp;';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/barang/' . $barang->barang_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })

            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah barang baru'
        ];

        $kategori = KategoriModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'barang'; //set menu yang sedang aktif

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'barang_kode'  => 'required|string|min:3|unique:m_barang,barang_kode',
            'barang_nama'  => 'required|string|max:100',
            'kategori_id'  => 'required|integer',
            'harga_beli'   => 'required|integer',
            'harga_jual'   => 'required|integer',
            'image'        => 'required|file|image|max:1000',
        ]);

        $namaFile = 'IMG' . time() . '-' . $request->image->getClientOriginalName();
        $path = $request->image->storeAs('public/barang', $namaFile);

        BarangModel::create([
            'barang_kode'    => $request->barang_kode,
            'barang_nama'    => $request->barang_nama,
            'kategori_id'    => $request->kategori_id,
            'harga_beli'     => $request->harga_beli,
            'harga_jual'     => $request->harga_jual,
            'image'          => $namaFile
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil disimpan');
    }
    public function show(string $id)
    {
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Barang'
        ];

        $activeMenu = 'barang';

        return view('barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_kode'  => 'required|string|min:3|unique:m_barang,barang_kode,' . $id . ',barang_id',
            'barang_nama'  => 'required|string|max:100',
            'kategori_id'  => 'required|integer',
            'harga_beli'   => 'required|integer',
            'harga_jual'   => 'required|integer',
            'image'        => 'nullable|file|image|max:1000',
        ]);

        if ($request->image) {
            $namaFile = 'IMG' . time() . '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/barang', $namaFile);
        }

        BarangModel::find($id)->update([
            'barang_kode'    => $request->barang_kode,
            'barang_nama'    => $request->barang_nama,
            'kategori_id'    => $request->kategori_id,
            'harga_beli'     => $request->harga_beli,
            'harga_jual'     => $request->harga_jual,
            'image'          => $request->image ? $namaFile : basename(BarangModel::find($id)->image)
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }
        try {
            BarangModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
