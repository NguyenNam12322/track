<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemetaSeoAPIRequest;
use App\Http\Requests\API\UpdatemetaSeoAPIRequest;
use App\Models\metaSeo;
use App\Repositories\metaSeoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class metaSeoController
 * @package App\Http\Controllers\API
 */

class metaSeoAPIController extends AppBaseController
{
    /** @var  metaSeoRepository */
    private $metaSeoRepository;

    public function __construct(metaSeoRepository $metaSeoRepo)
    {
        $this->metaSeoRepository = $metaSeoRepo;
    }

    /**
     * Display a listing of the metaSeo.
     * GET|HEAD /metaSeos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $metaSeos = $this->metaSeoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($metaSeos->toArray(), 'Meta Seos retrieved successfully');
    }

    /**
     * Store a newly created metaSeo in storage.
     * POST /metaSeos
     *
     * @param CreatemetaSeoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemetaSeoAPIRequest $request)
    {
        $input = $request->all();

        $metaSeo = $this->metaSeoRepository->create($input);

        return $this->sendResponse($metaSeo->toArray(), 'Meta Seo saved successfully');
    }

    /**
     * Display the specified metaSeo.
     * GET|HEAD /metaSeos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var metaSeo $metaSeo */
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            return $this->sendError('Meta Seo not found');
        }

        return $this->sendResponse($metaSeo->toArray(), 'Meta Seo retrieved successfully');
    }

    /**
     * Update the specified metaSeo in storage.
     * PUT/PATCH /metaSeos/{id}
     *
     * @param int $id
     * @param UpdatemetaSeoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemetaSeoAPIRequest $request)
    {
        $input = $request->all();

        /** @var metaSeo $metaSeo */
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            return $this->sendError('Meta Seo not found');
        }

        $metaSeo = $this->metaSeoRepository->update($input, $id);

        return $this->sendResponse($metaSeo->toArray(), 'metaSeo updated successfully');
    }

    /**
     * Remove the specified metaSeo from storage.
     * DELETE /metaSeos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var metaSeo $metaSeo */
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            return $this->sendError('Meta Seo not found');
        }

        $metaSeo->delete();

        return $this->sendSuccess('Meta Seo deleted successfully');
    }
}
