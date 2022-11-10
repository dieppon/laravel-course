<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(100)->create()
        ->each(function ($user) {
            Hobby::factory()->count(rand(1,8))->create(
                [
                    'user_id' => $user->id,
                ]
            )
            ->each( function ($hobby) {
                $tag_id = range(1,8);
                shuffle($tag_id);
                $assignments = array_slice($tag_id, 0, rand(0,8)); // eg. 5,2,8
                foreach ($assignments as $tag_id) {
                    DB::table('hobby_tag')->insert(
                        [
                            'hobby_id' => $hobby->id,
                            'tag_id' => $tag_id,
                            'created_at' => Now(), // DB::table will not create created_at and updated_at
                            'updated_at' => Now(), // automatically, like Model::factory()->create(} does
                        ]
                    );
                }
            });
        });
    }
}
