<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Repositories\categoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Response;

class categoryController extends AppBaseController
{
    /** @var  categoryRepository */
    private $categoryRepository;

    public function __construct(categoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the category.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepository->paginate(10);

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param CreatecategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatecategoryRequest $request)
    {
        $input = $request->all();

        $input['link'] = convertSlug($input['namecategory']);

        if ($request->hasFile('image')) {

             $file_upload = $request->file('image');

            $name = time() . '_' . $file_upload->getClientOriginalName();

            $filePath = $file_upload->storeAs('uploads/category', $name, 'public');

            $input['image'] = $filePath;

        }

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param int $id
     * @param UpdatecategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        $input = $request->all();

         if ($request->hasFile('image')) {

             $file_upload = $request->file('image');

            $name = time() . '_' . $file_upload->getClientOriginalName();

            $filePath = $file_upload->storeAs('uploads/category', $name, 'public');

            $input['image'] = $filePath;

        }

        
        $input['Link'] = convertSlug($input['namecategory']);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($input, $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified category from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);
        
        

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }
        $postOfCategory = DB::table('posts')->where('category', $id)->select('id')->get();
        
        if(count($postOfCategory)>0){
            Flash::error('Không thể xóa category này, sẽ gây lỗi hệ thống!');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
