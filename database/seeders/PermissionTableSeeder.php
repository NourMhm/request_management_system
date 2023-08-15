<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'اضافة طلب',
           'حذف طلب',
           'تعديل طلب',
           'الطلبات',
           'تحديد حالة الطلب',
           'اﻟﻤﺴﺘﺨﺪﻣﻴﻦ',
           'ﻗﺎﺋﻤﺔ اﻟﻤﺴﺘﺨﺪﻣﻴﻦ',
           'ﺻﻼﺣﻴﺎﺕ اﻟﻤﺴﺘﺨﺪﻣﻴﻦ',
           'اﻻﻋﺪاﺩاﺕ',
           'اﺿﺎﻓﺔ ﻣﺴﺘﺨﺪﻡ',
           'ﺗﻌﺪﻳﻞ ﻣﺴﺘﺨﺪﻡ',
           'ﺣﺬﻑ ﻣﺴﺘﺨﺪﻡ',
           'ﻋﺮﺽ ﺻﻼﺣﻴﺔ',
           'اﺿﺎﻓﺔ ﺻﻼﺣﻴﺔ',
           'ﺗﻌﺪﻳﻞ ﺻﻼﺣﻴﺔ',
           'ﺣﺬﻑ ﺻﻼﺣﻴﺔ',

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
