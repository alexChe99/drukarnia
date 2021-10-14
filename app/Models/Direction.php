<?php

namespace App\Models;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Direction extends Model
{
    
    use AsSource, Attachable;
    protected $fillable = [
        'title',
        'description',
        'body',
        'author',
        'hero'
    ];
    public function attachment()
    {

        return $this->hasOne('App\Models\Attachment','id','hero');
    }
}
