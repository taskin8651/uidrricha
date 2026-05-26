<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreGalleryItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('gallery_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'gallery_category_id' => ['nullable', 'integer', 'exists:gallery_categories,id'],
            'label'               => ['nullable', 'string', 'max:255'],
            'title'               => ['nullable', 'string', 'max:255'],
            'description'         => ['nullable', 'string'],
            'alt_text'            => ['nullable', 'string', 'max:255'],
            'card_size'           => ['nullable', 'in:normal,large,tall,wide'],
            'sort_order'          => ['nullable', 'integer'],
            'status'              => ['nullable', 'boolean'],
            'gallery_image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }
}
