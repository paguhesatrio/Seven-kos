<?php

namespace App\Models;

use App\Models\jenberita;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author','jenberita'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['jenberita'] ?? false, function ($query, $jenberita) {
            return $query->whereHas('jenberita', function ($query) use ($jenberita) {
                $query->where('slug', $jenberita);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function jenberita()
    {
        return $this->belongsTo(jenberita::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
