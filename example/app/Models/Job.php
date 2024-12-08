<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    use HasFactory;
    protected  $table = 'job_listings';

    protected $fillable = ['title', 'salary', 'employer_id'];



    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
