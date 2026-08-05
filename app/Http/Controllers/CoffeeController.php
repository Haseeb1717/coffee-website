<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    protected function ensureAdmin(): void
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Only admins can manage coffee items.');
        }
    }

    protected function resolveImagePath(Request $request, ?Coffee $coffee = null): ?string
    {
        if ($request->hasFile('image')) {
            if ($coffee && $coffee->image_url && !filter_var($coffee->image_url, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($coffee->image_url);
            }

            return $request->file('image')->store('coffees', 'public');
        }

        if ($request->filled('image_url')) {
            return $request->input('image_url');
        }

        return $coffee?->image_url;
    }

    public function store(Request $request)
    {
        $this->ensureAdmin();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
            'roast_type' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url' => 'nullable|string|max:500',
            'is_available' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'is_customizable' => 'nullable|boolean',
        ]);

        $data['image_url'] = $this->resolveImagePath($request);

        Coffee::create($data);

        return redirect()->route('admin.addcoffee')->with('success', 'Coffee added successfully.');
    }

    public function update(Request $request, Coffee $coffee)
    {
        $this->ensureAdmin();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
            'roast_type' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_url' => 'nullable|string|max:500',
            'is_available' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'is_customizable' => 'nullable|boolean',
        ]);

        $data['image_url'] = $this->resolveImagePath($request, $coffee);
        $coffee->update($data);

        return redirect()->route('admin.addcoffee')->with('success', 'Coffee updated successfully.');
    }

    public function destroy(Coffee $coffee)
    {
        $this->ensureAdmin();

        if ($coffee->image_url && !filter_var($coffee->image_url, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($coffee->image_url);
        }

        $coffee->delete();

        return redirect()->route('admin.addcoffee')->with('success', 'Coffee deleted successfully.');
    }

    public function index()
    {
        $coffees = Coffee::query()->where('is_available', true)->latest()->get();

        return view('menu', compact('coffees'));
    }
}
