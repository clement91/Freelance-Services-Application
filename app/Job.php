<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Job extends \Eloquent
{
  use SearchableTrait;

  /**
   * Searchable rules.
   *
   * @var array
   */
  protected $searchable = [
      /**
       * Columns and their priority in search results.
       * Columns with higher values are more important.
       * Columns with equal values have equal importance.
       *
       * @var array
       */
      'columns' => [
          //'users.first_name' => 10,
          //'users.last_name' => 10,
          //'users.bio' => 2,
          //'users.email' => 5,
          //'posts.title' => 2,
          //'posts.body' => 1,
          'jobs.title' => 10,
          'jobs.description' => 10,
          'jobs.tags' => 10,
          'jobs.instruction' => 5,
          'jobs.url_link' => 2,
      ],
      //'joins' => [
      //    'posts' => ['users.id','posts.user_id'],
      //],
  ];

  //public function posts()
  //{
  //    return $this->hasMany('Post');
  //}

}
