<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body'
    ];
    protected $guarded = [
        'id'
    ];
    protected $with = ['category', 'user'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeFilter($query, $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where( fn($query) =>
                $query->where('title', 'like', '%'. $search. '%')
                ->orWhere('excerpt', 'like', '%'. $search. '%')
                ->orWhere('body', 'like', '%'. $search. '%')
            );

        });
        $query->when($filters['category'] ?? false, function($query, $category){
            $query->whereHas('category', fn($query) => $query->where('slug', $category));

        });
        $query->when($filters['user'] ?? false, function($query, $user){
            $query->whereHas('user', fn($query) => $query->where('username', $user));

        });

    }
}
