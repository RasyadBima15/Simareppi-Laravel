<?php

namespace App\Http\Controllers;

use App\Models\Surat_keluar;
use App\Models\Surat_masuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SuratController extends Controller
{
    public function viewSuratMasuk(){
        $suratMasukCount = Surat_masuk::paginate(7);
        $user = User::get();
        return view('suratMasuk', compact('suratMasukCount', 'user'));
    }
    public function viewSuratKeluar(){
        $suratKeluarCount = Surat_keluar::paginate(7);
        $user = User::get();
        return view('suratKeluar', compact('suratKeluarCount', 'user'));
    }
    public function viewProfile(){
        $user = User::get();
        return view('profile', compact('user'));
    }
    public function saveProfile(Request $request){
        $users = User::first();
        try {
            $validator = Validator::make($request->all(), [
                'photo' => 'nullable|image',
                'username' => 'required|string'
            ]);

            $validator->validate();

            $users->username = $request->input('username');


            if($request->file('photo')){
                $fileNew = $request->file('photo');
                $filenameNew = $fileNew->getClientOriginalName();
                
                // $fileOld = $users->photo;
                // $filepathOld = 'photos/'. $fileOld;

                Storage::disk('public')->delete('photos/'. $users->photo);
                $fileNew->storeAs('photos', $filenameNew, 'public');
                $users->photo = $filenameNew;
            }
    
            // Simpan data ke database
            $users->save();
    
            // Redirect atau lakukan tindakan lain setelah penyimpanan
            return redirect()->back()->with('success', 'Data user berhasil di-save!');
        } catch (ValidationException $e){
            $errors = $e->validator->errors();
            if ($errors->has('photo')) {
                return redirect()->back()->with('error', 'Gagal Menambahkan: File yang diunggah harus berupa gambar!');
            }
        }
    }
    public function viewAddIncomingMessage(){
        $user = User::get();
        return view('addIncomingMessage', compact('user'));
    }
    public function viewAddOutgoingMessage(){
        $user = User::get();
        return view('addOutgoingMessage', compact('user'));
    }
    public function viewEditIncomingMessage($id){
        $suratMasuk = Surat_masuk::where('id', $id)->get();
        $user = User::get();
        return view('editIncomingMessage', compact('suratMasuk', 'user'));
    }
    public function viewEditOutgoingMessage($id){
        $suratKeluar = Surat_keluar::where('id', $id)->get();
        $user = User::get();
        return view('editOutgoingMessage', compact('suratKeluar', 'user'));
    }
    public function addIncomingMessage(Request $request){
        try {
            // Mengambil file dari formulir
            $file = $request->file('file');
            $suratMasuk = new Surat_masuk();

            if($file != null){
                $request->validate([
                    'no_surat' => 'required',
                    'tanggal_surat' => 'required',
                    'perihal' => 'required',
                    'dari' => 'required',
                    'kepada' => 'required',
                    'jenis_surat' => 'required',
                    'isi_surat' => 'required',
                    'disposisi_kapolda' => 'required',
                    'disposisi_karo_sdm' => 'required',
                    'file' => 'required|file|mimes:pdf',
                ]);
                // Mendapatkan nama asli file
                $filename = $file->getClientOriginalName();

                $filepath = 'files/'. $filename;

                // Menyimpan file ke dalam direktori 'photos' dengan nama yang sama seperti aslinya
                if(!Storage::disk('public')->exists($filepath) && $file != null){
                    $file->storeAs('files', $filename, 'public');
                    // Menyimpan nama file ke dalam database
                    $suratMasuk->file = $filename;
                } else if (Storage::disk('public')->exists($filepath)) {
                    // File sudah ada, berikan pemberitahuan
                    return redirect()->back()->with('error', 'Gagal Menambahkan: File dengan nama tersebut sudah ada. Pilih file lain.');
                }
            }
            $suratMasuk->no_surat = $request->input('no_surat');
            $suratMasuk->tanggal_surat = date('d-m-Y', strtotime($request->input('tanggal_surat')));
            $suratMasuk->perihal = $request->input('perihal');
            $suratMasuk->dari = $request->input('dari');
            $suratMasuk->kepada = $request->input('kepada');
            $suratMasuk->jenis_surat = $request->input('jenis_surat');
            $suratMasuk->isi_surat = $request->input('isi_surat');
            $suratMasuk->disposisi_kapolda = $request->input('disposisi_kapolda');
            $suratMasuk->disposisi_karo_sdm = $request->input('disposisi_karo_sdm');

            // Menyimpan record surat masuk ke database
            $suratMasuk->save();
    
            return redirect()->back()->with('success', 'Surat Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            // Handling error
            return redirect()->back()->with('error', 'Gagal Menambahkan: File yang diunggah harus berupa dokumen PDF!');
        }
    }
    public function addOutgoingMessage(Request $request){
        try {
            $file = $request->file('file');
            $suratKeluar = new Surat_keluar();

            if($file != null){
                $request->validate([
                    'no_surat' => 'required',
                    'tanggal_surat' => 'required',
                    'perihal' => 'required',
                    'dari' => 'required',
                    'kepada' => 'required',
                    'jenis_surat' => 'required',
                    'isi_surat' => 'required',
                    'file' => 'required|file|mimes:pdf',
                ]);
                // Mendapatkan nama asli file
                $filename = $file->getClientOriginalName();

                $filepath = 'files/'. $filename;
        
                // Menyimpan file ke dalam direktori 'photos' dengan nama yang sama seperti aslinya
                if(!Storage::disk('public')->exists($filepath) && $file){
                    $file->storeAs('files', $filename, 'public');
                    // Menyimpan nama file ke dalam database
                    $suratKeluar->file = $filename;
                } else if (Storage::disk('public')->exists($filepath)) {
                    // File sudah ada, berikan pemberitahuan
                    return redirect()->back()->with('error', 'Gagal Menambahkan: File dengan nama tersebut sudah ada. Pilih file lain.');
                }
            }
            $suratKeluar->no_surat = $request->input('no_surat');
            $suratKeluar->tanggal_surat = date('d-m-Y', strtotime($request->input('tanggal_surat')));
            $suratKeluar->perihal = $request->input('perihal');
            $suratKeluar->dari = $request->input('dari');
            $suratKeluar->kepada = $request->input('kepada');
            $suratKeluar->jenis_surat = $request->input('jenis_surat');
            $suratKeluar->isi_surat = $request->input('isi_surat');
    
            // Menyimpan record surat masuk ke database
            $suratKeluar->save();
    
            return redirect()->back()->with('success', 'Surat Berhasil Ditambahkan!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            // Handling error
            return redirect()->back()->with('error', 'Gagal Menambahkan: File yang diunggah harus berupa dokumen PDF!');
        }
    }
    public function editIncomingMessage($id, Request $request){
        try {
            $request->validate([
                'no_surat' => 'required',
                'tanggal_surat' => 'required',
                'perihal' => 'required',
                'dari' => 'required',
                'kepada' => 'required',
                'jenis_surat' => 'required',
                'isi_surat' => 'required',
                'disposisi_kapolda' => 'required',
                'disposisi_karo_sdm' => 'required',
                'file' => 'nullable|file|mimes:pdf',
            ]);
    
            $suratMasuk = Surat_masuk::where('id', $id)->first();
            $suratMasuk->no_surat = $request->input('no_surat');
            $suratMasuk->tanggal_surat = date('d-m-Y', strtotime($request->input('tanggal_surat')));
            $suratMasuk->perihal = $request->input('perihal');
            $suratMasuk->dari = $request->input('dari');
            $suratMasuk->kepada = $request->input('kepada');
            $suratMasuk->jenis_surat = $request->input('jenis_surat');
            $suratMasuk->isi_surat = $request->input('isi_surat');
            $suratMasuk->disposisi_kapolda = $request->input('disposisi_kapolda');
            $suratMasuk->disposisi_karo_sdm = $request->input('disposisi_karo_sdm');
    
            if($request->file('file')){
                // Mengambil file dari formulir
                $file = $request->file('file');
        
                // Mendapatkan nama asli file
                $filename = $file->getClientOriginalName();

                $filepath = 'files/'. $filename;

                if (Storage::disk('public')->exists($filepath)) {
                    // File sudah ada, berikan pemberitahuan
                    return redirect()->back()->with('error', 'File dengan nama tersebut sudah ada. Pilih file lain.');
                }
        
                // Menyimpan file ke dalam direktori 'photos' dengan nama yang sama seperti aslinya
                if(!Storage::disk('public')->exists($filepath)){
                    Storage::disk('public')->delete('files/'. $suratMasuk->file);
                    $file->storeAs('files', $filename, 'public');
                }
                // Menyimpan nama file ke dalam database
                $suratMasuk->file = $filename;
            }
    
            // Menyimpan record surat masuk ke database
            $suratMasuk->save();
    
            return redirect()->back()->with('success', 'Surat Berhasil Diedit!');
        } catch (\Exception $e) {
            // Handling error
            return redirect()->back()->with('error', 'Gagal Mengedit: File yang diunggah harus berupa dokumen PDF!');
        }
    }
    public function editOutgoingMessage($id, Request $request){
        try {
            $request->validate([
                'no_surat' => 'required',
                'tanggal_surat' => 'required',
                'perihal' => 'required',
                'dari' => 'required',
                'kepada' => 'required',
                'jenis_surat' => 'required',
                'isi_surat' => 'required',
                'file' => 'nullable|file|mimes:pdf',
            ]);
    
            $suratKeluar = Surat_keluar::where('id', $id)->first();
            $suratKeluar->no_surat = $request->input('no_surat');
            $suratKeluar->tanggal_surat = date('d-m-Y', strtotime($request->input('tanggal_surat')));
            $suratKeluar->perihal = $request->input('perihal');
            $suratKeluar->dari = $request->input('dari');
            $suratKeluar->kepada = $request->input('kepada');
            $suratKeluar->jenis_surat = $request->input('jenis_surat');
            $suratKeluar->isi_surat = $request->input('isi_surat');
    
            if($request->file('file')){
                // Mengambil file dari formulir
                $file = $request->file('file');
        
                // Mendapatkan nama asli file
                $filename = $file->getClientOriginalName();

                $filepath = 'files/'. $filename;

                if (Storage::disk('public')->exists($filepath)) {
                    // File sudah ada, berikan pemberitahuan
                    return redirect()->back()->with('error', 'File dengan nama tersebut sudah ada. Pilih file lain.');
                }
        
                // Menyimpan file ke dalam direktori 'photos' dengan nama yang sama seperti aslinya
                if(!Storage::disk('public')->exists($filepath)){
                    Storage::disk('public')->delete('files/'. $suratKeluar->file);
                    $file->storeAs('files', $filename, 'public');
                }
                // Menyimpan nama file ke dalam database
                $suratKeluar->file = $filename;
            }
    
            // Menyimpan record surat Keluar ke database
            $suratKeluar->save();
    
            return redirect()->back()->with('success', 'Surat Berhasil Diedit!');
        } catch (\Exception $e) {
            // Handling error
            return redirect()->back()->with('error', 'Gagal Mengedit: File yang diunggah harus berupa dokumen PDF!');
        }
    }
    public function viewIncomingMessage($id){
        $suratMasuk = Surat_masuk::where('id', $id)->get();
        $user = User::get();
        return view('viewIncomingMessage', compact('suratMasuk', 'user'));
    }
    public function viewOutgoingMessage($id){
        $suratKeluar = Surat_keluar::where('id', $id)->get();
        $user = User::get();
        return view('viewOutgoingMessage', compact('suratKeluar', 'user'));
    }
    public function deleteIncomingMessage($id){
        try {
            $suratMasuk = Surat_masuk::findOrFail($id);
            Storage::disk('public')->delete('files/'. $suratMasuk->file);
            $suratMasuk->delete();

            return redirect()->back()->with('success', 'Surat berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus surat.');
        }
    }
    public function deleteOutgoingMessage($id){
        try {
            $suratKeluar = Surat_keluar::findOrFail($id);
            Storage::disk('public')->delete('files/'. $suratKeluar->file);
            $suratKeluar->delete();

            return redirect()->back()->with('success', 'Surat berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus surat.');
        }
    }
    public function searchIncoming(Request $request){
        $query = Surat_masuk::query();
        // dd($request->request->keys()[1]);
        if ($request->request->keys()[1] === "search-perihal") {
            $searchTerm = strtolower($request->input("search-perihal"));
            $query->whereRaw('LOWER(perihal) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-no_surat') {
            $searchTerm = strtolower($request->input('search-no_surat'));
            $query->whereRaw('LOWER(no_surat) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-jenis_surat') {
            $searchTerm = strtolower($request->input('search-jenis_surat'));
            $query->whereRaw('LOWER(jenis_surat) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-dari') {
            $searchTerm = strtolower($request->input('search-dari'));
            $query->whereRaw('LOWER(dari) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-kepada') {
            $searchTerm = strtolower($request->input('search-kepada'));
            $query->whereRaw('LOWER(kepada) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-tanggal_surat') {
            $searchTerm = strtolower($request->input('search-tanggal_surat'));
            $query->whereRaw('LOWER(tanggal_surat) LIKE ?', ["%{$searchTerm}%"]);
        }
        $suratMasukCount = $query->paginate(7);
        $user = User::get();
        // dd($suratMasukCount->total());
        return view('suratMasuk', compact('suratMasukCount', 'user'));
    }
    public function searchOutgoing(Request $request){
        $query = Surat_keluar::query();
        // dd($request->request->keys()[1]);
        if ($request->request->keys()[1] === "search-perihal") {
            $searchTerm = strtolower($request->input("search-perihal"));
            $query->whereRaw('LOWER(perihal) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-no_surat') {
            $searchTerm = strtolower($request->input('search-no_surat'));
            $query->whereRaw('LOWER(no_surat) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-jenis_surat') {
            $searchTerm = strtolower($request->input('search-jenis_surat'));
            $query->whereRaw('LOWER(jenis_surat) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-dari') {
            $searchTerm = strtolower($request->input('search-dari'));
            $query->whereRaw('LOWER(dari) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-kepada') {
            $searchTerm = strtolower($request->input('search-kepada'));
            $query->whereRaw('LOWER(kepada) LIKE ?', ["%{$searchTerm}%"]);
        } else if ($request->request->keys()[1] === 'search-tanggal_surat') {
            $searchTerm = strtolower($request->input('search-tanggal_surat'));
            $query->whereRaw('LOWER(tanggal_surat) LIKE ?', ["%{$searchTerm}%"]);
        }
        $suratKeluarCount = $query->paginate(7);
        $user = User::get();
        return view('suratKeluar', compact('suratKeluarCount', 'user'));
    }
}
