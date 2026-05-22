<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::toast('Testimonial create failed!', 'error');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage($request->file('image'));
        }

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
            'image' => $imagePath,
            'sort_order' => (int) (Testimonial::max('sort_order') ?? 0) + 1,
        ]);

        Alert::toast('Testimonial added!', 'success');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::toast('Testimonial update failed!', 'error');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
        ];

        if ($request->hasFile('image')) {
            // Remove old image if it lives under storage/images/testimonials/
            $this->maybeDeleteImage($testimonial->image);
            $data['image'] = $this->saveImage($request->file('image'));
        }

        $testimonial->update($data);

        Alert::toast('Testimonial updated!', 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->maybeDeleteImage($testimonial->image);
        $testimonial->delete();
        Alert::toast('Testimonial deleted!', 'success');

        return redirect()->back();
    }

    public function moveUp($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $prev = Testimonial::where('sort_order', '<', $testimonial->sort_order)
            ->orderByDesc('sort_order')
            ->first();
        if ($prev) {
            \DB::transaction(function () use ($testimonial, $prev) {
                $tmp = $testimonial->sort_order;
                $testimonial->update(['sort_order' => $prev->sort_order]);
                $prev->update(['sort_order' => $tmp]);
            });
        }

        return redirect()->back();
    }

    public function moveDown($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $next = Testimonial::where('sort_order', '>', $testimonial->sort_order)
            ->orderBy('sort_order')
            ->first();
        if ($next) {
            \DB::transaction(function () use ($testimonial, $next) {
                $tmp = $testimonial->sort_order;
                $testimonial->update(['sort_order' => $next->sort_order]);
                $next->update(['sort_order' => $tmp]);
            });
        }

        return redirect()->back();
    }

    private function saveImage($file): string
    {
        $relPath = 'images/testimonials/'.Str::random(40).'.jpg';

        $bin = (string) Image::make($file)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 85);

        Storage::disk('public')->put($relPath, $bin);

        return $relPath;
    }

    private function maybeDeleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }
        // Only delete uploads we own (under images/testimonials/), not seeded asset paths.
        if (! str_starts_with($path, 'images/testimonials/')) {
            return;
        }
        Storage::disk('public')->delete($path);
    }
}
