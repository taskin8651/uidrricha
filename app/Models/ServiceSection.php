<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ServiceSection extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'service_sections';

    protected $fillable = [
        'slug',
        'card_icon',
        'title',
        'short_description',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('service_section_image')->singleFile();
        $this->addMediaCollection('service_section_document')->singleFile();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
