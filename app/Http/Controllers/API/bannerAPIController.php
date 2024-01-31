<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebannerAPIRequest;
use App\Http\Requests\API\UpdatebannerAPIRequest;
use App\Models\banner;
use App\Repositories\bannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class bannerController
 * @package App\Http\Controllers\API
 */

class bannerAPIController extends AppBaseController
{
    /** @var  bannerRepository */
    private $bannerRepository;

    public function __construct(bannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the banner.
     * GET|HEAD /banners
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $banners = $this->bannerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($banners->toArray(), 'Banners retrieved successfully');
    }

    /**
     * Store a newly created banner in storage.
     * POST /banners
     *
     * @param CreatebannerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebannerAPIRequest $request)
    {
        $input = $request->all();

        $banner = $this->bannerRepository->create($input);

        return $this->sendResponse($banner->toArray(), 'Banner saved successfully');
    }

    /**
     * Display the specified banner.
     * GET|HEAD /banners/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('Banner not found');
        }

        return $this->sendResponse($banner->toArray(), 'Banner retrieved successfully');
    }

    /**
     * Update the specified banner in storage.
     * PUT/PATCH /banners/{id}
     *
     * @param int $id
     * @param UpdatebannerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebannerAPIRequest $request)
    {
        $input = $request->all();

        /** @var banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('Banner not found');
        }

        $banner = $this->bannerRepository->update($input, $id);

        return $this->sendResponse($banner->toArray(), 'banner updated successfully');
    }

    /**
     * Remove the specified banner from storage.
     * DELETE /banners/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var banner $banner */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('Banner not found');
        }

        $banner->delete();

        return $this->sendSuccess('Banner deleted successfully');
    }
}
