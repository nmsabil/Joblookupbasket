<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AddAdminUser extends Seeder {
    public function run() {
        Admin::firstOrCreate(['email' => config('app.adminEmail')],
            ['password' => Hash::make(config('app.adminPass'))]
        );
    }
}
