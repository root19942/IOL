<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favories extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
                            'user',
                            'favorie_user'
                          ];

    //

     /**
     * A favorie belong to a swuser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
      return $this->belongsTo(user::class);
    }

}
