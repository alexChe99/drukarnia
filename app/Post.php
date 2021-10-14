<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;

class Post extends Model
{
    use AsSource, Attachable;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'author',
        'hero',
        'likes',
    ];
    public function attachment()
    {

        return $this->hasOne('App\Models\Attachment','id','hero');
    }

}