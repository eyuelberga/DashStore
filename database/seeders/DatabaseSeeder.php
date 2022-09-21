<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(6)
        ->has(Store::factory()
        ->state(function (array $attributes, User $user) {
            return ['name' => $user->name, 'active'=> false];
        }), 'store')
        ->create();
        $clients = User::factory(10)
        ->has(Store::factory()
        ->state(function (array $attributes, User $user) {
            return ['name' => $user->name];
        }), 'store')
        ->create();

        

        foreach ($clients as $client) {
            Category::factory(5)
            ->has(Product::factory(5)->state(function (array $attributes, Category $category) {
                return ['store_id' => $category->store_id];
            }), 'products')

            ->create(['store_id'=>$client->id]);

            Order::factory(5)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$client->id]);

            Order::factory(3)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$client->id,'status'=>'paid']);

            Order::factory(2)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$client->id, 'status'=>'shipped']);

            Order::factory(7)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$client->id, 'status'=>'delivered']);
        }


        // client and admin accounts

        $admin = User::factory()->has(Store::factory()->state(function (array $attributes, User $user) {
            return ['name' => $user->name];
        }), 'store')->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        Category::factory(5)
            ->has(Product::factory(5)->state(function (array $attributes, Category $category) {
                return ['store_id' => $category->store_id];
            }), 'products')

            ->create(['store_id'=>$admin->id]);
        Order::factory(5)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$admin->id]);


        $client = User::factory()->has(Store::factory()->state(function (array $attributes, User $user) {
            return ['name' => $user->name];
        }), 'store')->create([
            'name' => 'Client',
            'email' => 'client@example.com',
        ]);
        Category::factory(5)
            ->has(Product::factory(5)->state(function (array $attributes, Category $category) {
                return ['store_id' => $category->store_id];
            }), 'products')

            ->create(['store_id'=>$client->id]);

        Order::factory(5)
            ->hasAttached(Product::factory(3)->state(function (array $attributes, Order $order) {
                return ['store_id' => $order->store_id];
            }), ['qty'=>rand(1, 100),'price'=>rand(15, 1000)])

            ->create(['store_id'=>$client->id]);
    }
}
