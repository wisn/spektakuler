<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\HumanResource\Fakultas;

class HrFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::create([
        	'id_fakultas' => 'FIF', 
        	'nama_fakultas' => 'Fakultas Informatika',	
        ]);
        Fakultas::create([
            'id_fakultas' => 'FTE', 
            'nama_fakultas' => 'Fakultas Teknik Elektro',    
        ]);        
        Fakultas::create([
            'id_fakultas' => 'FRI', 
            'nama_fakultas' => 'Fakultas Rekayasa Industri',    
        ]);
        Fakultas::create([
            'id_fakultas' => 'FKB', 
            'nama_fakultas' => 'Fakultas Komunikasi dan Bisnis',    
        ]);
        Fakultas::create([
            'id_fakultas' => 'FIK', 
            'nama_fakultas' => 'Fakultas Industri Kreatif',    
        ]);                
        Fakultas::create([
            'id_fakultas' => 'FEB', 
            'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',    
        ]);
        Fakultas::create([
            'id_fakultas' => 'FIT', 
            'nama_fakultas' => 'Fakultas Industri Terapan',    
        ]);                    
    }
}
