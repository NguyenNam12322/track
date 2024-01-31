<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepropertyAPIRequest;
use App\Http\Requests\API\UpdatepropertyAPIRequest;
use App\Models\property;
use App\Repositories\propertyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class propertyController
 * @package App\Http\Controllers\API
 */

class propertyAPIController extends AppBaseController
{
    /** @var  propertyRepository */
    private $propertyRepository;

    public function __construct(propertyRepository $propertyRepo)
    {
        $this->propertyRepository = $propertyRepo;
    }

    /**
     * Display a listing of the property.
     * GET|HEAD /properties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $properties = $this->propertyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($properties->toArray(), 'Properties retrieved successfully');
    }

    /**
     * Store a newly created property in storage.
     * POST /properties
     *
     * @param CreatepropertyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepropertyAPIRequest $request)
    {
        $input = $request->all();

        $property = $this->propertyRepository->create($input);

        return $this->sendResponse($property->toArray(), 'Property saved successfully');
    }

    /**
     * Display the specified property.
     * GET|HEAD /properties/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var property $property */
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            return $this->sendError('Property not found');
        }

        return $this->sendResponse($property->toArray(), 'Property retrieved successfully');
    }

    /**
     * Update the specified property in storage.
     * PUT/PATCH /properties/{id}
     *
     * @param int $id
     * @param UpdatepropertyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepropertyAPIRequest $request)
    {
        $input = $request->all();

        /** @var property $property */
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            return $this->sendError('Property not found');
        }

        $property = $this->propertyRepository->update($input, $id);

        return $this->sendResponse($property->toArray(), 'property updated successfully');
    }

    /**
     * Remove the specified property from storage.
     * DELETE /properties/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var property $property */
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            return $this->sendError('Property not found');
        }

        $property->delete();

        return $this->sendSuccess('Property deleted successfully');
    }
}
