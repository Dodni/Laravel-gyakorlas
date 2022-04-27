<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        /*
        User::truncate();
        Post::truncate();
        Category::truncate();
        */

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        /*
        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur dipiscing elit. Morbi semper facilisis lacus. Donec eu semper tellus. Morbi est nunc, placerat in odio molestie, molestie varius odio. Donec pulvinar magna risus, et cursus metus laoreet in. Cras vitae sem et augue varius dapibus et sed quam. Etiam vitae tempor sem. Phasellus ut semper nisl. Quisque vitae sagittis augue. Vestibulum lectus nibh, cursus at ipsum eleifend, condimentum elementum nunc. Vivamus volutpat, nisl nec condimentum dignissim, justo lectus dapibus ligula, a ornare nisl arcu ultrices dolor. Etiam vitae pharetra tortor, id ornare metus. Sed sollicitudin aliquet pellentesque. Sed sodales volutpat sapien in tincidunt. Sed sodales laoreet eros, nec rutrum turpis semper ac. Sed justo ex, efficitur eget sem eu, lobortis finibus lorem. Nullam vitae velit a turpis varius rhoncus quis eu odio.</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolar sit amet.',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur dipiscing elit. Morbi semper facilisis lacus. Donec eu semper tellus. Morbi est nunc, placerat in odio molestie, molestie varius odio. Donec pulvinar magna risus, et cursus metus laoreet in. Cras vitae sem et augue varius dapibus et sed quam. Etiam vitae tempor sem. Phasellus ut semper nisl. Quisque vitae sagittis augue. Vestibulum lectus nibh, cursus at ipsum eleifend, condimentum elementum nunc. Vivamus volutpat, nisl nec condimentum dignissim, justo lectus dapibus ligula, a ornare nisl arcu ultrices dolor. Etiam vitae pharetra tortor, id ornare metus. Sed sollicitudin aliquet pellentesque. Sed sodales volutpat sapien in tincidunt. Sed sodales laoreet eros, nec rutrum turpis semper ac. Sed justo ex, efficitur eget sem eu, lobortis finibus lorem. Nullam vitae velit a turpis varius rhoncus quis eu odio.</p>'
        ]);
        */
    }
}
