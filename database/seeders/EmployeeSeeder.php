<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Employee = new Employee();
        $Employee->name='jorge';
        $Employee->email='jfloreso@sre.gob.mx';
        $Employee->jobposition='Gerente';
        $Employee->datebirth='1969-09-09';
        $Employee->address='Canon 55';
        $Employee->save();

        $Employee = new Employee();
        $Employee->name='Hugo';
        $Employee->email='Hugo@sre.gob.mx';
        $Employee->jobposition='Gerente';
        $Employee->datebirth='1980-01-25';
        $Employee->address='Canon 452';
        $Employee->save();

    }
}
