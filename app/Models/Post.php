<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Province;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['province', 'district', 'regency', 'village', 'author','jenis'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['province'] ?? false, function ($query, $province) {
            return $query->whereHas('province', function ($query) use ($province) {
                $query->where('slug', $province);
            });
        });

        $query->when($filters['regency'] ?? false, function ($query, $regency) {
            return $query->whereHas('regency', function ($query) use ($regency) {
                $query->where('name', 'like', '%' . $regency . '%');
            });
        });

        $query->when($filters['district'] ?? false, function ($query, $district) {
            return $query->whereHas('district', function ($query) use ($district) {
                $query->where('name', 'like', '%' . $district . '%');
            });
        });

        $query->when($filters['village'] ?? false, function ($query, $village) {
            return $query->whereHas('village', function ($query) use ($village) {
                $query->where('name', 'like', '%' . $village . '%');
            });
        });


        $query->when($filters['jenis'] ?? false, function ($query, $jenis) {
            return $query->whereHas('jenis', function ($query) use ($jenis) {
                $query->where('slug', $jenis);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
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

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class);
    }

    public function district()
    {
        return $this->belongsTo(district::class);
    }

    public function Province()
    {
        return $this->belongsTo(province::class);
    }

    public function regency()
    {
        return $this->belongsTo(regency::class);
    }

    public function Village()
    {
        return $this->belongsTo(Village::class);
    }

    public function kamar()
    {
        return $this->hasMany(kamar::class);
    }

}
