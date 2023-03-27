<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = [ 'author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function district()
    {
        return $this->belongsTo(district::class);
    }

    public function Province()
    {
        return $this->belongsTo(province::class);
    }

    public function Regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function Village()
    {
        return $this->belongsTo(Village::class);
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

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kost()
    {
        return $this->hasMany(kost::class);
    }

}
