<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->responseJsonSuccess([
            'data' => Level::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $cwdUser = Level::create($request->all());
        } catch (\Exception $e) {
            return $this->responseJsonError([
                'message' => $e->getMessage(),
            ]);
        }

        return $this->responseJsonSuccess([
            'data' => $cwdUser
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $level = Level::find($id);
            $level->name = $request->post('name')?? $level->name;
            $level->rate = $request->post('rate')?? $level->rate;
            $level->save();

        } catch (\Exception $e) {
            return $this->responseJsonError([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }

        if($level){
            return $this->responseJsonSuccess([
                'success' => true,
                'message' => "update level success"
            ]);
        }else{
            return $this->responseJsonError([
                'success' => false,
                'message' => "update level fail"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $level = Level::destroy($id);
        } catch (\Exception $e) {
            return $this->responseJsonError([
                'message' => $e->getMessage(),
            ]);
        }

        if($level){
            return $this->responseJsonSuccess([
                'success' => true,
                'message' => "delete level success"
            ]);
        }else{
            return $this->responseJsonError([
                'success' => false,
                'message' => "delete level fail"
            ]);
        }
    }
}
