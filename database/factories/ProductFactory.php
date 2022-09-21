<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = ['https://cdn.pixabay.com/photo/2017/07/31/04/11/tomato-2556426_960_720.jpg','https://cdn.pixabay.com/photo/2016/03/27/07/12/apple-1282241_960_720.jpg','https://cdn.pixabay.com/photo/2018/01/10/13/47/essential-oil-3073901_960_720.jpg','https://cdn.pixabay.com/photo/2014/05/18/11/49/olive-oil-346997_960_720.jpg', 'https://cdn.pixabay.com/photo/2012/04/18/20/54/iphone-37856_960_720.png', 'https://cdn.pixabay.com/photo/2018/02/01/19/21/easter-3123834_960_720.jpg', 'https://cdn.pixabay.com/photo/2020/04/14/18/13/honey-5043708_960_720.jpg', 'https://cdn.pixabay.com/photo/2018/09/17/14/27/headphones-3683983_960_720.jpg', 'https://cdn.pixabay.com/photo/2020/04/15/14/45/microphone-5046876_960_720.jpg','https://cdn.pixabay.com/photo/2019/05/15/20/11/podcast-4205873_960_720.jpg', 'https://cdn.pixabay.com/photo/2010/12/13/10/01/guitar-2119_960_720.jpg','https://cdn.pixabay.com/photo/2016/03/27/19/43/samsung-1283938__340.jpg','https://cdn.pixabay.com/photo/2015/05/31/15/07/coffee-792113__340.jpg','https://cdn.pixabay.com/photo/2014/10/23/16/58/phone-499991__340.jpg','https://cdn.pixabay.com/photo/2015/01/20/12/51/mobile-605422__340.jpg','https://cdn.pixabay.com/photo/2017/06/10/12/10/cosmetics-2389779__340.jpg','https://cdn.pixabay.com/photo/2019/03/29/18/19/nature-4089827__340.png','https://cdn.pixabay.com/photo/2017/06/20/08/50/chocolate-2422304__340.jpg','https://cdn.pixabay.com/photo/2017/06/20/08/49/chocolate-2422300__340.jpg','https://cdn.pixabay.com/photo/2017/03/06/17/22/easter-bunny-2122060__340.jpg','https://cdn.pixabay.com/photo/2021/03/19/08/28/autumn-gifts-6106973__340.jpg','https://cdn.pixabay.com/photo/2022/02/25/16/36/wine-7034466__340.png','https://cdn.pixabay.com/photo/2017/09/06/11/41/flowers-2721109__340.jpg','https://cdn.pixabay.com/photo/2017/08/17/23/08/wine-2653268__340.jpg','https://cdn.pixabay.com/photo/2017/09/07/22/31/lipstick-2726989__340.jpg','https://cdn.pixabay.com/photo/2017/09/13/16/08/cosmetics-2746013__340.jpg','https://cdn.pixabay.com/photo/2017/09/07/22/35/lipstick-2726998__340.png','https://cdn.pixabay.com/photo/2020/09/11/22/39/makeup-5564392__340.png','https://cdn.pixabay.com/photo/2020/04/02/05/19/beauty-4993470__340.jpg','https://cdn.pixabay.com/photo/2021/01/06/07/51/lipsticks-5893470__340.jpg','https://cdn.pixabay.com/photo/2018/09/07/13/19/beauty-3660665__340.jpg', 'https://cdn.pixabay.com/photo/2020/10/10/18/01/makeup-5643863__340.jpg'];
        return [
            'store_id' => \App\Models\Store::factory(),
            'name' => $this->faker->word(),
            'qty' => $this->faker->numberBetween($min = 1, $max = 100),
            'price' => $this->faker->numberBetween($min = 10, $max = 1000),
           'description' => $this->faker->paragraph(),
           'image' => $images[array_rand($images)],
        ];
    }
}
