<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Repositories\CharacterRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CharacterController extends AppBaseController
{
    /** @var  CharacterRepository */
    private $characterRepository;

    function __construct(CharacterRepository $characterRepo)
    {
        $this->characterRepository = $characterRepo;
    }

    /**
     * Display a listing of the Character.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->characterRepository->pushCriteria(new RequestCriteria($request));
        $characters = $this->characterRepository->all();

        return view('characters.index')
            ->with('characters', $characters);
    }

    /**
     * Show the form for creating a new Character.
     *
     * @return Response
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created Character in storage.
     *
     * @param CreateCharacterRequest $request
     *
     * @return Response
     */
    public function store(CreateCharacterRequest $request)
    {
        $input = $request->all();

        $character = $this->characterRepository->create($input);

        Flash::success('Character saved successfully.');

        return redirect(route('characters.index'));
    }

    /**
     * Display the specified Character.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $character = $this->characterRepository->findWithoutFail($id);

        if (empty($character)) {
            Flash::error('Character not found');

            return redirect(route('characters.index'));
        }

        return view('characters.show')->with('character', $character);
    }

    /**
     * Show the form for editing the specified Character.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $character = $this->characterRepository->findWithoutFail($id);

        if (empty($character)) {
            Flash::error('Character not found');

            return redirect(route('characters.index'));
        }

        return view('characters.edit')->with('character', $character);
    }

    /**
     * Update the specified Character in storage.
     *
     * @param  int              $id
     * @param UpdateCharacterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCharacterRequest $request)
    {
        $character = $this->characterRepository->findWithoutFail($id);

        if (empty($character)) {
            Flash::error('Character not found');

            return redirect(route('characters.index'));
        }

        $character = $this->characterRepository->update($request->all(), $id);

        Flash::success('Character updated successfully.');

        return redirect(route('characters.index'));
    }

    /**
     * Remove the specified Character from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $character = $this->characterRepository->findWithoutFail($id);

        if (empty($character)) {
            Flash::error('Character not found');

            return redirect(route('characters.index'));
        }

        $this->characterRepository->delete($id);

        Flash::success('Character deleted successfully.');

        return redirect(route('characters.index'));
    }
}
