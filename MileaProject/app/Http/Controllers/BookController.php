<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCover;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends OfficeAuthController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_pengarang             = Book::select('pengarang')->distinct()->get();
        $list_penerbit              = Book::select('penerbit')->distinct()->get();
        $books                      = Book::paginate(10);
        return view('officer.buku.book-list', compact('books','list_pengarang','list_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.buku.book-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->validateData($request, 'create')){
            $book                   = new Book;
            $book->judul            = $request->judul;
            $book->pengarang        = $request->pengarang;
            $book->penerbit         = $request->penerbit;
            $book->sinopsis         = $request->sinopsis;
            $book->tahunterbit      = $request->tahunterbit;
            $book->hal              = $request->hal;
            $book->bk_total         = $request->bk_total;
            $book->bk_sisa          = $request->bk_total;
            $book->status           = 1;
            $book->save();
            $destinationPath        = 'image/buku/'; // upload path

            foreach ($request->file('cover') as $key => $value) {
                $img                = $destinationPath.date('YmdHis').$value->getClientOriginalName();

                $covers             = new BookCover;
                $covers->book_id    = $book->id;
                $covers->image      = $img;
                $covers->save();

                $value->move($destinationPath, $img);
            }

            return redirect()->route('books');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('officer.buku.book-edit', Book::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->validateData($request, 'update')){
            $book               = Book::find($id);
            $book->judul        = $request->judul;
            $book->pengarang    = $request->pengarang;
            $book->penerbit     = $request->penerbit;
            $book->sinopsis     = $request->sinopsis;
            $book->tahunterbit  = $request->tahunterbit;
            $book->hal          = $request->hal;
            $book->bk_total     = $request->bk_total;
            $book->bk_sisa      = $request->bk_total;
            $book->status       = (isset($request->status) ? 1 : 0 );
            $book->save();

            $destinationPath        = 'image/buku/'; // upload path
            if(!is_null($request->file('cover'))) {
                $covers     = BookCover::where('book_id',$id)->get();
                foreach ($covers as $key => $value) {
                    unlink($value->image);
                }
                BookCover::where('book_id',$id)->delete();

                foreach ($request->file('cover') as $key => $value) {
                    $img                = $destinationPath.date('YmdHis').$value->getClientOriginalName();

                    $covers             = new BookCover;
                    $covers->book_id    = $book->id;
                    $covers->image      = $img;
                    $covers->save();

                    $value->move($destinationPath, $img);
                }
            }

            return redirect()->route('books');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book       = Book::findOrFail($id);
        $covers     = BookCover::where('book_id',$id)->get();
        if(!is_null($covers)) {
            foreach ($covers as $key => $value) {
                unlink($value->image);
            }
            BookCover::where('book_id',$id)->delete();
        }
        $book->delete();

        return redirect()->route('books');
    }

    public function validateData($request, $event) {
        $data = [
                    'pengarang'     => ['required', 'string', 'max:255'],
                    'penerbit'      => ['required', 'string', 'max:255'],
                    'sinopsis'      => ['required', 'min: 10'],
                    'tahunterbit'   => ['required', 'numeric', 'max:9999'],
                    'hal'           => ['required', 'min: 1', 'numeric'],
                    'cover.*'       => ['mimes:jpeg,bmp,png,jpg']
        ];
        if($event == 'create') {
            $data['judul']      = ['required', 'string', 'max:255', 'min:4', 'unique:App\Book,judul'];
        } else {
            $data['judul']      = ['required', 'string', 'max:255', 'min:4'];
        }
        $validatedData = $request->validate($data);
        return $validatedData;
    }

    public function fetch_data(Request $req)
    {
        if($req->ajax()) {
            $sort_by    = $req->get('sort_by');
            $sort_type  = $req->get('sort_type');
            $table      = $req->get('t');
            $search     = $req->get('query');
            $penerbit   = explode(",",$req->get('penerbit'));
            $pengarang  = explode(",",$req->get('pengarang'));
            $tahun      = $req->get('thn');
            $search     = str_replace(" ", "%", $search);
            $books      = Book::when($penerbit[0] != "",function($query) use($search, $penerbit) {
                                $query->where('judul','like','%'.$search.'%')
                                    ->whereIn('penerbit',$penerbit);
                                })
                                ->when(($penerbit[0] != "" && $pengarang[0] != ""),function($query) use($search, $penerbit, $pengarang) {
                                $query->where('judul','like','%'.$search.'%')
                                        ->whereIn('pengarang',$pengarang)
                                        ->whereIn('penerbit',$penerbit);
                                })
                                ->when(($penerbit[0] != "" && $pengarang[0] != "" && $tahun[0] != ""),function($query) use($search, $penerbit, $pengarang, $tahun) {
                                $query->where('judul','like','%'.$search.'%')
                                      ->whereIn('pengarang',$pengarang)
                                      ->whereIn('penerbit',$penerbit)
                                      ->where('tahunterbit','=',$tahun);
                                })
                                ->orderBy($sort_by, $sort_type)
                                ->paginate(10);
            return view('officer.buku.book-data', compact('books'))->render();
        }
    }
}
