<?php

use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vote::class, 1000)->create();
    }
}
