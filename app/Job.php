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

          'jobs.title' => 10,
          'jobs.description' => 10,
          'jobs.tags' => 10,
          'job_categories.parent_category' => 10,
          'job_categories.child_category' => 10,
          'jobs.instruction' => 5,
          'jobs.url_link' => 2,

      ],

      'joins' => [
          'job_categories' => ['jobs.category','job_categories.id'],
      ],

  ];

  public function job_categories()
  {
      return $this->hasMany('job_categories');
  }

  public function xusers()
  {
      return $this->hasOne('App\User', 'id', 'users');
  }

  public function xcategory()
  {
      return $this->hasOne('App\JobCategory', 'id', 'category');
  }

  public function xlocation()
  {
      return $this->hasOne('App\Location', 'id', 'location');
  }

  public function xpubComments()
  {
      return $this->hasMany('App\JobPublicComment', 'job_transaction_id', 'job_id');
      /*
      return $this->hasManyThrough(
            'App\JobPublicComment', //posts table
            'App\User',
            'name', // Foreign key on users table...
            'users', // Foreign key on posts table...
            'job_id', // Local key on countries table...
            'id' // Local key on users table...
        );
      */
    }

}
