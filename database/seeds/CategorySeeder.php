<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sales', 'Accounts', 'IT'];
        foreach ($categories as $name) {
            $category = Category::create([
                'name' => $name,
            ]);
        }
    }
}
