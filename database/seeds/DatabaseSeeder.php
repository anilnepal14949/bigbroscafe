<?php

use App\Category;
use App\Menu;
use App\MenuItem;
use App\Product;
use App\SubCategory;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);

        Menu::create([
            'menu_name' => 'Beverages',
            'menu_description' => 'Beverages',
            'menu_order' => 1,
            'status' => '0'
        ]);

        MenuItem::create([
            'menu_id' => 1,
            'item_name' => 'Milk Tea',
            'item_description' => 'Milk Tea',
            'item_price' => 25,
            'item_order' => 1,
            'status' => '0'
        ]);
    }
}
