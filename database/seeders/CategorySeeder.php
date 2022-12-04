<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'clothing|ملابس' => [
                'men|رجال' => [
                    'shoes|أحذية',
                    'Jackets|جاكيتات',
                    'Sunglasses|نظارة شمسيه',
                    'Sport Wear|ملابس رياضية',
                    'Blazers|بليزر',
                    'Shirts|قمصان'
                ],

                'women|نساء' => [
                    'Handbags|حقائب اليد',
                    'Jwellery|مجوهرات',
                    'Swimwear|ملابس سباحة',
                    'Tops|بلايز',
                    'shoes|أحذية',
                    'Winter Wear|ملابس الشتاء'
                ],
                'boys|أولاد' => [
                    'Toys & Games|الدمى والألعاب',
                    'Jeans|جينز',
                    'School Bags|حقائب مدرسية',
                    'Lunch Box|صندوق الغداء',
                    'Footwear|الأحذية'
                ],
                'girls|فتيات' => [
                    'Sandals|صنادل',
                    'Shorts|السراويل القصيرة',
                    'Dresses|فساتين',
                    'Jwellery|مجوهرات',
                    'Bags|حقائب',
                    'Swimwear|ملابس سباحة',
                ]
            ],
            'Electronics|إلكترونيات' => [
                'Laptops|أجهزة الكمبيوتر المحمولة' => [
                    'gaming|الألعاب',
                    'Laptop Skins|اكسسورات الكمبيوتر',
                    'Apple|أبل',
                    'dell|ديل',
                    'lenovo|ميكروسوفت',
                    'adapters|شواحن',
                    'batteries|بطاريات',
                    'Cooling Pads|تبريد'
                ],
                'Desktops|أجهزة سطح المكتب' => [
                    'Routers & Modems|الراوتر و مودم',
                    'CPUs, Processors|وحدات المعالجة المركزية والمعالجات',
                    'PC Gaming Store|متجر ألعاب الكمبيوتر',
                    'Graphics Cards|كروت الشاشة',
                    'Keyboards|لوحة مفاتيح',
                    'Headphones|سماعات',
                    'ram|رامات'
                ],

                'Cameras|كاميرات' => [
                    'Accessories|اكسسورات',
                    'Binoculars|المناظير',
                    'Film Cameras|كاميرات الفيلم',
                    'Flashes|الفلاش',
                    'Surveillance|مراقبة',
                    'Tripods|حوامل'
                ],
                'phones|الموبايلات' => [
                    'Apple|أبل',
                    'Samsung|سامسونج',
                    'Lenovo|لينوفو',
                    'Accessories|إكسسورات'
                ]
            ],
            'Health & Beauty|الصحة والجمال' => [],
            'watches|ساعات' => [],
            'jewellery|مجوهرات' => [],
            'shoes|أحذية' => [],
            'kids|أطفال' => []
        ];

        self::helper($data);
    }

    private static function helper($data)
    {
        foreach ($data as $index => $item) {
            $name = explode('|', $index);

            $category = Category::create([
                'name' => ['en' => $name[0], 'ar' => $name[1]],
                'slug' => Str::slug($name[0]),
            ]);

            foreach ($item as $key => $val) {
                $name = explode('|', $key);

                $subCategory = Category::create([
                    'name' => ['en' => $name[0], 'ar' => $name[1]],
                    'slug' => Str::slug($name[0]),
                    'parent_id' => $category->id
                ]);

                foreach ($val as $el) {
                    $name = explode('|', $el);
                    Category::create([
                        'name' => ['en' => $name[0], 'ar' => $name[1]],
                        'slug' => Str::slug($name[0]),
                        'parent_id' => $subCategory->id
                    ]);
                }
            }
        }
    }
}