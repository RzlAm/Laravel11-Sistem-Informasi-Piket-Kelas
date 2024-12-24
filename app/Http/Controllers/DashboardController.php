<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Piket;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    $tanggalMulai = Carbon::now()->startOfMonth(); 
    $tanggalAkhir = Carbon::now()->endOfMonth();  

    $rajin = Piket::with('siswa') 
        ->where('status', 'Piket')
        ->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
        ->get();

    $malas = Piket::with('siswa') 
        ->where('status', 'Tidak Piket')
        ->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])
        ->get();

    $rajinData = $rajin->groupBy('siswa_id')->map(function ($items) {
        return [
            'name' => $items->first()->siswa->name,
            'total' => $items->count(),
        ];
    })->values();

    $malasData = $malas->groupBy('siswa_id')->map(function ($items) {
        return [
            'name' => $items->first()->siswa->name,
            'total' => $items->count(),
        ];
    })->values();
        return view("dashboard.index", [
            "title" => "Dashboard",
            "active" => "Dashboard",
            "totalSiswa" => Siswa::all()->count(),
            "rajin" => $rajinData,
            "malas" => $malasData,
        ]);
    }

    public function piket() {
        return view("dashboard.piket", [
            "title" => "Data Piket",
            "active" => "Piket",
            "data" => Piket::search(request('search'))->latest()->paginate(10)
        ]);
    }

    public function createPiket() {
        $siswas = Siswa::orderBy("name", "asc")->get();

        foreach ($siswas as $siswa) {
            $siswa->hari = Jadwal::where("siswa_id", $siswa->id)->pluck("hari")->join(", ");
        }
        return view("dashboard.form.piket", [
            "title" => "Tambah piket",
            "active" => "piket",
            "siswas" => $siswas
        ]);
    }

    public function storePiket(Request $request) {
        $data = $request->validate([
            "siswa_id" => "required|numeric",
            "tanggal" => "required|date",
            "status" => "required",
            "keterangan" => ""
        ]);
    
        // Ambil hari dari tanggal yang diinput (contoh: senin, selasa, dll)
        $hariInggris = strtolower(date('l', strtotime($data['tanggal']))); // Mendapatkan nama hari dalam bahasa Inggris (senin, selasa, dst)

        $hariIndonesia = [
            'monday'    => 'Senin',
            'tuesday'   => 'Selasa',
            'wednesday' => 'Rabu',
            'thursday'  => 'Kamis',
            'friday'    => 'Jumat',
            'saturday'  => 'Sabtu',
            'sunday'    => 'Minggu'
        ];

        // Menerjemahkan hari ke dalam bahasa Indonesia
        $hariTanggal = $hariIndonesia[$hariInggris] ?? 'Hari tidak valid'; // Jika tidak ditemukan, tampilkan 'Hari tidak valid'
        // Cek apakah siswa sudah ada di tanggal yang sama
        $exists = Piket::where('siswa_id', $data['siswa_id'])
                       ->where('tanggal', $data['tanggal'])
                       ->exists();
                       
                       if ($exists) {
                           return back()->with('error', 'Siswa sudah tercatat.');
                        }
    
        // Ambil data siswa untuk memastikan hari piket sesuai
        $siswa = Jadwal::where("siswa_id", $data['siswa_id'])->first();
    
        if (!$siswa || strtolower($siswa->hari) !== strtolower($hariTanggal)) {
            return back()->with('error', 'Siswa hanya bisa ditambahkan pada hari piketnya.');
        }
    
        // Simpan data piket
        $piket = Piket::create($data);
    
        if ($piket) {
            return back()->with("success", "Berhasil menambah piket");
        } else {
            return back()->with("error", "Gagal menambah piket");
        }
    }
    

    public function editpiket($id) {
        $piketId = decrypt($id);
        $siswas = Siswa::orderBy("name", "asc")->get();

        foreach ($siswas as $siswa) {
            $siswa->hari = Jadwal::where("siswa_id", $siswa->id)->pluck("hari")->join(", ");
        }
        return view("dashboard.form.piket", [
            "title" => "Edit piket",
            "active" => "piket",
            "siswas" => $siswas,
            "data" => Piket::find($piketId)
        ]);
    }

    public function updatePiket($id, Request $request) {
        $piketId = decrypt($id);
        $data = $request->validate([
            "siswa_id" => "required|numeric",
            "tanggal" => "required|date",
            "status" => "required",
            "keterangan" => ""
        ]);
    
        // Ambil hari dari tanggal yang diinput (contoh: senin, selasa, dll)
        $hariInggris = strtolower(date('l', strtotime($data['tanggal']))); // Mendapatkan nama hari dalam bahasa Inggris (senin, selasa, dst)

        $hariIndonesia = [
            'monday'    => 'Senin',
            'tuesday'   => 'Selasa',
            'wednesday' => 'Rabu',
            'thursday'  => 'Kamis',
            'friday'    => 'Jumat',
            'saturday'  => 'Sabtu',
            'sunday'    => 'Minggu'
        ];

        // Menerjemahkan hari ke dalam bahasa Indonesia
        $hariTanggal = $hariIndonesia[$hariInggris] ?? 'Hari tidak valid'; // Jika tidak ditemukan, tampilkan 'Hari tidak valid'
        
        // Ambil data siswa untuk memastikan hari piket sesuai
        $siswa = Jadwal::where("siswa_id", $data['siswa_id'])->first();
    
        if (!$siswa || strtolower($siswa->hari) !== strtolower($hariTanggal)) {
            return back()->with('error', 'Siswa hanya bisa ditambahkan pada hari piketnya.');
        }
    
        // Simpan data piket
        $piket = Piket::find($piketId);
        $piket->forceFill($data);
    
        if ($piket->save()) {
            return back()->with("success", "Berhasil mengedit piket");
        } else {
            return back()->with("error", "Gagal mengedit piket");
        }
    }

    public function deletePiket($id) {
        $piketId = decrypt($id);
        $piket = Piket::find($piketId);

        if ($piket->delete()) {
            return back()->with("success", "Berhasil menghapus piket");
        } else {
            return back()->with("error", "Gagal menghapus piket");
        }
    }

    public function siswa() {
        return view("dashboard.siswa", [
            "title" => "Siswa",
            "active" => "Siswa",
            "data" => Siswa::search(request('search'))->orderBy("name", "asc")->paginate(10)
        ]);
    }

    public function createSiswa() {
        return view("dashboard.form.siswa", [
            "title" => "Tambah Siswa",
            "active" => "Siswa",
        ]);
    }

    public function storeSiswa(Request $request) {
        $data = $request->validate([
            "name" => "required"
        ]);

        $siswa = Siswa::create($data);

        if ($siswa) {
            return back()->with("success", "Berhasil menambah siswa");
        } else {
            return back()->with("error", "Gagal menambah siswa");
        }
    }

    public function editSiswa($id) {
        $siswaId = decrypt($id);
        return view("dashboard.form.siswa", [
            "title" => "Edit Siswa",
            "active" => "Siswa",
            "data" => Siswa::find($siswaId)
        ]);
    }

    public function updateSiswa($id, Request $request) {
        $siswaId = decrypt($id);
        $data = $request->validate([
            "name" => "required"
        ]);

        $siswa = Siswa::find($siswaId);
        $siswa->forceFill($data);

        if ($siswa->save()) {
            return redirect("/dashboard/siswa")->with("success", "Berhasil mengedit siswa");
        } else {
            return redirect("/dashboard/siswa")->with("error", "Gagal mengedit siswa");
        }
    }

    public function deleteSiswa($id) {
        $siswaId = decrypt($id);
        $siswa = Siswa::find($siswaId);

        if ($siswa->delete()) {
            return back()->with("success", "Berhasil menghapus siswa");
        } else {
            return back()->with("error", "Gagal menghapus siswa");
        }
    }

    public function jadwal() {
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        $jadwal = [];
    
        foreach ($days as $day) {
            $jadwal[$day] = Jadwal::where("hari", $day)->get();
        }
    
        return view("dashboard.jadwal", [
            "title" => "Jadwal Piket",
            "active" => "jadwal",
            "jadwal" => $jadwal, // Gabung semua jadwal dalam satu array
        ]);
    }
    
    

    public function createjadwal() {
        return view("dashboard.form.jadwal", [
            "title" => "Tambah Jadwal Piket",
            "active" => "jadwal",
            "siswas" => Siswa::orderBy("name", "asc")->get()
        ]);
    }

    public function storeJadwal(Request $request) {
        $data = $request->validate([
            "siswa_id" => "required|numeric|unique:jadwal",
            "hari" => "required"
        ]);

        $jadwal = Jadwal::create($data);

        if ($jadwal) {
            return back()->with("success", "Berhasil menambah jadwal");
        } else {
            return back()->with("error", "Gagal menambah jadwal");
        }
    }

    public function editjadwal($id) {
        $jadwalId = decrypt($id);
        return view("dashboard.form.jadwal", [
            "title" => "Edit Jadwal Piket",
            "active" => "jadwal",
            "siswas" => Siswa::orderBy("name", "asc")->get(),
            "data" => Jadwal::find($jadwalId)
        ]);
    }

    public function updatejadwal($id, Request $request) {
        $jadwalId = decrypt($id);
        $data = $request->validate([
            "name" => "required"
        ]);

        $jadwal = jadwal::find($jadwalId);
        $jadwal->forceFill($data);

        if ($jadwal->save()) {
            return redirect("/dashboard/jadwal")->with("success", "Berhasil mengedit jadwal");
        } else {
            return redirect("/dashboard/jadwal")->with("error", "Gagal mengedit jadwal");
        }
    }

    public function deleteJadwal($id) {
        $jadwalId = decrypt($id);
        $jadwal = Jadwal::find($jadwalId);

        if ($jadwal->delete()) {
            return back()->with("success", "Berhasil menghapus jadwal");
        } else {
            return back()->with("error", "Gagal menghapus jadwal");
        }
    }

    public function admin() {
        return view("dashboard.admin", [
            "title" => "Akun Admin",
            "active" => "Admin",
            "data" => User::search(request('search'))->orderBy("name", "asc")->paginate(10)
        ]);
    }

    public function createAdmin() {
        return view("dashboard.form.admin", [
            "title" => "Tambah Admin",
            "active" => "Admin",
        ]);
    }

    public function storeAdmin(Request $request) {
        $data = $request->validate([
            "name" => "required|unique:users",
            "password" => "required|min:8",
            "password_confirmation" => "same:password",
            "email" => "required|email",
        ]);

        $admin = User::create([
            "name" => $data["name"],
            "password" => bcrypt($data["password"]),
            "email" => $data["email"],
        ]);

        if ($admin) {
            return back()->with("success", "Berhasil menambah admin");
        } else {
            return back()->with("error", "Gagal menambah admin");
        }
    }

    public function editAdmin($id) {
        $AdminId = decrypt($id);
        return view("dashboard.form.Admin", [
            "title" => "Edit Admin",
            "active" => "Admin",
            "data" => User::find($AdminId)
        ]);
    }

    public function updateAdmin($id, Request $request) {
        $adminId = decrypt($id);
        $data = $request->validate([
            "name" => "required|unique:users",
            "password" => "",
            "password_confirmation" => "same:password",
            "email" => "required|email",
        ]);

        $admin = User::find($adminId);
        if (empty($data["password"])) {
            $admin->forceFill([
                "name" => $data["name"],
                "email" => $data["email"],
            ]);
        } else {
            $admin->forceFill([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => bcrypt($data["password"]),
            ]);
        }

        if ($admin->save()) {
            return redirect("/dashboard/admin")->with("success", "Berhasil mengedit admin");
        } else {
            return redirect("/dashboard/admin")->with("error", "Gagal mengedit admin");
        }
    }

    public function deleteAdmin($id) {
        $adminId = decrypt($id);
        $admin = User::find($adminId);

        if ($admin->delete()) {
            return back()->with("success", "Berhasil menghapus admin");
        } else {
            return back()->with("error", "Gagal menghapus admin");
        }
    }








}
