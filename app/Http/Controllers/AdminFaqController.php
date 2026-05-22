<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminFaqController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal menambahkan FAQ!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Faq::create([
            'question'   => $request->question,
            'answer'     => $request->answer,
            'sort_order' => (int) (Faq::max('sort_order') ?? 0) + 1,
        ]);

        Alert::toast('FAQ berhasil ditambahkan!', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Gagal memperbarui FAQ!', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        Alert::toast('FAQ berhasil diperbarui!', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();
        Alert::toast('FAQ berhasil dihapus!', 'success');
        return redirect()->back();
    }

    public function moveUp($id)
    {
        $faq = Faq::findOrFail($id);
        $prev = Faq::where('sort_order', '<', $faq->sort_order)->orderByDesc('sort_order')->first();
        if ($prev) {
            \DB::transaction(function () use ($faq, $prev) {
                $tmp = $faq->sort_order;
                $faq->update(['sort_order' => $prev->sort_order]);
                $prev->update(['sort_order' => $tmp]);
            });
        }
        return redirect()->back();
    }

    public function moveDown($id)
    {
        $faq = Faq::findOrFail($id);
        $next = Faq::where('sort_order', '>', $faq->sort_order)->orderBy('sort_order')->first();
        if ($next) {
            \DB::transaction(function () use ($faq, $next) {
                $tmp = $faq->sort_order;
                $faq->update(['sort_order' => $next->sort_order]);
                $next->update(['sort_order' => $tmp]);
            });
        }
        return redirect()->back();
    }
}
