<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;
use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $coverImagePath = 'image.jpg';
        DB::table('contacts')->insert([
            'contact_title' => 'main contact address',
            'ar_contact_title' => 'العنوان الرئيسي للاتصال',
            'contact_description' => 'Detailed description of the contact page.',
            'ar_contact_description' => 'وصف مفصل لصفحة الاتصال.',
            'cover' => $coverImagePath,
            'links' => json_encode([
                [
                    "name" => "الاسم الأول",
                    "email" => "email@example.com",
                    "phone" => "1234567890",
                ],
                // يمكنك إضافة المزيد من الروابط هنا
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        AboutUs::truncate(); // احذر: هذا سيحذف كل البيانات الموجودة ويبدأ من جديد!
        AboutUs::factory()->count(1)->create();

    }




    }

