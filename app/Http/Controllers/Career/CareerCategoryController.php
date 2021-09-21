<?php

namespace App\Http\Controllers\Career;

use App\CareerModels\CareerCategory;
use App\Helpers\ModelHelper;
use Facades\App\Helpers\ListingHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerCategoryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categories = ListingHelper::simple_search(CareerCategory::class, ['name']);

        $filter = ListingHelper::get_filter(['name']);

        $searchType = 'simple_search';

        return view('admin.careers.category_index',compact('categories','filter', 'searchType'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.careers.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newData = $this->validate_data($request);
        $newData['slug'] = ModelHelper::convert_to_slug(CareerCategory::class, $newData['name']);
        $newData['is_active'] = $request->has('is_active');
        $newData['user_id'] = auth()->id();

        CareerCategory::create($newData);

        return redirect()->route('career-categories.index')->with('success', 'The career category has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param CareerCategory $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CareerCategory $careerCategory)
    {
        return view('admin.careers.category_edit', compact('careerCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param CareerCategory $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CareerCategory $careerCategory)
    {
        $updateData = $this->validate_data($request);

        $updateData['slug'] = $careerCategory->name != $updateData['name']
                                ? ModelHelper::convert_to_slug(CareerCategory::class, $updateData['name'])
                                : $careerCategory->slug;
        $updateData['is_active'] = $request->has('is_active');
        $updateData['user_id'] = auth()->id();

        $careerCategory->update($updateData);

        return back()->with('success', 'The Career Category has been updated.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change_status(Request $request)
    {
        $data = $request->validate([
            'ids' => 'required',
            'is_active' => 'required'
        ]);

        $ids = explode(',', $data['ids']);
        $status = (empty($data['is_active'])) ? 0 : 1;

        foreach ($ids as $id) {
            $careerCategory = CareerCategory::withTrashed()->find($id);
            if (!empty($careerCategory)) {
                $careerCategory->update([
                    'is_active' => $status
                ]);
            }
        }

        return back()->with('success', 'The Career Category status has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CareerCategory $careerCategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CareerCategory $careerCategory)
    {
        if ($careerCategory->delete()) {
            return back()->with('success', 'The Career Category has been deleted');
        } else {
            return back()->with('error', 'Failed to delete a Career Category. Please try again.');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy_many(Request $request)
    {
        $careerCategoryIds = explode(',', $request->get('ids'));
        if (sizeof($careerCategoryIds) > 0 ) {
            $delete = CareerCategory::whereIn('id', $careerCategoryIds)->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'The Career Category has been deleted');
            }
        }

        return redirect()->back()->with('error', 'Failed to delete Career Categories.');
    }

    /**
     * @param CareerCategory $careerCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($careerCategory)
    {
        CareerCategory::withTrashed()->findOrFail($careerCategory)->restore();

        return back()->with('success', 'The Career Category has been restored');
    }

    public function validate_data(Request $request)
    {
        return $request->validate([
            'name' => 'required|max:150',
            'is_active' => ''
        ]);
    }
}
