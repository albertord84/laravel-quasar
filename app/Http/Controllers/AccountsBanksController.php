<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountsBanksRequest;
use App\Http\Requests\UpdateAccountsBanksRequest;
use App\Repositories\AccountsBanksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AccountsBanksController extends AppBaseController
{
    /** @var  AccountsBanksRepository */
    private $accountsBanksRepository;

    public function __construct(AccountsBanksRepository $accountsBanksRepo)
    {
        $this->accountsBanksRepository = $accountsBanksRepo;
    }

    /**
     * Display a listing of the AccountsBanks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $accountsBanks = $this->accountsBanksRepository->filterAccountsBanks($input);
        return $accountsBanks->toJson();

        // $accountsBanks = $this->accountsBanksRepository->all();
        // return view('accounts_banks.index')
        //     ->with('accountsBanks', $accountsBanks);
    }

    /**
     * Show the form for creating a new AccountsBanks.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounts_banks.create');
    }

    /**
     * Store a newly created AccountsBanks in storage.
     *
     * @param CreateAccountsBanksRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountsBanksRequest $request)
    {
        $input = $request->all();

        $accountsBanks = $this->accountsBanksRepository->create($input);

        Flash::success('Accounts Banks saved successfully.');

        return redirect(route('accountsBanks.index'));
    }

    /**
     * Display the specified AccountsBanks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountsBanks = $this->accountsBanksRepository->find($id);

        if (empty($accountsBanks)) {
            Flash::error('Accounts Banks not found');

            return redirect(route('accountsBanks.index'));
        }

        return view('accounts_banks.show')->with('accountsBanks', $accountsBanks);
    }

    /**
     * Show the form for editing the specified AccountsBanks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountsBanks = $this->accountsBanksRepository->find($id);

        if (empty($accountsBanks)) {
            Flash::error('Accounts Banks not found');

            return redirect(route('accountsBanks.index'));
        }

        return view('accounts_banks.edit')->with('accountsBanks', $accountsBanks);
    }

    /**
     * Update the specified AccountsBanks in storage.
     *
     * @param int $id
     * @param UpdateAccountsBanksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountsBanksRequest $request)
    {
        $accountsBanks = $this->accountsBanksRepository->find($id);

        if (empty($accountsBanks)) {
            Flash::error('Accounts Banks not found');

            return redirect(route('accountsBanks.index'));
        }

        $accountsBanks = $this->accountsBanksRepository->update($request->all(), $id);

        Flash::success('Accounts Banks updated successfully.');

        return redirect(route('accountsBanks.index'));
    }

    /**
     * Remove the specified AccountsBanks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountsBanks = $this->accountsBanksRepository->find($id);

        if (empty($accountsBanks)) {
            Flash::error('Accounts Banks not found');

            return redirect(route('accountsBanks.index'));
        }

        $this->accountsBanksRepository->delete($id);

        Flash::success('Accounts Banks deleted successfully.');

        return redirect(route('accountsBanks.index'));
    }
}
