<?php

namespace Database\Seeders;


use Carbon\Carbon;
use App\Models\CTF;
use App\Models\User;
use App\Enums\CTFStatus;
use App\Models\Challenge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CTF::factory()->create([
            'name'        => 'Mini CTF',
            'description' => 'We are proud to announce our first Capture The Flag competition of this year.',
            'date'        => Carbon::createFromDate(2022, 12, 16),
            'status'      => CTFStatus::FINISHED
        ]);

        CTF::factory()->create([
            'name'        => 'SecuriNets ISI Quals',
            'description' => 'We are proud to announce our Quals of this year.',
            'date'        => Carbon::createFromDate(2023, 2, 24),
            'status'      => CTFStatus::RUNNING
        ]);

        CTF::factory()->create([
            'name'        => 'SecuriNets ISI Finals',
            'description' => 'We are proud to announce our Finals of this year.',
            'date'        => Carbon::createFromDate(2023, 3, 19),
            'status'      => CTFStatus::UPCOMING
        ]);

        Challenge::factory(20)->create();

        Challenge::factory()->create([
            'name'        => 'Congrats',
            'description' => 'securinets{aw_sikan_aw_sikan_xd_xd}',
            'solves'      => 0,
            'ctf_id'      => 3
        ]);
    }
}
