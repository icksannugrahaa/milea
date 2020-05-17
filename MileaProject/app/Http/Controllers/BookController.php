<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCover;

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
        return view('officer.buku.book-list', ['books' => Book::paginate(10), 'list_pengarang' => $list_pengarang, 'list_penerbit' => $list_penerbit]);
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
        if($this->validateData($request)){
            $book                   = new Book;
            $book->judul            = $request->judul;
            $book->pengarang        = $request->pengarang;
            $book->penerbit         = $request->penerbit;
            $book->sinopsis         = $request->sinopsis;
            $book->tahunterbit      = $request->tahunterbit;
            $book->hal              = $request->hal;
            $book->save();
            $destinationPath        = 'image/buku/'; // upload path

            foreach ($request->file('cover') as $key => $value) {
                $img                = '/image/buku/'.date('YmdHis').$value->getClientOriginalName();

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
        if($this->validateData($request)){
            $book               = Book::find($id);
            $book->judul        = $request->judul;
            $book->pengarang    = $request->pengarang;
            $book->penerbit     = $request->penerbit;
            $book->sinopsis     = $request->sinopsis;
            $book->tahunterbit  = $request->tahunterbit;
            $book->hal          = $request->hal;
            $book->save();

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
        Book::find($id)->delete();
        return redirect()->route('books');
    }

    public function validateData($request) {
        $validatedData = $request->validate([
                                                'judul'         => ['required', 'string', 'max:255', 'min:4'],
                                                'pengarang'     => ['required', 'string', 'max:255'],
                                                'penerbit'      => ['required', 'string', 'max:255'],
                                                'sinopsis'      => ['required', 'min: 10'],
                                                'tahunterbit'   => ['required', 'numeric', 'max:9999'],
                                                'hal'           => ['required', 'min: 1', 'numeric'],
                                                'cover.*'       => ['mimes:jpeg,bmp,png,jpg']
                                            ]);
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
