<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemakerAPIRequest;
use App\Http\Requests\API\UpdatemakerAPIRequest;
use App\Models\maker;
use App\Repositories\makerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class makerController
 * @package App\Http\Controllers\API
 */

class makerAPIController extends AppBaseController
{
    /** @var  makerRepository */
    private $makerRepository;

    public function __construct(makerRepository $makerRepo)
    {
        $this->makerRepository = $makerRepo;
    }

    /**
     * Display a listing of the maker.
     * GET|HEAD /makers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $makers = $this->makerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($makers->toArray(), 'Makers retrieved successfully');
    }

    /**
     * Store a newly created maker in storage.
     * POST /makers
     *
     * @param CreatemakerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemakerAPIRequest $request)
    {
        $input = $request->all();

        $maker = $this->makerRepository->create($input);

        return $this->sendResponse($maker->toArray(), 'Maker saved successfully');
    }

    /**
     * Display the specified maker.
     * GET|HEAD /makers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var maker $maker */
        $maker = $this->makerRepository->find($id);

        if (empty($maker)) {
            return $this->sendError('Maker not found');
        }

        return $this->sendResponse($maker->toArray(), 'Maker retrieved successfully');
    }

    /**
     * Update the specified maker in storage.
     * PUT/PATCH /makers/{id}
     *
     * @param int $id
     * @param UpdatemakerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemakerAPIRequest $request)
    {
        $input = $request->all();

        /** @var maker $maker */
        $maker = $this->makerRepository->find($id);

        if (empty($maker)) {
            return $this->sendError('Maker not found');
        }

        $maker = $this->makerRepository->update($input, $id);

        return $this->sendResponse($maker->toArray(), 'maker updated successfully');
    }

    /**
     * Remove the specified maker from storage.
     * DELETE /makers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var maker $maker */
        $maker = $this->makerRepository->find($id);

        if (empty($maker)) {
            return $this->sendError('Maker not found');
        }

        $maker->delete();

        return $this->sendSuccess('Maker deleted successfully');
    }
}
