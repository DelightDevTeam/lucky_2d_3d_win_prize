<?php

namespace Database\Seeders;

use App\Models\Admin\TwoDSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TwoDSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = [
            ['name' => '11:00 AM'],  //1
            ['name' => '01:00 PM'],  //2
            ['name' => '03:00 PM'],  //3
            ['name' => '05:00 PM'],  //4
            ['name' => '07:00 PM'],  //5
            ['name' => '09:00 PM'],  //6
        ];
        foreach($sessions as $session)
        {
            TwoDSession::create($session);
        }
    }
}
