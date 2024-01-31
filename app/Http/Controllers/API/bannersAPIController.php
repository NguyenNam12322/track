<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebannersAPIRequest;
use App\Http\Requests\API\UpdatebannersAPIRequest;
use App\Models\banners;
use App\Repositories\bannersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class bannersController
 * @package App\Http\Controllers\API
 */

class bannersAPIController extends AppBaseController
{
    /** @var  bannersRepository */
    private $bannersRepository;

    public function __construct(bannersRepository $bannersRepo)
    {
        $this->bannersRepository = $bannersRepo;
    }

    /**
     * Display a listing of the banners.
     * GET|HEAD /banners
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $banners = $this->bannersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($banners->toArray(), 'Banners retrieved successfully');
    }

    /**
     * Store a newly created banners in storage.
     * POST /banners
     *
     * @param CreatebannersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatebannersAPIRequest $request)
    {
        $input = $request->all();

        $banners = $this->bannersRepository->create($input);

        return $this->sendResponse($banners->toArray(), 'Banners saved successfully');
    }

    /**
     * Display the specified banners.
     * GET|HEAD /banners/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var banners $banners */
        $banners = $this->bannersRepository->find($id);

        if (empty($banners)) {
            return $this->sendError('Banners not found');
        }

        return $this->sendResponse($banners->toArray(), 'Banners retrieved successfully');
    }

    /**
     * Update the specified banners in storage.
     * PUT/PATCH /banners/{id}
     *
     * @param int $id
     * @param UpdatebannersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebannersAPIRequest $request)
    {
        $input = $request->all();

        /** @var banners $banners */
        $banners = $this->bannersRepository->find($id);

        if (empty($banners)) {
            return $this->sendError('Banners not found');
        }

        $banners = $this->bannersRepository->update($input, $id);

        return $this->sendResponse($banners->toArray(), 'banners updated successfully');
    }

    /**
     * Remove the specified banners from storage.
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
        /** @var banners $banners */
        $banners = $this->bannersRepository->find($id);

        if (empty($banners)) {
            return $this->sendError('Banners not found');
        }

        $banners->delete();

        return $this->sendSuccess('Banners deleted successfully');
    }
}
