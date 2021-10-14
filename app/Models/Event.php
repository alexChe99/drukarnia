<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Event extends Model
{
    use AsSource;

    protected $fillable = [
        'title',
        'description',
        'body',
        'author',
        'time',
        'data',
        'location',
        'link',
        'hero',
    ];

    public function attachment()
    {

        return $this->hasOne('App\Models\Attachment','id','hero');
    }
}
