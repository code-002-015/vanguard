<?php

namespace App\Http\Controllers\Career;

use App\CareerModels\Career;
use App\CareerModels\CareerApplicant;
use App\CareerModels\CareerCategory;
use App\Http\Requests\ApplyNowRequest;
use App\Page;
use Facades\App\Helpers\FileHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Webfocus\Setting;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationMail;

class CareerFrontController extends Controller
{
    public function index()
    {
        // $search = $request->has('q') ? $request->q : null;

        // $selectedCategory = null;
        // if ($categorySlug) {
        //     $selectedCategory = CareerCategory::where('is_active', 1)->where('slug', $categorySlug)->first();
        //     if ($selectedCategory) {
        //         if ($search) {
        //             $careers = Career::where('is_active', 1)->where(function($query) use($search) {
        //                             $query->where('name','like','%'.$search.'%')
        //                                 ->orWhere('teaser','like','%'.$search.'%')
        //                                 ->orWhere('contents','like','%'.$search.'%');
        //                         })->where('category_id', $selectedCategory->id)->orderBy('name')->get();
        //         } else {
        //             $careers = Career::where('is_active', 1)->where('category_id', $selectedCategory->id)->orderBy('name')->get();
        //         }
        //     }
        // }

        // if (!$selectedCategory) {
        //     if ($search) {
        //         $careers = Career::where('is_active', 1)->where(function($query) use($search) {
        //                         $query->where('name','like','%'.$search.'%')
        //                             ->orWhere('teaser','like','%'.$search.'%')
        //                             ->orWhere('contents','like','%'.$search.'%');
        //                     })->orderBy('name')->get();
        //     } else {
        //         $careers = Career::where('is_active', 1)->orderBy('name')->get();
        //     }
        // }

        // $categories = CareerCategory::where('is_active', 1)->orderBy('name')->get();

        // if (auth()->guest()) {
        //     $page = Page::where('slug', 'careers')->where('status', 'PUBLISHED')->first();
        // } else {
        //     $page = Page::where('slug', 'careers')->first();
        // }

        // if ($page) {
        //     $breadcrumb = $this->breadcrumb($selectedCategory);

        //     return view('theme.' . env('FRONTEND_TEMPLATE') . '.pages.careers.index', compact('page', 'breadcrumb', 'careers', 'categories', 'selectedCategory', 'search'));
        // }

        // return Page::page_not_found();

        $page = new Page;
        $page->name = 'Careers';

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.' . env('FRONTEND_TEMPLATE') . '.pages.careers.index', compact('page','breadcrumb'));
    }

    public function show($slug,$id)
    {
        $careerCategory = CareerCategory::where('slug',$slug)->first();

        $page = new Page();
        $page->name = $careerCategory->name;

        $categories = CareerCategory::where('is_active',1)->orderBy('name','asc')->get();

        $career = Career::find($id);
        $breadcrumb = $this->breadcrumb($page);

        return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.show', compact('page', 'career','careerCategory','categories','breadcrumb'));
    }

    public function apply(ApplyNowRequest $request)
    {
        $newData = $request->all();
        $newData['resume'] = $request->hasFile('resume') ? FileHelper::move_to_folder($request->file('resume'), 'resume')['url'] : null;

        CareerApplicant::create($newData);

        $hrmails = explode(',',env('HR_MAILS'));

        foreach($hrmails as $mail){
            Mail::to($mail)->send(new ApplicationMail(Setting::info()));
        }

        return back()->with(['success' => 'true']);
    }

    // public function breadcrumb($category = null, $career = null)
    // {

    //     $crumbs = ['Home' => route('home')];
    //     $crumbs['Careers'] = route('careers.front.index');

    //     if ($category) {
    //         $crumbs[$category->name] = route('careers.front.category', $category->slug);
    //     }

    //     if($career) {
    //         $crumbs[$career->name] = $career->get_url();
    //     }

    //     return $crumbs;

    // }

    // public function teams()
    // {
    //     $page = new Page();
    //     $page->name = 'Careers Team';

    //     return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.teams', compact('page'));
    // }

    // public function faq()
    // {
    //     $page = new Page();
    //     $page->name = 'Careers FAQ';

    //     return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.faq', compact('page'));
    // }

    public function list()
    {
        $page = new Page();
        $page->name = 'Careers List';

        $categories = CareerCategory::where('is_active', 1)->orderBy('name')->get();

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.'.env('FRONTEND_TEMPLATE').'.pages.careers.list', compact('page','categories','breadcrumb'));
    }

    public function jobs($categorySlug)
    {
        $careerCategory = CareerCategory::where('slug',$categorySlug)->first();

        $page = new Page();
        $page->name = $careerCategory->name;

        $categories = CareerCategory::where('is_active',1)->orderBy('name','asc')->get();
        $careers = Career::where('is_active', 1)->where('category_id', $careerCategory->id)->orderBy('name')->get();

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.' . env('FRONTEND_TEMPLATE') . '.pages.careers.jobs', compact('page', 'careers','categories','careerCategory','breadcrumb'));
    }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }
}

