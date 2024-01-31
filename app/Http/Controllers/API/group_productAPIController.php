<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Creategroup_productAPIRequest;
use App\Http\Requests\API\Updategroup_productAPIRequest;
use App\Models\group_product;
use App\Repositories\group_productRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class group_productController
 * @package App\Http\Controllers\API
 */

class group_productAPIController extends AppBaseController
{
    /** @var  group_productRepository */
    private $groupProductRepository;

    public function __construct(group_productRepository $groupProductRepo)
    {
        $this->groupProductRepository = $groupProductRepo;
    }

    /**
     * Display a listing of the group_product.
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
     * Store a newly created group_product in storage.
     * POST /groupProducts
     *
     * @param Creategroup_productAPIRequest $request
     *
     * @return Response
     */
    public function store(Creategroup_productAPIRequest $request)
    {
        $input = $request->all();

        $groupProduct = $this->groupProductRepository->create($input);

        return $this->sendResponse($groupProduct->toArray(), 'Group Product saved successfully');
    }

    /**
     * Display the specified group_product.
     * GET|HEAD /groupProducts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var group_product $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        return $this->sendResponse($groupProduct->toArray(), 'Group Product retrieved successfully');
    }

    /**
     * Update the specified group_product in storage.
     * PUT/PATCH /groupProducts/{id}
     *
     * @param int $id
     * @param Updategroup_productAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updategroup_productAPIRequest $request)
    {
        $input = $request->all();

        /** @var group_product $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        $groupProduct = $this->groupProductRepository->update($input, $id);

        return $this->sendResponse($groupProduct->toArray(), 'group_product updated successfully');
    }

    /**
     * Remove the specified group_product from storage.
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
        /** @var group_product $groupProduct */
        $groupProduct = $this->groupProductRepository->find($id);

        if (empty($groupProduct)) {
            return $this->sendError('Group Product not found');
        }

        $groupProduct->delete();

        return $this->sendSuccess('Group Product deleted successfully');
    }
}
