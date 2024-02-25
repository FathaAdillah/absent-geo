<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        try {
            if (request()->ajax()) {
                $dataTable = DataTables::of(Jabatan::query())
                    ->setRowId('id')
                    ->addColumn('action', function ($jabatan) {
                        // Update Button
                        $button = "<button class='btn btn-warning btn-edit' data-id='" . $jabatan->id . "'><i class='fas fa-edit'></i></button>";
                        // Delete Button
                        $button .= " <button class='btn btn-danger btn-delete' data-id='" . $jabatan->id . "'><i class='fas fa-trash'></i></button>";
                        return $button;
                    });
                return $dataTable->escapeColumns([])->make(true);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }

        return view('master-data.jabatan.index', [
            'user' => $user
        ]);
    }
}
