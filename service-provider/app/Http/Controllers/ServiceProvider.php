<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProviders;
use Illuminate\Http\Request;
class ServiceProvider extends Controller{
    public function index(Request $request)
    {

        $query = ServiceProviders::with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('id', $request->category));
        }

        $providers = $query->paginate(25);

        // If AJAX, return JSON only
        if ($request->ajax()) {
            return response()->json([
                'html' => view('providers.partials.table', compact('providers'))->render()
            ]);
        }

        $categories = Category::all();

        return view('providers.index', compact('providers', 'categories'));
    }

    public function show($id)
    {
        $provider = ServiceProviders::findOrFail($id);

        return view('providers.show', compact('provider'));
    }
}
