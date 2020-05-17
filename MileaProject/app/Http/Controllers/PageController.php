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
        return view('index', ['newest_books' => Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')->orderBy('books.created_at', 'desc')->limit(4)->get(), 'populer_books' => Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')->orderBy('books.rating', 'desc')->limit(4)->get()]);
    }

    public function show($title)
    {
        return view('buku.book-single', ['book' => Book::where('books.judul', $title)->join('book_covers', 'book_covers.book_id', '=', 'books.id')->get(), 'newest_book' => Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')->orderBy('books.created_at', 'desc')->get()]);
    }

    public function showall($order) {
        $list_pengarang             = Book::select('pengarang')->distinct()->get();
        $list_penerbit              = Book::select('penerbit')->distinct()->get();
        $books                      = Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')
                                            ->when(($order == 'diskon'),function($query) {
                                                $query->where('books.diskon', '>', 0)->orderBy('books.created_at', 'desc');

                                            })
                                            ->when(($order != 'diskon'),function($query) use($order) {
                                                $query->orderBy('books.'.$order, 'desc');
                                            })
                                            ->paginate(10);
                                            // dd($books);
        return view('buku.book-list', ['books' => $books, 'list_pengarang' => $list_pengarang, 'list_penerbit' => $list_penerbit]);
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
            $order      = ($req->get('sort_by') == "" ? "created_at" : $req->get('sort_by'));
            $sort_type  = $req->get('sort_type');
            $penerbit   = explode(",",$req->get('penerbit'));
            $pengarang  = explode(",",$req->get('pengarang'));
            $status     = $req->get('status');
            $books                      = Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')
                                                ->when(($order == 'diskon'),function($query) {
                                                    $query->where('books.diskon', '>', 0)->orderBy('books.created_at', 'desc');

                                                })
                                                ->when(($order != 'diskon'),function($query) use($order) {
                                                    $query->orderBy('books.'.$order, 'desc');
                                                })
                                                // ->paginate(10)
                                                ->toSql();
                                                dd($books);
            // $books      = Book::join('book_covers', 'book_covers.book_id', '=', 'books.id')
            //                     ->when($penerbit[0] != "",function($query) use($status, $penerbit) {
            //                     $query->where('books.status', $status)
            //                         ->whereIn('books.penerbit',$penerbit);
            //                     })
            //                     ->when(($penerbit[0] != "" && $pengarang[0] != ""),function($query) use($status, $penerbit, $pengarang) {
            //                     $query->where('books.status', $status)
            //                             ->whereIn('books.pengarang',$pengarang)
            //                             ->whereIn('books.penerbit',$penerbit);
            //                     })
            //                     ->orderBy($sort_by, $sort_type)
            //                     ->paginate(10);
            return view('buku.book-data', compact('books'))->render();
        }
    }
}
