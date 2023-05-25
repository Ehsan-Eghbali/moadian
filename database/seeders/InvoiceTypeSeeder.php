<?php

namespace Database\Seeders;

use App\Models\InvoiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrays = [
            [
                'code' => 1,
                'name' => 'نوع اول',
            ],
            [
                'code' => 2,
                'name' => 'نوع دوم',
            ],
            [
                'code' => 3,
                'name' => 'نوع سوم',
            ]
        ];
        foreach ($arrays as $array) {
            InvoiceType::create($array);
        }
    }
}
