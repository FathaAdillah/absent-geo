<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     try {
    //         if (request()->ajax()) {
    //             $dataTable = DataTables::of(Pegawai::with(['jabatan', 'geofencing', 'users'])->where('is_delete', 0)->where('is_active', 1)->setRowId('id'));
    //             dd($dataTable->toSql(), $dataTable->getBindings());

    //             $dataTable->addColumn('action', function ($pegawai) {
    //                 // Update Button
    //                 $button = "<button class='btn btn-sm btn-warning btn-edit' data-id='" . $pegawai->id . "'><i class='fas fa-edit'></i></button>";
    //                 // View Button
    //                 $button .= "<button class='btn btn-sm btn-success btn-search' data-id='" . $pegawai->id . "'><i class='fas fa-view'></i></button>";
    //                 // Delete Button
    //                 $button .= " <button class='btn btn-sm btn-danger btn-delete' data-id='" . $pegawai->id . "'><i class='fas fa-trash'></i></button>";
    //                 return $button;
    //             });
    //             return $dataTable->escapeColumns([])->make(true);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error($e->getMessage());
    //         return response()->json(['error' => 'Error Pening Kali'], 500);
    //     }
    //     return view('datapegawai.index', [
    //         'user' => $user
    //     ]);
    // }
    public function index()
    {
        $user = Auth::user();
        try {
            if (request()->ajax()) {
                $dataTable = DataTables::of(Pegawai::with(['jabatan', 'geofencing']))
                    ->setRowId('id')
                    ->addColumn('action', function ($pegawai) {
                        // Update Button
                        $button = "<button class='btn btn-warning btn-edit' data-id='" . $pegawai->id . "'><i class='fas fa-edit'></i></button>";
                        // Delete Button
                        $button .= " <button class='btn btn-danger btn-delete' data-id='" . $pegawai->id . "'><i class='fas fa-trash'></i></button>";
                        return $button;
                    });
                    $dataTable->editColumn('jabatan_name', function($pegawai){
                        return $pegawai->jabatan ? $pegawai->jabatan->name :null;
                    });
                    $dataTable->editColumn('geofencing_name', function($pegawai){
                        return $pegawai->geofencing ? $pegawai->geofencing->name :null;
                    });
                return $dataTable->escapeColumns([])->make(true);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }

        return view('datapegawai.index', [
            'user' => $user
        ]);
    }

    public function update()
    {

    }

    public function store()
    {

    }
    
    public function softdelete()
    {

    }
}
