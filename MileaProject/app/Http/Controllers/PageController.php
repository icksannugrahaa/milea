<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_books                          = Book::orderBy('books.created_at', 'desc')->limit(4)->get();
        foreach ($new_books as $key => $value) {
            $new_book_covers[$value->id]    = Book::find($value->id)->bookcovers()->first();
        }
        $popular_books                      = Book::orderBy('books.created_at', 'desc')->limit(4)->get();
        foreach ($new_books as $key => $value) {
            $pb_covers[$value->id]          = Book::find($value->id)->bookcovers()->first();
        }

        return view('index', compact('new_books','new_book_covers','popular_books','pb_covers'));
    }

    public function show($title)
    {
        $book                               = Book::where('books.judul', $title)->first();
        $book_covers                        = Book::find($book->id)->bookcovers;
        $new_books                          = Book::orderBy('books.created_at', 'desc')->get();
        foreach ($new_books as $key => $value) {
            $new_book_covers[$value->id]    = Book::find($value->id)->bookcovers()->first();
        }

        return view('buku.book-single', compact('book','book_covers','new_books','new_book_covers'));
    }

    public function showall($order) {
        $list_pengarang             = Book::select('pengarang')->distinct()->get();
        $list_penerbit              = Book::select('penerbit')->distinct()->get();
        $books                      = Book::when(($order == 'rating'),function($query) {
                                                $query->orderBy('books.rating', 'desc');
                                            })
                                            ->when(($order != 'rating'),function($query) use($order) {
                                                $query->orderBy('books.created_at', 'desc');
                                            })
                                            ->paginate(10);

        foreach ($books as $key => $value) {
            $book_covers[$value->id]    = Book::find($value->id)->bookcovers()->first();
        }
        return view('buku.book-list', compact('books','book_covers','list_pengarang','list_penerbit'));
    }

    public function about()
    {
        return view('about-us');
    }

    public function login()
    {
        return view('login-regis');
    }

    public function fetch_data(Request $req)
    {
        if($req->ajax()) {
            $sort_by    = ($req->sort_by == "undefined" ? "created_at" : $req->sort_by);
            $sort_type  = ($req->sort_type == "" ? "desc" : $req->sort_type);
            $table      = $req->get('t');
            // $search     = $req->query;
            $penerbit   = explode(",",$req->penerbit);
            $pengarang  = explode(",",$req->pengarang);
            // $search     = str_replace(" ", "%", $search);
            $status     = $req->status;
            $page       = ($req->page == "null" ? 10 : $req->page);
            $books      = Book::when($status == 1, function($query1) use($penerbit, $pengarang, $status) {
                            $query1->where('status', $status)
                                    ->when($penerbit[0] != "" && $pengarang[0] != "", function($query11) use($penerbit, $pengarang) {
                                        $query11->whereIn('pengarang',$pengarang)
                                                ->whereIn('penerbit',$penerbit);
                                    })
                                    ->when($penerbit[0] != "", function($query12) use($penerbit) {
                                        $query12->hereIn('penerbit',$penerbit);
                                    })
                                    ->when($pengarang[0] != "", function($query13) use($pengarang) {
                                        $query13->whereIn('pengarang',$pengarang);
                                    });
                        })->when($status == "on", function($query2) use($penerbit, $pengarang, $status) {
                            $query2->when($penerbit[0] != "" && $pengarang[0] != "", function($query21) use($penerbit, $pengarang) {
                                        $query21->whereIn('pengarang',$pengarang)
                                                ->whereIn('penerbit',$penerbit);
                                    })
                                    ->when($penerbit[0] != "", function($query22) use($penerbit) {
                                        $query22->whereIn('penerbit',$penerbit);
                                    })
                                    ->when($pengarang[0] != "", function($query23) use($pengarang) {
                                        $query23->whereIn('pengarang',$pengarang);
                                    });
                        })->orderBy($sort_by, $sort_type)->paginate($page);
                        // dd($books);
            foreach ($books as $key => $value) {
                $book_covers[$value->id]    = Book::find($value->id)->bookcovers()->first();
            }

            return view('buku.book-data', compact('books','book_covers'))->render();
        }
    }
}
