<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Salesmaster;
use App\Models\Customermaster;
use App\Models\Unit;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    // User Data
        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('1'),
            'roles' => 'superadmin'
        ]);

        User::create([
            'name' => 'adminservice',
            'email' => 'adminservice@gmail.com',
            'password' => bcrypt('2'),
            'roles' => 'adminservice'
        ]);

        User::create([
            'name' => 'adminwarehouse',
            'email' => 'adminwarehouse@gmail.com',
            'password' => bcrypt('3'),
            'roles' => 'adminwarehouse'
        ]);

        User::create([
            'name' => 'adminsales',
            'email' => 'adminsales@gmail.com',
            'password' => bcrypt('4'),
            'roles' => 'adminsales'
        ]);


    // Master Data
        Salesmaster::create([
            'name' => 'Hendra',
        ]);
        Salesmaster::create([
            'name' => 'Arya',
        ]);
        Salesmaster::create([
            'name' => 'Devy',
        ]);
        Salesmaster::create([
            'name' => 'Lily',
        ]);
        Salesmaster::create([
            'name' => 'Hana',
        ]);

    // Customermaster
        Customermaster::create([
            'name' => 'PT INDO MURO KENCANA',
        ]);
        Customermaster::create([
            'name' => 'PT HASNUR RIUNG SINERGI',
        ]);
        Customermaster::create([
            'name' => 'PT BARACOOL',
        ]);
        Customermaster::create([
            'name' => 'PT PUTRA SARANA GEMILANG',
        ]);
        Customermaster::create([
            'name' => 'PT PT HILLCON JAYA SAKTI',
        ]);

    // Unit
        Unit::create([
            'name' => 'A40G',
        ]);
        Unit::create([
            'name' => 'R100',
        ]);
        Unit::create([
            'name' => 'A60H',
        ]);
        Unit::create([
            'name' => 'A40F',
        ]);
        Unit::create([
            'name' => 'EC480DL',
        ]);

    // Supplier
        Supplier::create([
            'nama' => 'PT INDOTRUCK SINGAPURA',
            'alamat' => 'SINGAPORE',
            'email' => 'ptitusingapura@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK JAKARTA',
            'alamat' => 'JAKARTA',
            'email' => 'ptitujakarta@gmail.com',

        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK MUARA TEWEH',
            'alamat' => 'MUARA TEWEH',
            'email' => 'ptituteweh@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK BERAU',
            'alamat' => 'BERAU',
            'email' => 'ptituberau@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK SAMARINDA',
            'alamat' => 'SAMARINDA',
            'email' => 'ptituberau@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK BALIKPAPAN',
            'alamat' => 'BALIKPAPAN',
            'email' => 'ptitubalikpapan@gmail.com',
        ]);

    }
}

