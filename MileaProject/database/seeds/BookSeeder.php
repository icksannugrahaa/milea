<?php

use Illuminate\Database\Seeder;
use App\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 10 ; $i++) {
            $book               = new Book;
            $book->judul        = 'Buku-'.$i;
            $book->pengarang    = 'Admin-'.$i;
            $book->penerbit     = 'Informatika';
            $book->sinopsis     = 'Ini adalah buku.';
            $book->tahunterbit  = '2020';
            $book->hal          = '120';
            $book->save();
        }

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
