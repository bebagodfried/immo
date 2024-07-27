<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Image;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the property(bien).
     */
    public function index(): View
    {
        return view('admin.properties.index', [
            'properties' => Property::with(['options', 'image'])->latest()->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new property(bien).
     */
    public function create(): View
    {
        $property = new Property();

        // Pre-filled value of the form
        $property->fill([
            'surface'       => 10,
            'rooms'         => 1,
            'bedrooms'      => 0,
            'floor'         => 0,
            'city'          => 'Lomé',
            'postal_code'   => 01,
            'sold'          => false,
        ]);

        return view('admin.properties.form', [
            'property'  => $property,
            'options'   => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created property(bien) in storage.
     */
    public function store(PropertyFormRequest $request): RedirectResponse
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));

        /**
         * Image Processing
         */
        if ($request->hasFile('image')):
            // Request
            $file  = $request->file('image');

            // Save
            $this->storeImage($file, $property);
        endif;

        return to_route('admin.properties.index')->with('success', 'Le bien a bien été enregistré');
    }

    /**
     * Show the form for editing the specified property(bien).
     */
    public function edit(Property $property): View
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified property(bien) in storage.
     */
    public function update(PropertyFormRequest $request, Property $property): RedirectResponse
    {
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());

        /**
         * Image Processing
         */
        if ($request->hasFile('image')):
            // Request
            $file  = $request->file('image');

            // Save
            $this->storeImage($file, $property);
        endif;

        return to_route('admin.properties.index')->with('success', 'Le bien a bien été modifié');
    }

    /**
     * Remove the specified property(bien) from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();
        return to_route('admin.properties.index')->with('success', 'Le bien a bien été supprimé');
    }

    private function storeImage($file, $property): void
    {
        $image = new Image();

        // FS Side Processing
        $name   = $file->getClientOriginalName();
                  $file->storeAs('/public/images', $name);
        $path   = 'storage/images/' . $name;

        // Image Processing
        if ($property->image):
            // Manage Old Image
            $oldImage       = $property->image->path;
            $hasOldImage    = file_exists($oldImage);

            // Check For Old Image And Delete It
            if($hasOldImage):
                Storage::delete($oldImage);
            endif;

            // Update Image
            $image = $property->image;
            $image->path = $path;
            $image->save();
        else:
            // DB Side Processing
            $image->property()->associate($property);
            $image->path = $path;
            $image->save();
        endif;
    }
}
