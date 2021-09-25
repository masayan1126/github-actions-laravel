<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zaico\Domain\User\Repository\UserRepository;
use Zaico\Domain\User\UserCriteria;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = $this->buildCriteria([]);

        $array = $this->userRepository->searchByCriteria($criteria);

        return view('user', [
            'users' => $array,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->userRepository->findById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function buildCriteria(array $args): UserCriteria
    {
        $input = collect($args);

        $criteria = new UserCriteria();
        // $criteria->setFirst($input->get('first'))->setPage($input->get('page', 1));

        if ($input->get('id')) {
            $criteria->setId($input->get('id'));
        }

        if ($input->get('name')) {
            $criteria->setName($input->get('name'));
        }

        if ($input->get('email')) {
            $criteria->setEmail($input->get('email'));
        }

        return $criteria;
    }
}
