<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategiftAPIRequest;
use App\Http\Requests\API\UpdategiftAPIRequest;
use App\Models\gift;
use App\Repositories\giftRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class giftController
 * @package App\Http\Controllers\API
 */

class giftAPIController extends AppBaseController
{
    /** @var  giftRepository */
    private $giftRepository;

    public function __construct(giftRepository $giftRepo)
    {
        $this->giftRepository = $giftRepo;
    }

    /**
     * Display a listing of the gift.
     * GET|HEAD /gifts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $gifts = $this->giftRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($gifts->toArray(), 'Gifts retrieved successfully');
    }

    /**
     * Store a newly created gift in storage.
     * POST /gifts
     *
     * @param CreategiftAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategiftAPIRequest $request)
    {
        $input = $request->all();

        $gift = $this->giftRepository->create($input);

        return $this->sendResponse($gift->toArray(), 'Gift saved successfully');
    }

    /**
     * Display the specified gift.
     * GET|HEAD /gifts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var gift $gift */
        $gift = $this->giftRepository->find($id);

        if (empty($gift)) {
            return $this->sendError('Gift not found');
        }

        return $this->sendResponse($gift->toArray(), 'Gift retrieved successfully');
    }

    /**
     * Update the specified gift in storage.
     * PUT/PATCH /gifts/{id}
     *
     * @param int $id
     * @param UpdategiftAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategiftAPIRequest $request)
    {
        $input = $request->all();

        /** @var gift $gift */
        $gift = $this->giftRepository->find($id);

        if (empty($gift)) {
            return $this->sendError('Gift not found');
        }

        $gift = $this->giftRepository->update($input, $id);

        return $this->sendResponse($gift->toArray(), 'gift updated successfully');
    }

    /**
     * Remove the specified gift from storage.
     * DELETE /gifts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var gift $gift */
        $gift = $this->giftRepository->find($id);

        if (empty($gift)) {
            return $this->sendError('Gift not found');
        }

        $gift->delete();

        return $this->sendSuccess('Gift deleted successfully');
    }
}
