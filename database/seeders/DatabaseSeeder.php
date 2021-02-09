<?php

namespace Database\Seeders;

use App\Models\Approve;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedCategoryAndBrand();
        for ($i = 1; $i <= 30; $i++) {
            $this->seedUser($i);
            $this->seedMod($i);
            $this->seedProfiles($i);
            $this->seedProducts($i);


        }
    }

    protected function seedUser($userNumber): void
    {
        User::flushEventListeners();
        $userString = 'user';
        $user = $userString . $userNumber;
        DB::table('users')->insert([
            'name' => $user,
            'email' => $user . '@user.com',
            'password' => Hash::make($user . '@user.com'),
        ]);
        $this->createCart($userNumber);
    }

    protected function seedMod($modNumber):void
    {
        $modString = 'mod';
        $mod = $modString.$modNumber;
        DB::table('mods')->insert([
            'name' => $mod,
            'email' => $mod . '@mod.com',
            'password' => Hash::make($mod . '@mod.com'),
        ]);
        DB::table('Mod_Profiles')->insert([
            'address' => 'Jashore - ' . rand(0, 100),
            'image' => 'images/b (' . rand(1, 35) . ').jpg',
            'contact_number' => rand(100000000, 1000000000),
            'mod_id' => $modNumber,
        ]);
        DB::table('approves')->insert([
            'mod_id' =>$modNumber,
        ]);
    }

    protected function seedProfiles($profileNumber): void
    {
        DB::table('profiles')->insert([
            'address' => 'Jashore - ' . rand(0, 100),
            'image' => 'images/b (' . rand(1, 35) . ').jpg',
            'contact_number' => rand(100000000, 1000000000),
            'user_id' => $profileNumber,
        ]);
    }

    protected function seedProducts($productNumber): void
    {
        $data = [
            'name' => 'product ' . $productNumber,
            'image' => 'images/b (' . rand(1, 35) . ').jpg',
            'price' => rand(5000, 50000),
            'description' => 'abed menh o lorum ipsum dolor abdo qora ti ano sennin gen',
            'category' => Category::all()[rand(0, 4)]->name,
            'brand' => Brand::all()[rand(0, 4)]->name,
            'point' => rand(1, 100),
        ];
        $userData = $data;
        $userData['user_id'] =rand(1, 30);
        $modData = $data;
        $modData['mod_id'] = rand(1,30);
        $modData['name'] = 'm Product'.$productNumber;
        $modData['image'] = 'images/b (' . rand(1, 35) . ').jpg';
        DB::table('products')->insert($userData);

        DB::table('Main_Products')->insert($modData);
    }

    function createCart($ownerNumber){
        DB::table('carts')->insert([
            'id' => $ownerNumber,
        ]);
        DB::table('main_carts')->insert([
            'id' => $ownerNumber,
        ]);

    }

    function seedCategoryAndBrand()
    {
        $brand = new Brand;
        $brand->name = 'Asus';
        $brand->save();

        $brand = new Brand;
        $brand->name = 'Mi';
        $brand->save();

        $brand = new Brand;
        $brand->name = 'Sony';
        $brand->save();

        $brand = new Brand;
        $brand->name = 'Oppo';
        $brand->save();

        $brand = new Brand;
        $brand->name = 'Samsung';
        $brand->save();


        $category = new Category;
        $category->name = 'Cellphone';
        $category->save();
        $category = new Category;
        $category->name = 'Laptop';
        $category->save();
        $category = new Category;
        $category->name = 'Glasses';
        $category->save();
        $category = new Category;
        $category->name = 'Earphone';
        $category->save();

        $category = new Category;
        $category->name = 'Watch';
        $category->save();

    }
}
