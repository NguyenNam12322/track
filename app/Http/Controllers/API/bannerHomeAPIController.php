<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebannerHomeAPIRequest;
use App\Http\Requests\API\UpdatebannerHomeAPIRequest;
use App\Models\bannerHome;
use App\Repositories\bannerHomeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class bannerHomeController
 * @package App\Http\Controllers\API
 */

class bannerHomeAPIController extends AppBaseController
{
    /** @var  bannerHomeRepository */
    private $bannerHomeRepository;

    public function __construct(bannerHomeRepository $bannerHomeRepo)
    {
        $this->bannerHomeRepository = $bannerHomeRepo;
    }

    /**
     * Display a listing of the bannerHome.
     * GET|HEAD /bannerHomes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bannerHomes = $this->bannerHomeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bannerHomes->toArray(), 'Banner Homes retrieved successfully');
    }

    /**
     * Store a newly created bannerHome in storage.
     * POST /bannerHomes
     *
     * @param CreatebannerHomeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebannerHomeAPIRequest $request)
    {
        $input = $request->all();

        $bannerHome = $this->bannerHomeRepository->create($input);

        return $this->sendResponse($bannerHome->toArray(), 'Banner Home saved successfully');
    }

    /**
     * Display the specified bannerHome.
     * GET|HEAD /bannerHomes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var bannerHome $bannerHome */
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            return $this->sendError('Banner Home not found');
        }

        return $this->sendResponse($bannerHome->toArray(), 'Banner Home retrieved successfully');
    }

    /**
     * Update the specified bannerHome in storage.
     * PUT/PATCH /bannerHomes/{id}
     *
     * @param int $id
     * @param UpdatebannerHomeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebannerHomeAPIRequest $request)
    {
        $input = $request->all();

        /** @var bannerHome $bannerHome */
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            return $this->sendError('Banner Home not found');
        }

        $bannerHome = $this->bannerHomeRepository->update($input, $id);

        return $this->sendResponse($bannerHome->toArray(), 'bannerHome updated successfully');
    }

    /**
     * Remove the specified bannerHome from storage.
     * DELETE /bannerHomes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var bannerHome $bannerHome */
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            return $this->sendError('Banner Home not found');
        }

        $bannerHome->delete();

        return $this->sendSuccess('Banner Home deleted successfully');
    }
}
