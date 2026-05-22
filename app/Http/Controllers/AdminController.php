<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\DocImage;
use App\Models\Faq;
use App\Models\HomeVideo;
use App\Models\News;
use App\Models\SliderImage;
use App\Models\Testimonial;
use App\Models\UnivImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard', [
            'counts' => [
                'news'         => News::count(),
                'sliders'      => SliderImage::count(),
                'docs'         => DocImage::count(),
                'univ'         => UnivImages::count(),
                'videos'       => HomeVideo::count(),
                'categories'   => CourseCategory::count(),
                'courses'      => Course::count(),
                'faqs'         => Faq::count(),
                'testimonials' => Testimonial::count(),
            ],
            'recentNews'    => News::latest('id')->take(5)->get(),
            'recentSliders' => SliderImage::latest('id')->take(5)->get(),
            'recentUniv'    => UnivImages::latest('id')->take(5)->get(),
        ]);
    }

    public function news()
    {
        return view('admin.pages.news', ['news' => News::latest('id')->get()]);
    }

    public function slider()
    {
        return view('admin.pages.slider', ['sliders' => SliderImage::latest('id')->get()]);
    }

    public function document()
    {
        return view('admin.pages.document', ['docs' => DocImage::latest('id')->get()]);
    }

    public function university()
    {
        $univ = UnivImages::latest('id')->get();

        $categories = UnivImages::whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->sort()
            ->values();

        $univGrouped = collect($univ->groupBy(fn($u) => $u->category ?: 'Tanpa Kategori')->all());

        $named        = $univGrouped->filter(fn($v, $k) => $k !== 'Tanpa Kategori')->sortKeys();
        $uncategorized = $univGrouped->filter(fn($v, $k) => $k === 'Tanpa Kategori');
        $univGrouped  = $named->merge($uncategorized);

        return view('admin.pages.university', compact('univ', 'categories', 'univGrouped'));
    }

    public function video()
    {
        return view('admin.pages.video', [
            'video'  => HomeVideo::current(),
            'videos' => HomeVideo::latest('id')->get(),
        ]);
    }

    public function courses()
    {
        return view('admin.pages.courses', [
            'categories' => CourseCategory::with(['courses' => fn ($q) => $q->orderBy('sort_order')])
                ->orderBy('sort_order')->get(),
        ]);
    }

    public function testimonials()
    {
        return view('admin.pages.testimonials', [
            'testimonials' => Testimonial::orderBy('sort_order')->get(),
        ]);
    }

    public function faqs()
    {
        return view('admin.pages.faqs', ['faqs' => Faq::orderBy('sort_order')->get()]);
    }

    public function uploadNews(Request $request)
    {
        // Buat validator manual
        $validator = Validator::make($request->all(), [
            'news_title' => 'required|string|max:255',
            'news_link' => 'required|string',
            'news_img_filename' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($validator->fails()) {
                Alert::toast('Upload gagal! Ukuran maksimal 2MB.', 'error');

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image = $request->file('news_img_filename');

            $originalPath = $image ? $this->storeImage($image, 'images/news', 800) : null;
            $thumbPath    = $image ? $this->storeImage($image, 'images/news/thumbs', 300) : null;

            News::create([
                'news_title' => $request->news_title,
                'news_link' => $request->news_link,
                'news_img_filename' => $originalPath,
                'thumbnail' => $thumbPath,
            ]);

            Alert::toast('Berita berhasil diunggah!', 'success');

            return redirect()->back()->with('success', 'Berita berhasil diunggah!');
        } catch (\Exception $e) {
            // Tangani error lain jika ada
            Alert::toast('Gagal mengunggah berita!', 'error');

            \Log::error('News upload error: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function uploadSliderImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($validator->fails()) {
                Alert::toast('Upload gagal! Ukuran maksimal 2MB.', 'error');

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image = $request->file('filename');

            $originalPath = $this->storeImage($image, 'images/slider', 800);

            SliderImage::create([
                'filename' => $originalPath,
            ]);

            Alert::toast('Gambar slider berhasil diunggah!', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toast('Gagal mengunggah slider!', 'error');

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadDocImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            if ($validator->fails()) {
                Alert::toast('Upload gagal! Ukuran maksimal 2MB.', 'error');

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image = $request->file('filename');

            $originalPath = $this->storeImage($image, 'images/document', 500);

            DocImage::create([
                'filename' => $originalPath,
            ]);

            Alert::toast('Dokumen berhasil diunggah!', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toast('Gagal mengunggah dokumen!', 'error');

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadUnivImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
        ]);

        try {
            if ($validator->fails()) {
                Alert::toast('Upload gagal! Ukuran maksimal 2MB.', 'error');

                return redirect()->back()->withErrors($validator)->withInput();
            }

            $image = $request->file('filename');

            $originalPath = $this->storeImage($image, 'images/university', 300);

            UnivImages::create([
                'filename' => $originalPath,
                'category' => $request->category ?: null,
            ]);

            Alert::toast('Logo mitra berhasil diunggah!', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toast('Gagal mengunggah logo mitra!', 'error');

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadVideo(Request $request)
    {
        $embedType = null;

        $request->validate([
            'video_url' => ['required', 'url', function ($attribute, $value, $fail) use (&$embedType) {
                $embedType = HomeVideo::detectType($value);
                if (! $embedType) {
                    $fail('URL harus dari YouTube atau Google Drive.');
                }
            }],
        ]);

        try {
            HomeVideo::create([
                'video_url'  => $request->video_url,
                'embed_type' => $embedType,
            ]);

            Alert::toast('Video berhasil disimpan.', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            Alert::toast('Gagal menyimpan video.', 'error');

            return redirect()->back();
        }
    }

    public function deleteVideo($id)
    {
        try {
            HomeVideo::findOrFail($id)->delete();

            Alert::toast('Video dihapus.', 'success');
        } catch (\Exception $e) {
            Alert::toast('Gagal menghapus video.', 'error');
        }

        return redirect()->back();
    }

    public function activateVideo($id)
    {
        try {
            HomeVideo::findOrFail($id)->activate();
            Alert::toast('Video diaktifkan.', 'success');
        } catch (\Exception $e) {
            Alert::toast('Gagal mengaktifkan video.', 'error');
        }

        return redirect()->back();
    }

    public function deleteSlider($id)
    {
        $img = SliderImage::findOrFail($id);

        Storage::disk('public')->delete($img->filename);

        $img->delete();

        Alert::toast('Gambar slider berhasil dihapus!', 'success');

        return back();
    }

    public function deleteNews($id)
    {
        $img = News::findOrFail($id);

        Storage::disk('public')->delete(array_filter([
            $img->news_img_filename,
            $img->thumbnail,
        ]));

        $img->delete();

        Alert::toast('Berita berhasil dihapus!', 'success');

        return back();
    }

    public function deleteDoc($id)
    {
        $img = DocImage::findOrFail($id);

        Storage::disk('public')->delete($img->filename);

        $img->delete();

        Alert::toast('Dokumen berhasil dihapus!', 'success');

        return back();
    }

    public function deleteUniv($id)
    {
        $img = UnivImages::findOrFail($id);

        Storage::disk('public')->delete($img->filename);

        $img->delete();

        Alert::toast('Logo mitra berhasil dihapus!', 'success');

        return back();
    }

    private function storeImage($file, string $dir, int $width): string
    {
        $rel = $dir.'/'.Str::random(40).'.jpg';

        $bin = (string) Image::make($file)
            ->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 85);

        Storage::disk('public')->put($rel, $bin);

        return $rel;
    }
}
