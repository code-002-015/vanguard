<?php

namespace App\Http\Controllers\Career;

use App\CareerModels\Career;
use App\CareerModels\CareerApplicant;
use App\CareerModels\CareerCategory;
use Facades\App\Helpers\ListingHelper;
use App\Helpers\ModelHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    private $searchFields = ['name'];
    private $filterFields = ['created_at', 'name'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = ListingHelper::simple_search(Career::class, $this->searchFields);

        $filter = ListingHelper::get_filter($this->searchFields);

        $searchType = 'simple_search';

        return view('admin.careers.index', compact('careers', 'filter', 'searchType'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_applicants(Request $request)
    {

        $applicants = ListingHelper::sort_by('created_at')->filter_fields($this->filterFields)->simple_search(CareerApplicant::class, $this->searchFields);

        $filter = ListingHelper::get_filter($this->searchFields);
        $searchType = 'simple_search';

        return view('admin.careers.applicant_index', compact('applicants', 'filter', 'searchType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CareerCategory::where('is_active', 1)->get();

        return view('admin.careers.create', compact('categories'));
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

        $newData['slug'] = ModelHelper::convert_to_slug(Career::class, $newData['name']);
        $newData['is_active'] = $request->has('is_active');
        $newData['user_id'] = auth()->id();

        Career::create($newData);

        return redirect()->route('careers.index')->with('success', 'The Career has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Career $career
     * @return void
     */
    public function edit(Request $request, Career $career)
    {
        $categories = CareerCategory::where('is_active', 1)->get();

        return view('admin.careers.edit', compact('career', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Career $career
     * @return void
     */
    public function update(Request $request, Career $career)
    {
        $updateData = $this->validate_data($request);

        $updateData['slug'] = $career->name != $updateData['name']
                                ? ModelHelper::convert_to_slug(Career::class, $updateData['name'])
                                : $career->slug;
        $updateData['is_active'] = $request->has('is_active');
        $newData['user_id'] = auth()->id();

        $career->update($updateData);

        return back()->with('success', 'The Career has been updated.');
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
            $careerCategory = Career::withTrashed()->find($id);
            if (!empty($careerCategory)) {
                $careerCategory->update([
                    'is_active' => $status
                ]);
            }
        }

        return back()->with('success', 'The Career(s) Status has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Career $career
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Career $career)
    {
        if ($career->delete()) {
            return back()->with('success', 'The Career has been deleted');
        } else {
            return back()->with('error', 'Failed to delete a Career. Please try again.');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy_many(Request $request)
    {
        $itemIds = explode(',', $request->get('ids'));
        if (sizeof($itemIds) > 0 ) {
            $delete = Career::whereIn('id', $itemIds)->delete();
            if ($delete) {
                return redirect()->back()->with('success', 'The Career(s) has been deleted');
            }
        }

        return redirect()->back()->with('error', 'Failed to delete Career(s).');
    }

    /**
     * @param Career $career
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($career)
    {
        Career::withTrashed()->findOrFail($career)->restore();

        return back()->with('success', 'The Career has been restored');
    }

    public function validate_data(Request $request)
    {
        return $request->validate([
            'name' => 'required|max:150',
            'category_id' => 'required|exists:career_categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'contents' => 'required|max:4294967295',
            'teaser' => 'required|max:65535',
            'is_active' => '',
            'vacant_pos' => 'required'
        ]);
    }
}
