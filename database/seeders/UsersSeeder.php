<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersProfile;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'email' => 'admin@example.org',
            'dni' => '37482773Q',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user->assignRole('admin');

        $adminProfile = UsersProfile::create([
            'user_id' => $user->id,
            'name' => 'admin',
            'surname_first' => 'perez',
        ]);
    }
}
