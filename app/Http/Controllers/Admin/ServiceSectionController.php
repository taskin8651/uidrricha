<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceSectionRequest;
use App\Http\Requests\StoreServiceSectionRequest;
use App\Http\Requests\UpdateServiceSectionRequest;
use App\Models\ServiceSection;
use Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ServiceSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSections = ServiceSection::with('media')
            ->latest()
            ->get();

        return view('admin.serviceSections.index', compact('serviceSections'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceSections.create');
    }

    public function store(StoreServiceSectionRequest $request)
    {
        $data = $request->except(['image', 'document']);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?? $data['title']);

        $serviceSection = ServiceSection::create($data);

        if ($request->hasFile('image')) {
            $serviceSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('service_section_image');
        }

        if ($request->hasFile('document')) {
            $serviceSection
                ->addMediaFromRequest('document')
                ->toMediaCollection('service_section_document');
        }

        return redirect()
            ->route('admin.service-sections.index')
            ->with('message', 'Service created successfully.');
    }

    public function show(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->load('media');

        return view('admin.serviceSections.show', compact('serviceSection'));
    }

    public function edit(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->load('media');

        return view('admin.serviceSections.edit', compact('serviceSection'));
    }

    public function update(UpdateServiceSectionRequest $request, ServiceSection $serviceSection)
    {
        $data = $request->except(['image', 'document']);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?? $data['title'], $serviceSection->id);

        $serviceSection->update($data);

        if ($request->hasFile('image')) {
            $serviceSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('service_section_image');
        }

        if ($request->hasFile('document')) {
            $serviceSection
                ->addMediaFromRequest('document')
                ->toMediaCollection('service_section_document');
        }

        return redirect()
            ->route('admin.service-sections.index')
            ->with('message', 'Service updated successfully.');
    }

    public function destroy(ServiceSection $serviceSection)
    {
        abort_if(Gate::denies('service_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceSection->delete();

        return back()->with('message', 'Service deleted successfully.');
    }

    public function massDestroy(MassDestroyServiceSectionRequest $request)
    {
        ServiceSection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function uniqueSlug(?string $value, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($value ?: 'service');
        $slug = $baseSlug;
        $counter = 2;

        while (
            ServiceSection::withTrashed()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
