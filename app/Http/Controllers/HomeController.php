<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::with('options')
            ->latest()
            ->limit(4)
            ->where('sold', false)
            ->get();

        if ((User::all())->isEmpty()) {
            return to_route('register');
        }

        if ($properties->isEmpty()) {
            return to_route('admin.properties.create')->with('success', 'Veillez créé un bien pour continuer.');
        }

        return view('home', ['properties' => $properties]);
    }
}
