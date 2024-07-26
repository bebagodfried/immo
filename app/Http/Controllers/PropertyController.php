<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    /**
     * Display a listing of properties.
     */
    public function index(SearchPropertiesRequest $request)
    {
        /**
         * Get properties order by date
         * @var mixed $query
         */
        $query = Property::query()
            ->with(['options'])
            ->where('sold', false)
            ->latest();
        /**
         * Will store proposal properties order by date
         * @var mixed $others
         */
        $others = Property::query()
            ->with(['options'])
            ->latest();

        /**
         * Search for a property(bien)
         */
        $filter = []; // Stores the keywords of a search

        if ( $surface = $request->validated('surface')) {
            $query      = $query->where('surface', '>=' , $surface);
            $others     = $others->where('surface', 'like' , "%$surface%");
            $filter['surface'] = $surface;
        }
        if ( $rooms = $request->validated('rooms')) {
            $query      = $query->where('rooms', '>=' , $rooms);
            $others     = $others->where('rooms', 'like' , "%$rooms%");
            $filter['rooms'] = $rooms;
        }
        if ( $price = $request->validated('price')) {
            $query      = $query->where('price', '<=' , $price);
            $others     = $others->where('price', 'like' , "%$price%");
            $filter['price'] = $price;
        }
        if ( $keyword = $request->validated('title')) {
            $query      = $query->where('title', 'like' , "%$keyword")
                                ->orWhere('description', 'like' , "%$keyword")
                                ->orWhere('city', 'like' , "%$keyword");
            $others     = $query;
            $filter['title'] = $keyword;
        }

        /**
         * If the property cannot be found and there is no similar property,
         * then properties are returned as a proposal
         */
        if( $others->count() === 0 ):
            $others = Property::latest();
        endif;

        return view('properties.index', [
            'properties'=> $query->paginate(16),
            'input'     => $request->validated(),
            'filter'    => $filter,
            'others'    => $others->limit(4)->get()
        ]);
    }

    /**
     * Display the specified property.
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

    /**
     * Applying for a specific property(bien)
     * @param Property $property
     * @param PropertyContactRequest $request
     * @return RedirectResponse
     */
    public function contact(Property $property,PropertyContactRequest $request): RedirectResponse
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Demande envoyer avec success');
    }
}
