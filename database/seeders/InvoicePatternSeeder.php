<?php

namespace Database\Seeders;

use App\Models\InvoicePattern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoicePatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arrays = [
            //نوع اول
            [
                'code' => 1,
                'name' => 'الگوی اول (فروش)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 2,
                'name' => 'الگوی دوم (فروش ارزی)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 3,
                'name' => 'الگوی سوم (صورت حساب طلا، جواهر و پلاتین)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 4,
                'name' => 'الگوی چهارم (قرارداد پیمانکاری)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 5,
                'name' => 'الگوی پنجم (قبوض خدماتی)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 6,
                'name' => 'الگوی ششم (بلیط هواپیما)',
                'invoice_type_id' => 1,
            ],
            [
                'code' => 7,
                'name' => 'الگوی هفتتم (صادرات)',
                'invoice_type_id' => 1,
            ],

            //نوع دوم
            [
                'code' => 1,
                'name' => 'الگوی اول (فروش)',
                'invoice_type_id' => 2,
            ],
            [
                'code' => 2,
                'name' => 'الگوی دوم (صورت حساب طلا، جواهر و پلاتین)',
                'invoice_type_id' => 2,
            ],
            //نوع سوم
            [
                'code' => 1,
                'name' => 'الگوی اول (فروش)',
                'invoice_type_id' => 3,
            ],

        ];
        foreach ($arrays as $array) {
            InvoicePattern::create($array);
        }
    }
}
