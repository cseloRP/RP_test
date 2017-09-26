<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['album_id', 'file_name', 'file_path', 'thumbnail', 'thumbnail_path', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function delete()
    {
        if(parent::delete()) {
            unlink(public_path($this->file_path . '/' . $this->file_name ));
            unlink(public_path($this->thumbnail_path . '/' . $this->thumbnail ));
        }
    }
}
