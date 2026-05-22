<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCourseCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Category create failed!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug = Str::slug($request->name);
        $base = $slug;
        $i = 1;
        while (CourseCategory::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        CourseCategory::create([
            'name'       => $request->name,
            'slug'       => $slug,
            'sort_order' => (int) (CourseCategory::max('sort_order') ?? 0) + 1,
        ]);

        Alert::toast('Category added!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $cat = CourseCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Alert::toast('Category update failed!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cat->update(['name' => $request->name]);
        Alert::toast('Category updated!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        CourseCategory::findOrFail($id)->delete();
        Alert::toast('Category deleted!', 'success');
        return redirect()->back();
    }
}
