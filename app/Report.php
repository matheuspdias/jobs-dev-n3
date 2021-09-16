<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $fillable = [
        'external_id',
        'title',
        'url',
        'image_url',
        'news_site',
        'summary'
    ];

    protected $casts = [
        'external_id' => 'string',
        'title' => 'string',
        'url' => 'string',
        'image_url' => 'string',
        'news_site' => 'string',
        'summary' => 'string'
    ];
}
