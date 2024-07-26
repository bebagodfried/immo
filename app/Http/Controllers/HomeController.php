<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show latest 4 properties(biens)
     */
    public function index()
    {
        $properties = Property::with('options')
            ->latest()
            ->limit(4)
            ->where('sold', false)
            ->get();

        /**
         * Check if at least one administrator exists who can create assets,
         * if not, register the first administrator
         */
        if ((User::all())->isEmpty()) {
            return to_route('register');
        }

        /**
         * If there is no property, then ask the administrator to create one
         */
        if ($properties->isEmpty()) {
            return to_route('admin.properties.create')->with('success', 'Veillez créé un bien pour continuer.');
        }

        return view('home', ['properties' => $properties]);
    }
}
