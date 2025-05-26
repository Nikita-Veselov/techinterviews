<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceProvider extends Controller{
    public function index(Request $request)
    {

        $query = ServiceProviders::with('category')->select(['id', 'name', 'description', 'logo', 'category_id']);
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

        // Cache categories (some optimizations since this is the focus)
        $categories = Cache::remember('provider_categories', 60, function () {
            return Category::all();
        });

        return view('providers.index', compact('providers', 'categories'));
    }

    public function show(ServiceProviders $provider)
    {
        return view('providers.show', compact('provider'));
    }
}
