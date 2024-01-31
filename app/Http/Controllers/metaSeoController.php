<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemetaSeoRequest;
use App\Http\Requests\UpdatemetaSeoRequest;
use App\Repositories\metaSeoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class metaSeoController extends AppBaseController
{
    /** @var  metaSeoRepository */
    private $metaSeoRepository;

    public function __construct(metaSeoRepository $metaSeoRepo)
    {
        $this->metaSeoRepository = $metaSeoRepo;
    }

    /**
     * Display a listing of the metaSeo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $metaSeos = $this->metaSeoRepository->paginate(10);

        return view('meta_seos.index')
            ->with('metaSeos', $metaSeos);
    }

    /**
     * Show the form for creating a new metaSeo.
     *
     * @return Response
     */
    public function create()
    {
        return view('meta_seos.create');
    }

    /**
     * Store a newly created metaSeo in storage.
     *
     * @param CreatemetaSeoRequest $request
     *
     * @return Response
     */
    public function store(CreatemetaSeoRequest $request)
    {
        $input = $request->all();

        $metaSeo = $this->metaSeoRepository->create($input);

        Flash::success('Meta Seo saved successfully.');

        return redirect(route('metaSeos.index'));
    }

    /**
     * Display the specified metaSeo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            Flash::error('Meta Seo not found');

            return redirect(route('metaSeos.index'));
        }

        return view('meta_seos.show')->with('metaSeo', $metaSeo);
    }

    /**
     * Show the form for editing the specified metaSeo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            Flash::error('Meta Seo not found');

            return redirect(route('metaSeos.index'));
        }

        return view('meta_seos.edit')->with('metaSeo', $metaSeo);
    }

    /**
     * Update the specified metaSeo in storage.
     *
     * @param int $id
     * @param UpdatemetaSeoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemetaSeoRequest $request)
    {
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            Flash::error('Meta Seo not found');

            return redirect(route('metaSeos.index'));
        }

        $metaSeo = $this->metaSeoRepository->update($request->all(), $id);

        Flash::success('Meta Seo updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified metaSeo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $metaSeo = $this->metaSeoRepository->find($id);

        if (empty($metaSeo)) {
            Flash::error('Meta Seo not found');

            return redirect(route('metaSeos.index'));
        }

        $this->metaSeoRepository->delete($id);

        Flash::success('Meta Seo deleted successfully.');

        return redirect(route('metaSeos.index'));
    }
}
