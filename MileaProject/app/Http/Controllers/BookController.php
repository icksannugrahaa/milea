<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCover;

class BookController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:officer');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buku.book-list', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.book-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('cover'));
        $validatedData = $request->validate([
            'judul'         => ['required', 'string', 'max:255', 'min:4'],
            'pengarang'     => ['required', 'string', 'max:255'],
            'penerbit'      => ['required', 'string', 'max:255'],
            'sinopsis'      => ['required', 'max:255', 'min: 10'],
            'tahunterbit'   => ['required', 'numeric', 'max:9999'],
            'hal'           => ['required', 'min: 1', 'numeric'],
            'cover.*'       => ['mimes:jpeg,bmp,png,jpg']
        ]);

        if($validatedData){
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
        return view('buku.book-edit', Book::find($id));
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

        $validatedData = $request->validate([
            'judul'         => ['required', 'string', 'max:255', 'min:4'],
            'pengarang'     => ['required', 'string', 'max:255'],
            'penerbit'      => ['required', 'string', 'max:255'],
            'sinopsis'      => ['required', 'max:255', 'min: 10'],
            'tahunterbit'   => ['required', 'numeric', 'size:4'],
            'hal'           => ['required', 'min: 1', 'numeric'],
        ]);

        if($validatedData){
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
}
