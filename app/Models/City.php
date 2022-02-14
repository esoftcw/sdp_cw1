<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class City extends Model implements Searchable
{
    use HasFactory;

    protected $guarded = [];

    public function getSearchResult(): SearchResult
    {
        $url = '';
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }


    public function district(){
        return $this->belongsTo(District::class);
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
