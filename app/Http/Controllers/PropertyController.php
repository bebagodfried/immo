<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->with('options')->latest();

        if ( $surface = $request->validated('surface')) {
            $query  = $query->where('surface', '>=' , $surface);
        }
        if ( $rooms = $request->validated('rooms')) {
            $query  = $query->where('rooms', '>=' , $rooms);
        }
        if ( $price = $request->validated('price')) {
            $query  = $query->where('price', '<=' , $price);
        }
        if ( $title = $request->validated('title')) {
            $query  = $query->where('title', 'like' , "%$title%");
        }

        return view('properties.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if ($expectedSlug !== $slug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('properties.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property,PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Demande envoyer avec success');
    }
}
