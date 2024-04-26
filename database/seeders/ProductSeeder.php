<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Ворота и калитка «Фазенда»', 'current_price' => 120.790, 'old_price' => null],
            ['name' => 'Сетка сварная с ПВХ покрытием 1,5х15 м ячейка 50х100 мм', 'current_price' => 90.765, 'old_price' => null],
            ['name' => 'Сетка сварная оцинкованная ячейка 50х100 мм', 'current_price' => 90.765, 'old_price' => null],
            ['name' => 'Проволока оцинкованная d2 мм бухта 100 м', 'current_price' => 90.765, 'old_price' => 150.230],
            ['name' => 'Проволока оцинкованная с полимерным покрытием', 'current_price' => 90.765, 'old_price' => null],
        ];

        Product::insertOrIgnore($products, 'name');
    }
}
