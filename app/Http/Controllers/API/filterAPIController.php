<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefilterAPIRequest;
use App\Http\Requests\API\UpdatefilterAPIRequest;
use App\Models\filter;
use App\Repositories\filterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class filterController
 * @package App\Http\Controllers\API
 */

class filterAPIController extends AppBaseController
{
    /** @var  filterRepository */
    private $filterRepository;

    public function __construct(filterRepository $filterRepo)
    {
        $this->filterRepository = $filterRepo;
    }

    /**
     * Display a listing of the filter.
     * GET|HEAD /filters
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $filters = $this->filterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($filters->toArray(), 'Filters retrieved successfully');
    }

    /**
     * Store a newly created filter in storage.
     * POST /filters
     *
     * @param CreatefilterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefilterAPIRequest $request)
    {
        $input = $request->all();

        $filter = $this->filterRepository->create($input);

        return $this->sendResponse($filter->toArray(), 'Filter saved successfully');
    }

    /**
     * Display the specified filter.
     * GET|HEAD /filters/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var filter $filter */
        $filter = $this->filterRepository->find($id);

        if (empty($filter)) {
            return $this->sendError('Filter not found');
        }

        return $this->sendResponse($filter->toArray(), 'Filter retrieved successfully');
    }

    /**
     * Update the specified filter in storage.
     * PUT/PATCH /filters/{id}
     *
     * @param int $id
     * @param UpdatefilterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefilterAPIRequest $request)
    {
        $input = $request->all();

        /** @var filter $filter */
        $filter = $this->filterRepository->find($id);

        if (empty($filter)) {
            return $this->sendError('Filter not found');
        }

        $filter = $this->filterRepository->update($input, $id);

        return $this->sendResponse($filter->toArray(), 'filter updated successfully');
    }

    /**
     * Remove the specified filter from storage.
     * DELETE /filters/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var filter $filter */
        $filter = $this->filterRepository->find($id);

        if (empty($filter)) {
            return $this->sendError('Filter not found');
        }

        $filter->delete();

        return $this->sendSuccess('Filter deleted successfully');
    }
}
