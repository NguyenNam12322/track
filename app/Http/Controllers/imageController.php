<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateimageRequest;
use App\Http\Requests\UpdateimageRequest;
use App\Repositories\imageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class imageController extends AppBaseController
{
    /** @var  imageRepository */
    private $imageRepository;

    public function __construct(imageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the image.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $images = $this->imageRepository->paginate(10);

        return view('images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new image.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param CreateimageRequest $request
     *
     * @return Response
     */
    public function store(CreateimageRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {

            $file_upload = $request->file('image');

            foreach ($file_upload as $key => $value) {
                $name = time() . '_' . $value->getClientOriginalName();

                $filePath = $value->storeAs('uploads/product', $name, 'public');

                $input['image'] = $filePath;

                $input['link'] = $filePath;

                $input['order'] = 0;

                $image = $this->imageRepository->create($input);
            }

            Flash::success('Image saved successfully.');

            return redirect()->back();
            
        }

    }

    /**
     * Display the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified image in storage.
     *
     * @param int $id
     * @param UpdateimageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateimageRequest $request)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        $input = $request->all();

        if(empty($request->order)){
            $input['order'] = 0;
        }


        if ($request->hasFile('image')) {

            $file_upload = $request->file('image');

            $name = time() . '_' . $file_upload->getClientOriginalName();

            $filePath = $file_upload->storeAs('uploads/product', $name, 'public');

            $input['image'] = $filePath;

            $input['link'] = $filePath;
        }

        $image = $this->imageRepository->update($input, $id);

        Flash::success('Image updated successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified image from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        $this->imageRepository->delete($id);

        Flash::success('Image deleted successfully.');

        return redirect(route('images.index'));
    }
}
