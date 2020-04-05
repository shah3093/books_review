<?php

use App\Models\BookAuthor;
use Illuminate\Database\Seeder;

class BookAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BookAuthor::class, 200)->create();
    }
}
