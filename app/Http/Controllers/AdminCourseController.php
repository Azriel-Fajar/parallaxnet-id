<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCourseController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_category_id' => 'required|exists:course_categories,id',
            'name'               => 'required|string|max:255',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::toast('Course create failed!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage($request->file('image'));
        }

        Course::create([
            'course_category_id' => $request->course_category_id,
            'name'               => $request->name,
            'image'              => $imagePath,
            'sort_order'         => (int) (Course::where('course_category_id', $request->course_category_id)->max('sort_order') ?? 0) + 1,
        ]);

        Alert::toast('Course added!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'course_category_id' => 'required|exists:course_categories,id',
            'name'               => 'required|string|max:255',
            'image'              => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::toast('Course update failed!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'course_category_id' => $request->course_category_id,
            'name'               => $request->name,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $this->saveImage($request->file('image'));
        }

        $course->update($data);
        Alert::toast('Course updated!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        $course->delete();
        Alert::toast('Course deleted!', 'success');
        return redirect()->back();
    }

    public function moveUp($id)
    {
        $course = Course::findOrFail($id);
        $prev = Course::where('course_category_id', $course->course_category_id)
            ->where('sort_order', '<', $course->sort_order)
            ->orderByDesc('sort_order')->first();
        if ($prev) {
            \DB::transaction(function () use ($course, $prev) {
                $tmp = $course->sort_order;
                $course->update(['sort_order' => $prev->sort_order]);
                $prev->update(['sort_order' => $tmp]);
            });
        }
        return redirect()->back();
    }

    public function moveDown($id)
    {
        $course = Course::findOrFail($id);
        $next = Course::where('course_category_id', $course->course_category_id)
            ->where('sort_order', '>', $course->sort_order)
            ->orderBy('sort_order')->first();
        if ($next) {
            \DB::transaction(function () use ($course, $next) {
                $tmp = $course->sort_order;
                $course->update(['sort_order' => $next->sort_order]);
                $next->update(['sort_order' => $tmp]);
            });
        }
        return redirect()->back();
    }

    private function saveImage($image): string
    {
        $rel = 'images/courses/' . Str::random(40) . '.jpg';

        $bin = (string) Image::make($image)
            ->resize(400, null, function ($c) {
                $c->aspectRatio();
                $c->upsize();
            })
            ->encode('jpg', 85);

        Storage::disk('public')->put($rel, $bin);

        return $rel;
    }
}
