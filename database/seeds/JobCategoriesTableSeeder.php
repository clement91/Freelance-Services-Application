<?php

use Illuminate\Database\Seeder;

class JobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('job_categories')->insert([
          'parent_category' => 'Graphic & Design',
          'child_category' => 'Banner Ads',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Graphic & Design',
          'child_category' => 'Business Card/ Flyers',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Graphic & Design',
          'child_category' => 'Logo Design',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Graphic & Design',
          'child_category' => 'T-shirt',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Graphic & Design',
          'child_category' => 'Others',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'E-Commerce',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'SEO',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'Wix/ Wordpress',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'Web UI design',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'Software Testing',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Web development',
          'child_category' => 'Others',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Writting & Translation',
          'child_category' => 'Data Entry',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Writting & Translation',
          'child_category' => 'Translation Service',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Writting & Translation',
          'child_category' => 'Legal/ Creative Writting',
      ]);

      DB::table('job_categories')->insert([
          'parent_category' => 'Writting & Translation',
          'child_category' => 'Others',
      ]);

    }
}
