<?php

use App\Models\BookSubjects;
use Illuminate\Database\Seeder;

class BookSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BookSubjects::class, 300)->create();
    }
}
