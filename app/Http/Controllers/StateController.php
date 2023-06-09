<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Repositories\StateRepositoryInterface;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private StateRepositoryInterface $state;

    public function __construct(StateRepositoryInterface $stateRepository)
    {
        $this->state = $stateRepository;
    }
    public function index()
    {
        $states = $this->state->all();
        return view('state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('state.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        $this->state->create($request->validated());
        return $this->state->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
