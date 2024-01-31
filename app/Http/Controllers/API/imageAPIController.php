<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateimageAPIRequest;
use App\Http\Requests\API\UpdateimageAPIRequest;
use App\Models\image;
use App\Repositories\imageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class imageController
 * @package App\Http\Controllers\API
 */

class imageAPIController extends AppBaseController
{
    /** @var  imageRepository */
    private $imageRepository;

    public function __construct(imageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the image.
     * GET|HEAD /images
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $images = $this->imageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($images->toArray(), 'Images retrieved successfully');
    }

    /**
     * Store a newly created image in storage.
     * POST /images
     *
     * @param CreateimageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateimageAPIRequest $request)
    {
        $input = $request->all();

        $image = $this->imageRepository->create($input);

        return $this->sendResponse($image->toArray(), 'Image saved successfully');
    }

    /**
     * Display the specified image.
     * GET|HEAD /images/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        return $this->sendResponse($image->toArray(), 'Image retrieved successfully');
    }

    /**
     * Update the specified image in storage.
     * PUT/PATCH /images/{id}
     *
     * @param int $id
     * @param UpdateimageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateimageAPIRequest $request)
    {
        $input = $request->all();

        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image = $this->imageRepository->update($input, $id);

        return $this->sendResponse($image->toArray(), 'image updated successfully');
    }

    /**
     * Remove the specified image from storage.
     * DELETE /images/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var image $image */
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            return $this->sendError('Image not found');
        }

        $image->delete();

        return $this->sendSuccess('Image deleted successfully');
    }
}
