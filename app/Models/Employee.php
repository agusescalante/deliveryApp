<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'born_date','file_path'];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function getPublicFilePathAttribute()
    {
        return Storage::url($this->path_file);
    }

    public function getFileIsImageAttribute()
    {
        $mimeType=Storage::disk('public')->mimeType($this->file_path);
        return str_contains($mimeType , 'image/');
    }
}
