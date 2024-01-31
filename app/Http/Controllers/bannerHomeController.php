<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebannerHomeRequest;
use App\Http\Requests\UpdatebannerHomeRequest;
use App\Repositories\bannerHomeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class bannerHomeController extends AppBaseController
{
    /** @var  bannerHomeRepository */
    private $bannerHomeRepository;

    public function __construct(bannerHomeRepository $bannerHomeRepo)
    {
        $this->bannerHomeRepository = $bannerHomeRepo;
    }

    /**
     * Display a listing of the bannerHome.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bannerHomes = $this->bannerHomeRepository->paginate(10);

        return view('banner_homes.index')
            ->with('bannerHomes', $bannerHomes);
    }

    /**
     * Show the form for creating a new bannerHome.
     *
     * @return Response
     */
    public function create()
    {
        return view('banner_homes.create');
    }

    /**
     * Store a newly created bannerHome in storage.
     *
     * @param CreatebannerHomeRequest $request
     *
     * @return Response
     */
    public function store(CreatebannerHomeRequest $request)
    {
        $input = $request->all();

        $bannerHome = $this->bannerHomeRepository->create($input);

        Flash::success('Banner Home saved successfully.');

        return redirect(route('bannerHomes.index'));
    }

    /**
     * Display the specified bannerHome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            Flash::error('Banner Home not found');

            return redirect(route('bannerHomes.index'));
        }

        return view('banner_homes.show')->with('bannerHome', $bannerHome);
    }

    /**
     * Show the form for editing the specified bannerHome.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            Flash::error('Banner Home not found');

            return redirect(route('bannerHomes.index'));
        }

        return view('banner_homes.edit')->with('bannerHome', $bannerHome);
    }

    /**
     * Update the specified bannerHome in storage.
     *
     * @param int $id
     * @param UpdatebannerHomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebannerHomeRequest $request)
    {
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            Flash::error('Banner Home not found');

            return redirect(route('bannerHomes.index'));
        }

        $bannerHome = $this->bannerHomeRepository->update($request->all(), $id);

        Flash::success('Banner Home updated successfully.');

        return redirect(route('bannerHomes.index'));
    }

    /**
     * Remove the specified bannerHome from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bannerHome = $this->bannerHomeRepository->find($id);

        if (empty($bannerHome)) {
            Flash::error('Banner Home not found');

            return redirect(route('bannerHomes.index'));
        }

        $this->bannerHomeRepository->delete($id);

        Flash::success('Banner Home deleted successfully.');

        return redirect(route('bannerHomes.index'));
    }
}
