<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Report;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        Report::truncate();
        return view('admin.reports.index');
    }

    public function filter(Request $request)
    {
        $from = date($request->date_timepicker_start);
        $to = date($request->date_timepicker_end);
        $categories = Category::where('id', '!=', 1)->get();
        $reses = Reservation::whereBetween('res_date', [$from, $to])->get();
        $counterArr = [];
        $counter = 0;
        foreach ($categories as $category) {
            foreach($reses as $res) {
                foreach($category->tables as $table) {
                    if($res->table_id == $table->id) {
                        $counter+=1;
                    }
                }
            }
            array_push($counterArr, $counter);
            $counter = 0;
        }
        $res_sum = 0;
        $income_sum = 0;
        foreach ($counterArr as $item) {
            $res_sum += $item;
        }
        foreach ($categories as $key => $category) {
            $income_sum += $category->res_price * $counterArr[$key];
        }
        $reports = Report::all();
        if(count($reports) - 1 != count($categories)) {
            foreach ($categories as $key => $category) {
                Report::create([
                    'name' => $category->name,
                    'res_num' => $counterArr[$key],
                    'total_income' => $category->res_price * $counterArr[$key],
                    'from' => $from,
                    'to' => $to
                ]);
            }
            Report::create([
                'name' => 'Итого',
                'res_num' => $res_sum,
                'total_income' => $income_sum,
                'from' => $from,
                'to' => $to
            ]);
        }
        $reports = Report::orderBy('created_at','desc')->get();
        return view('admin.reports.filter', compact('reports', 'from', 'to'));
    }

    public function show()
    {
        return Excel::download(new ReportExport, 'отчет.xlsx');
    }
}
