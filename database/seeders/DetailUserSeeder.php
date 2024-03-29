<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
class DetailUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $detail_user = [
            [
                'users_id' => 1,
                'photo' => '',
                'role' => 'Website Developer',
                'contact_number' => '0123456789',
                'biography' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'users_id' => 2,
                'photo' => '',
                'role' => 'DB Admin',
                'contact_number' => '0123456789',
                'biography' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
        ];

        DetailUser::insert($detail_user);
    }
}
