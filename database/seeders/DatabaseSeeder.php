<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;

//Purchaseを登録時　中間テーブルにも同時に登録する（1件の購入情報に1件〜3件の商品情報を登録する）
// each・・1件ずつ処理
// attach・・中間テーブルに情報登録
//外部キー以外で中間テーブルに情報を追加するには第二引数に書く

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class
        ]);

        \App\Models\Customer::factory(1000)->create();

        $items = \App\Models\Item::all();
        Purchase::factory(100)->create()->each(function(Purchase $purchase) use ($items){
            $purchase->items()->attach(
                $items->random(rand(1,3))->pluck('id')->toArray(),
                //１〜３個のitemをpurchaseにランダムに紐付け
                ['quantity' => rand(1,5)]
            );
        });

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
