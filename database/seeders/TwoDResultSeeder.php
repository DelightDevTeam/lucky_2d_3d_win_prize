<?php

namespace Database\Seeders;

use App\Models\Admin\TwoDResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TwoDResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $results = [
            ['result' => 23, 'two_d_session_id' => 1],
            ['result' => 23, 'two_d_session_id' => 2],
            ['result' => 23, 'two_d_session_id' => 3],
            ['result' => 23, 'two_d_session_id' => 4],
            ['result' => 23, 'two_d_session_id' => 5],
            ['result' => 23, 'two_d_session_id' => 6],
            ['result' => 24, 'two_d_session_id' => 1],
            ['result' => 24, 'two_d_session_id' => 2],
            ['result' => 24, 'two_d_session_id' => 3],
            ['result' => 24, 'two_d_session_id' => 4],
            ['result' => 24, 'two_d_session_id' => 5],
            ['result' => 24, 'two_d_session_id' => 6],
            ['result' => 25, 'two_d_session_id' => 1],
            ['result' => 25, 'two_d_session_id' => 2],
            ['result' => 25, 'two_d_session_id' => 3],
            ['result' => 25, 'two_d_session_id' => 4],
            ['result' => 25, 'two_d_session_id' => 5],
            ['result' => 25, 'two_d_session_id' => 6],
        ];
        foreach($results as $result)
        {
            TwoDResult::create($result);
        }
    }
}
