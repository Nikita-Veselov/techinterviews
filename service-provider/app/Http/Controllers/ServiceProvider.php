<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ServiceProviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceProvider extends Controller{
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
    {
        $providers = ServiceProviders::with('category')
            ->when($request->filled('category'), fn($q) =>
                $q->where('category_id', $request->category)
            )
            ->paginate(25);

        // If AJAX, return JSON only
        if ($request->ajax()) {
            return response()->json([
                'html' => view('providers.partials.table', compact('providers'))->render()
            ]);
        }

        // Cache categories (some optimizations since this is the focus), added cache tags for flushing
        $categories = Cache::tags(['providers'])->remember('provider:categories', 30, function () {
            return Category::all();
        });

        return view('providers.index', compact('providers', 'categories'));
    }

    public function show(ServiceProviders $provider)
    {
        return view('providers.show', compact('provider'));
    }
}
