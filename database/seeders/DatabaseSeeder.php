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

        // User::create([
        //     'name' => 'adminpusat',
        //     'email' => 'adminpusat@gmail.com',
        //     'password' => bcrypt('4'),
        //     'roles' => 'adminpusat'
        // ]);


    // Master Data
        Salesmaster::create([
            'name' => 'Hendra',
            'kode' => '1121',
            'email' => 'hendra@ptitubjm.com',
            'no_telp' => '081999234478',
        ]);
        Salesmaster::create([
            'name' => 'Arya',
            'kode' => '1131',
            'email' => 'arya@ptitubjm.com',
            'no_telp' => '081988234478',
        ]);
        Salesmaster::create([
            'name' => 'Devy',
            'kode' => '1141',
            'email' => 'devy@ptitubjm.com',
            'no_telp' => '087899234432',
        ]);
        Salesmaster::create([
            'name' => 'Lily',
            'kode' => '1151',
            'email' => 'lili@ptitubjm.com',
            'no_telp' => '081299234442',
        ]);
        Salesmaster::create([
            'name' => 'Hana',
            'kode' => '1171',
            'email' => 'hana@ptitubjm.com',
            'no_telp' => '085399234400',
        ]);

    // Customermaster
        Customermaster::create([
            'name' => 'PT INDO MURO KENCANA',
            'alamat' => 'MUARA TEWEH',
            'kode' => '5531',
            'email' => 'ptimk@gmail.com',
        ]);
        Customermaster::create([
            'name' => 'PT HASNUR RIUNG SINERGI',
            'alamat' => 'TAPIN',
            'kode' => '5532',
            'email' => 'pthrs@gmail.com',
        ]);
        Customermaster::create([
            'name' => 'PT BARACOOL',
            'alamat' => 'SUNGAI DANAU',
            'kode' => '5533',
            'email' => 'ptbaracool@gmail.com',
        ]);
        Customermaster::create([
            'name' => 'PT PUTRA SARANA GEMILANG',
            'alamat' => 'KUTAI',
            'kode' => '5523',
            'email' => 'ptpsg@gmail.com',
        ]);
        Customermaster::create([
            'name' => 'PT HILLCON JAYA SAKTI',
            'alamat' => 'KOTA BARU',
            'kode' => '5524',
            'email' => 'pthjs@gmail.com',
        ]);

    // Unit
        Unit::create([
            'name' => 'A40G',
            'model' => 'ADT110',
            'pn' => 'VOE-17294852',
            'sn_unit' => '322481',
        ]);
        Unit::create([
            'name' => 'R100',
            'model' => 'ADT112',
            'pn' => 'VOE-17298346',
            'sn_unit' => '322561',
        ]);
        Unit::create([
            'name' => 'A60H',
            'model' => 'ADT123',
            'pn' => 'VOE-17298368',
            'sn_unit' => '322552',
        ]);
        Unit::create([
            'name' => 'A40F',
            'model' => 'ADT110',
            'pn' => 'VOE-17298359',
            'sn_unit' => '322544',
        ]);
        Unit::create([
            'name' => 'EC480DL',
            'model' => 'ADT110',
            'pn' => 'VOE-17294852',
            'sn_unit' => '325231',
        ]);

    // Supplier
        Supplier::create([
            'nama' => 'PT INDOTRUCK SINGAPURA',
            'alamat' => 'SINGAPORE',
            'email' => 'PTitusingapura@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK JAKARTA',
            'alamat' => 'JAKARTA',
            'email' => 'PTitujakarta@gmail.com',

        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK MUARA TEWEH',
            'alamat' => 'MUARA TEWEH',
            'email' => 'PTituteweh@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK BERAU',
            'alamat' => 'BERAU',
            'email' => 'PTituberau@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK SAMARINDA',
            'alamat' => 'SAMARINDA',
            'email' => 'PTituberau@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK BALIKPAPAN',
            'alamat' => 'BALIKPAPAN',
            'email' => 'PTitubalikpapan@gmail.com',
        ]);
        Supplier::create([
            'nama' => 'PT INDOTRUCK BANJARMASIN',
            'alamat' => 'BANJARMASIN',
            'email' => 'PTitubanjarmasin@gmail.com',
        ]);

    }
}

