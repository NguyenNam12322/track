<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategroupProductAPIRequest;
use App\Http\Requests\API\UpdategroupProductAPIRequest;
use App\Models\groupProduct;
use App\Repositories\groupProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class groupProductController
 * @package App\Http\Controllers\API
 */

class groupProductAPIController extends AppBaseController
{
    /** @var  groupProductRepository */
    private $groupProductRepository;

    public function __construct(groupProductRepository $groupProductRepo)
    {
        $this->groupProductRepository = $groupProductRepo;
    }

    /**
     * Display a listing of the groupProduct.
     * GET|HEAD /groupProducts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $groupProducts = $this->groupProductRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($groupProducts->toArray(), 'Group Products retrieved successfully');
    }

    /**
     * Store a newly created groupProduct in storage.
     * POST /groupProducts
     *
     * @param CreategroupProductAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategroupProductAPIRequest $request)
    {
        $input = $request->all();

        $groupProduct = $this->groupProductRepository->create($input);

        return $this->sendResponse($groupProduct->toArray(), 'Group Product saved successfully');
    }

    /**
     * Display the specified groupProduct.
     * GET|HEAD /groupProducts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var groupProduct $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        return $this->sendResponse($groupProduct->toArray(), 'Group Product retrieved successfully');
    }

    /**
     * Update the specified groupProduct in storage.
     * PUT/PATCH /groupProducts/{id}
     *
     * @param int $id
     * @param UpdategroupProductAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategroupProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var groupProduct $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        $groupProduct = $this->groupProductRepository->update($input, $id);

        return $this->sendResponse($groupProduct->toArray(), 'groupProduct updated successfully');
    }

    /**
     * Remove the specified groupProduct from storage.
     * DELETE /groupProducts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var groupProduct $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        $groupProduct->delete();

        return $this->sendSuccess('Group Product deleted successfully');
    }
}
