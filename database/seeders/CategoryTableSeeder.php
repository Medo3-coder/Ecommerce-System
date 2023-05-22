<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // 1
        DB::table('categories')->insert([
            [
                'name'       => json_encode(['en' => 'Fashion', 'ar' => 'موضة'], JSON_UNESCAPED_UNICODE),
                'image'      => 'car.png',
                'created_at' => Carbon::now(),
            ], [
                'name'       => json_encode(['en' => 'Electronics', 'ar' => 'الكترونيات'], JSON_UNESCAPED_UNICODE),
                'image'      => 'Electronics.png',
                'created_at' => Carbon::now(),
            ], [
                'name'       => json_encode(['en' => 'Sweet-Home', 'ar' => 'منزل جميل'], JSON_UNESCAPED_UNICODE),
                'image'      => 'Sweet-Home.png',
                'created_at' => Carbon::now(),
            ], [
                'name'       => json_encode(['en' => 'Appliances', 'ar' => 'الأجهزة'], JSON_UNESCAPED_UNICODE),
                'image'      => 'Appliances.png',
                'created_at' => Carbon::now(),
            ], [
                'name'       => json_encode(['en' => 'Beauty', 'ar' => 'الجمال'], JSON_UNESCAPED_UNICODE),
                'image'      => 'Beauty.png',
                'created_at' => Carbon::now(),
            ],
        ]);

        DB::table('categories')->insert([
            [
                'parent_id' => 1,
                'name'      => json_encode(['en' => 'Mans Top-Ware', 'ar' => 'ملابس رجالية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Mans.png',
            ], [
                'parent_id' => 1,
                'name'      => json_encode(['en' => 'Mans Bottom-Ware', 'ar' => 'ملابس داخلية رجالي'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 1,
                'name'      => json_encode(['en' => 'Mans Footwear', 'ar' => 'احذية رجالي'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 1,
                'name'      => json_encode(['en' => 'Women Footwear', 'ar' => 'احذية نسائية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 2,
                'name'      => json_encode(['en' => 'Computer Peripherals', 'ar' => 'ملحقات الكمبيوتر'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 2,
                'name'      => json_encode(['en' => 'Mobile Accessory', 'ar' => 'ملحقات الهاتف المحمول'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 2,
                'name'      => json_encode(['en' => 'Gaming', 'ar' => 'الألعاب'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 3,
                'name'      => json_encode(['en' => 'Home Furnishings', 'ar' => 'اثاث منزلى'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 3,
                'name'      => json_encode(['en' => 'Living Room', 'ar' => 'غرفة المعيشة'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 3,
                'name'      => json_encode(['en' => 'Home Decor', 'ar' => 'ديكور المنزل'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Decor.png',

            ], [
                'parent_id' => 4,
                'name'      => json_encode(['en' => 'Televisions', 'ar' => 'التلفزيونات'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Televisions.png',

            ], [
                'parent_id' => 4,
                'name'      => json_encode(['en' => 'Washing Machines', 'ar' => 'غسالات'], JSON_UNESCAPED_UNICODE),
                'image'     => 'furniture.png',

            ], [
                'parent_id' => 4,
                'image'     => 'furniture.png',
                'name'      => json_encode(['en' => 'Refrigerators', 'ar' => 'ثلاجات'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 5,
                'image'     => 'Beauty.png',
                'name'      => json_encode(['en' => 'Beauty and Personal Care', 'ar' => 'التجميل والعناية الشخصية'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 5,
                'image'     => 'Drinks.png',
                'name'      => json_encode(['en' => 'Food and Drinks', 'ar' => 'أطعمة ومشروبات'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 5,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Bady Care', 'ar' => 'بادي كير'], JSON_UNESCAPED_UNICODE),

            ],

        ]);

        DB::table('categories')->insert([
            [
                'parent_id' => 6,
                'name'      => json_encode(['en' => 'Mans Tshirt', 'ar' => 'تي شيرت رجالي'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Mans.png',
            ], [
                'parent_id' => 6,
                'name'      => json_encode(['en' => 'Mans Casual Shirts', 'ar' => 'قمصان  كاجوال'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 6,
                'name'      => json_encode(['en' => 'Mans Kurtas', 'ar' => 'مان كورتاس'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 7,
                'name'      => json_encode(['en' => 'Mans Jeans', 'ar' => 'مان جينز'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 7,
                'name'      => json_encode(['en' => 'Mans Trousers', 'ar' => 'بنطلون رجالي'], JSON_UNESCAPED_UNICODE),
                'image'     => 'car.png',
            ], [
                'parent_id' => 8,
                'name'      => json_encode(['en' => 'Mans Sports Shoes', 'ar' => 'أحذية رياضية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 8,
                'name'      => json_encode(['en' => 'Mans Cargos', 'ar' => 'مان للشحن'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 8,
                'name'      => json_encode(['en' => 'Mans Casual Shoes', 'ar' => 'أحذية رجالي عادية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 9,
                'name'      => json_encode(['en' => 'Women Flats', 'ar' => 'شقق نسائية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'home.png',

            ], [
                'parent_id' => 9,
                'name'      => json_encode(['en' => 'Woman Sheakers', 'ar' => 'أحذية نسائية'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Decor.png',

            ], [
                'parent_id' => 9,
                'name'      => json_encode(['en' => 'Women Heels', 'ar' => 'كعب نسائي'], JSON_UNESCAPED_UNICODE),
                'image'     => 'Televisions.png',

            ], [
                'parent_id' => 10,
                'name'      => json_encode(['en' => 'Printers', 'ar' => 'طابعات'], JSON_UNESCAPED_UNICODE),
                'image'     => 'furniture.png',

            ], [
                'parent_id' => 10,
                'image'     => 'furniture.png',
                'name'      => json_encode(['en' => 'Monitors', 'ar' => 'الشاشات'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 10,
                'image'     => 'Beauty.png',
                'name'      => json_encode(['en' => 'PCs', 'ar' => 'كمبيوتر شخص'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 11,
                'image'     => 'Drinks.png',
                'name'      => json_encode(['en' => 'Plain Cases', 'ar' => 'جرابات عادية'], JSON_UNESCAPED_UNICODE),

            ], [
                'parent_id' => 11,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Designer Cases', 'ar' => 'حقائب المصمم'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 11,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Screen Guards', 'ar' => 'واقيات الشاشة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 12,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Gaming Mouse', 'ar' => 'ماوس الألعاب'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 12,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Gaming Keyboars', 'ar' => 'كي بورد'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 12,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Gaming Mousepads', 'ar' => 'مساند ماوس للألعاب'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 14,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Bed Liners', 'ar' => 'أغطية السرير'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 13,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Bedsheets', 'ar' => 'شراشف'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 14,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Blankets', 'ar' => 'بطاطين'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 15,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Tv Units', 'ar' => 'وحدات تلفزيون'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 14,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Dining Sets', 'ar' => 'أطقم سفرة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 13,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Coffee Tables', 'ar' => 'طاولات قهوة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 14,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Lightings', 'ar' => 'الإنارات'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 20,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Beverages', 'ar' => 'مشروبات'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 20,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Chocolates', 'ar' => 'شوكولاتة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 20,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Snacks', 'ar' => 'وجبات خفيفة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 21,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Baby Diapers', 'ar' => 'حفاضات اطفال'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 21,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Baby Wipes', 'ar' => 'مناديل اطفال'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 21,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Baby Food', 'ar' => 'أغذية الأطفال'], JSON_UNESCAPED_UNICODE),

            ],

            [
                'parent_id' => 19,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Hair Care', 'ar' => 'العناية بالشعر'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 19,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Lip Makeup', 'ar' => 'مكياج الشفاه'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 19,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Eyes Makeup', 'ar' => 'مكياج العيون'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 18,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Mini Rerigerators', 'ar' => 'ثلاجات صغيرة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 18,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Double Door', 'ar' => 'باب مزدوج'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 18,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Single Door', 'ar' => 'باب واحد'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 17,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Energy Efficient', 'ar' => 'باب واحد'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 17,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Washer Only', 'ar' => 'غسالة مجففات'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 17,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Washer Dryers', 'ar' => 'غسالة فقط'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 16,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Big Screen TVs', 'ar' => 'أجهزة التلفاز ذات الشاشات الكبيرة'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 16,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Smart TVs', 'ar' => 'تلفزيونات ذكية'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 16,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'OLED TVs', 'ar' => 'تلفزيونات ليد'], JSON_UNESCAPED_UNICODE),

            ],
            [
                'parent_id' => 16,
                'image'     => 'electronics.png',
                'name'      => json_encode(['en' => 'Printers', 'ar' => 'طابعات'], JSON_UNESCAPED_UNICODE),

            ],

        ]);

    }
}
