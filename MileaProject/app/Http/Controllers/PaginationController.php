<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function index($table)
    {
        $books = DB::table('books')->orderBy('id', 'asc')->paginate(10);
        return view('paginate/pagination_data', compact('books'));
    }

    public function fetch_data(Request $req)
    {
        if($req->ajax()) {
            $sort_by    = $req->get('sortby');
            $sort_type  = $req->get('sorttype');
            $table      = $req->get('t');
            $query      = $req->get('query');
            $query      = str_replace(" ", "%", $query);
            $books      = DB::table($table)
                            ->where('judul','like','%'.$query.'%')
                            ->orderBy($sort_by, $sort_type)
                            ->paginate(10);
            return view('pagination_data', compact('books'))->render();
        }
    }
}
