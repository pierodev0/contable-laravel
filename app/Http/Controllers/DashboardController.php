<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $ingresosQuery = DB::select("SELECT DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL n MONTH), '%Y-%m') AS month, COALESCE(SUM(CASE WHEN type = 'add' THEN amount ELSE 0 END), 0) AS total_ingresos FROM (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11) months LEFT JOIN movements ON DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL n MONTH), '%Y-%m') = DATE_FORMAT(created_at, '%Y-%m') GROUP BY month ORDER BY month");

        $egresosQuery = DB::select("SELECT DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL n MONTH), '%Y-%m') AS month, COALESCE(SUM(CASE WHEN type = 'out' THEN amount ELSE 0 END), 0) AS total_egresos FROM (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11) months LEFT JOIN movements ON DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL n MONTH), '%Y-%m') = DATE_FORMAT(created_at, '%Y-%m') GROUP BY month ORDER BY month;");

        // $nuevoArray = [];

        // foreach ($ingresos as $ingreso) {
        //     $nuevoArray[$ingreso->month] = $ingreso->total_ingresos;
        // }

        $ingresos = collect($ingresosQuery)->mapWithKeys(function($item) {
            return [$item->month => $item->total_ingresos];
        });

        $egresos = collect($egresosQuery)->mapWithKeys(function($item) {
            return [$item->month => $item->total_egresos];
        });
        return view('dashboard', compact('ingresos','egresos'));
    }
}
