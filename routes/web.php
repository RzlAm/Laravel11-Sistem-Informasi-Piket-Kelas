<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Jadwal;
use App\Models\Piket;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
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

    return view('home', [
        "title" => "Home",
        "active" => "home",
        "rajin" => $rajinData,
        "malas" => $malasData,
    ]);
});
Route::get('/jadwal', function () {
    $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        $jadwal = [];
    
        foreach ($days as $day) {
            $jadwal[$day] = Jadwal::where("hari", $day)->get();
        }
    
        return view("jadwal", [
            "title" => "Jadwal Piket",
            "active" => "jadwal",
            "jadwal" => $jadwal, 
        ]);
});
Route::get('/piket', function () {
    $tanggalMulai = Carbon::now()->startOfMonth();
    $tanggalAkhir = Carbon::now()->endOfMonth(); 

    $data = Piket::search(request('search'))->whereBetween('tanggal', [$tanggalMulai, $tanggalAkhir])->paginate(10);
    return view('piket', [
        "title" => "Piket",
        "active" => "piket",
        "data" => $data
    ]);
});

Route::get('/login', [AuthController::class, "login"])->middleware('guest')->name("login");
Route::post('/login', [AuthController::class, "authenticate"])->middleware('guest');
Route::post('/logout', [AuthController::class, "logout"])->middleware('auth');

Route::get("/dashboard", [DashboardController::class, "index"])->middleware("auth");

Route::get("/dashboard/piket", [DashboardController::class, "piket"])->middleware("auth");
Route::get("/dashboard/piket/create", [DashboardController::class, "createPiket"])->middleware("auth");
Route::post("/dashboard/piket/create", [DashboardController::class, "storePiket"])->middleware("auth");
Route::delete("/dashboard/piket/{id}", [DashboardController::class, "deletePiket"])->middleware("auth");
Route::get("/dashboard/piket/{id}/edit", [DashboardController::class, "editPiket"])->middleware("auth");
Route::put("/dashboard/piket/{id}/edit", [DashboardController::class, "updatePiket"])->middleware("auth");

Route::get("/dashboard/siswa", [DashboardController::class, "siswa"])->middleware("auth");
Route::get("/dashboard/siswa/create", [DashboardController::class, "createSiswa"])->middleware("auth");
Route::post("/dashboard/siswa/create", [DashboardController::class, "storeSiswa"])->middleware("auth");
Route::get("/dashboard/siswa/{id}/edit", [DashboardController::class, "editSiswa"])->middleware("auth");
Route::put("/dashboard/siswa/{id}/edit", [DashboardController::class, "updateSiswa"])->middleware("auth");
Route::delete("/dashboard/siswa/{id}", [DashboardController::class, "deleteSiswa"])->middleware("auth");

Route::get("/dashboard/jadwal", [DashboardController::class, "jadwal"])->middleware("auth");
Route::get("/dashboard/jadwal/create", [DashboardController::class, "createJadwal"])->middleware("auth");
Route::post("/dashboard/jadwal/create", [DashboardController::class, "storeJadwal"])->middleware("auth");
Route::delete("/dashboard/jadwal/{id}", [DashboardController::class, "deleteJadwal"])->middleware("auth");
Route::get("/dashboard/jadwal/{id}/edit", [DashboardController::class, "editJadwal"])->middleware("auth");
Route::put("/dashboard/jadwal/{id}/edit", [DashboardController::class, "updateJadwal"])->middleware("auth");

Route::get("/dashboard/admin", [DashboardController::class, "admin"])->middleware("auth");
Route::get("/dashboard/admin/create", [DashboardController::class, "createAdmin"])->middleware("auth");
Route::post("/dashboard/admin/create", [DashboardController::class, "storeAdmin"])->middleware("auth");
Route::delete("/dashboard/admin/{id}", [DashboardController::class, "deleteAdmin"])->middleware("auth");
Route::get("/dashboard/admin/{id}/edit", [DashboardController::class, "editAdmin"])->middleware("auth");
Route::put("/dashboard/admin/{id}/edit", [DashboardController::class, "updateAdmin"])->middleware("auth");