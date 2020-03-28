<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_from','message_line','body'];



     /**
     * A favorie belong to a swuser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Messageline()
    {
      return $this->belongsTo(Messageline::class);
    }




}
