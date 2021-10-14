<?php

namespace App\Models;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmit extends Model
{
    use AsSource;
    protected $fillable = [
        'name',
        'phone',
        'status',
        'comment',
        
    ];
}
