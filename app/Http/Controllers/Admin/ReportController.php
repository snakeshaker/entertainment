<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
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
        return view('admin.reports.filter', compact('categories', 'from', 'to', 'reses', 'counterArr'));
    }

    public function show()
    {
        dd(123);
    }
}
