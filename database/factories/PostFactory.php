<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'image' => $this->faker->imageUrl(640, 480, 'posts', true, 'Faker'),
            // 'title' => $this->faker->sentence,
            // 'subtitle' => $this->faker->paragraphs(1, true),
            // 'content' => $this->faker->paragraphs(5, true),
            // 'date' => $this->faker->date('M d, Y'),
            // 'read_time' => $this->generateTimeToRead(),

            'user_id' => User::factory(),
            'category_id' => fake()->randomElement([1,2,3,4,5,6,7,8,9]),
            'image' => 'https://static.wixstatic.com/media/f5af78_8a0c0c7ad0524e8c9db0ea850035c1cb~mv2_d_3000_2246_s_2.jpg/v1/fill/w_1110,h_831,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/f5af78_8a0c0c7ad0524e8c9db0ea850035c1cb~mv2_d_3000_2246_s_2.jpg',
            'title' => fake()->randomElement([
                'The one thing I would tell to my 16 year old self',
                'Can’t stop scrolling through your friends’ feed?',
                'How I stopped being afraid of being weak',
                '5 great side effects of running with music'
            ]),
            'subtitle' => 'Create a blog post subtitle that summarizes your post in a few short, punchy sentences and entices your audience to continue reading....',
            'body' => $this->faker->paragraphs(12, true),
            'date' => $this->faker->date('M d, Y'),
            'read_time' => $this->generateTimeToRead(),
        ];
    }

    /**
     * Generate a random time to read in a human-readable format.
     *
     * @return string
     */
    private function generateTimeToRead()
    {
        $minutes = $this->faker->numberBetween(1, 6);
        return $minutes . ' min';
    }
}
