<?php

namespace App\Models;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use AsSource;
    protected $fillable= [
        'title',
        'description',
        'body',
        'author'
    ];
    public function attachment()
    {

        return $this->hasOne('App\Models\Attachment','id','hero');
    }
    
}


