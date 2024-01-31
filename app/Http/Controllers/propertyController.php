<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepropertyRequest;
use App\Http\Requests\UpdatepropertyRequest;
use App\Repositories\propertyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

use App\Models\property;
use Flash;
use Response;

class propertyController extends AppBaseController
{
    /** @var  propertyRepository */
    private $propertyRepository;

    public function __construct(propertyRepository $propertyRepo)
    {
        $this->propertyRepository = $propertyRepo;
    }

    /**
     * Display a listing of the property.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $properties = $this->propertyRepository->paginate(10);

        return view('properties.index')
            ->with('properties', $properties);
    }

    /**
     * Show the form for creating a new property.
     *
     * @return Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created property in storage.
     *
     * @param CreatepropertyRequest $request
     *
     * @return Response
     */
    public function store(CreatepropertyRequest $request)
    {
        $input = $request->all();

        $property = $this->propertyRepository->create($input);

        Flash::success('Property saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified property.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        return view('properties.show')->with('property', $property);
    }

    /**
     * Show the form for editing the specified property.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        return view('properties.edit')->with('property', $property);
    }

    /**
     * Update the specified property in storage.
     *
     * @param int $id
     * @param UpdatepropertyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepropertyRequest $request)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        $property = $this->propertyRepository->update($request->all(), $id);

        Flash::success('Property updated successfully.');

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified property from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error('Property not found');

            return redirect(route('properties.index'));
        }

        $this->propertyRepository->delete($id);

        Flash::success('Property deleted successfully.');

        return redirect(route('properties.index'));
    }

    public function editPropertyChild(Request $request){
        $id = $request->id;

        $name = $request->name;


        if(!empty($name)){

            $property = property::find($id);

            $property->name = $name;

            $property->save();
        }

    }

    public function removePropertyChild(Request $request){
        $id = $request->id;

        property::find($id)->delete(); ; 

    }
}
