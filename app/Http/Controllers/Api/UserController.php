<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $size = $request->get('size') ?? 5;
        $cwdUser = DB::table('cwd_user')
            ->join('cwd_user_attributes', 'cwd_user.id', '=', 'cwd_user_attributes.user_id')
            ->join('cwd_membership', 'cwd_user.id', '=', 'cwd_membership.child_id')
            ->join('levels', 'levels.id', '=', 'cwd_user_attributes.attribute_value')
            ->where('cwd_user_attributes.attribute_name', 'like', 'level.id')
            ->select('cwd_user.*', 'cwd_membership.parent_name', 'levels.name as level_name', 'levels.rate') //'level.*'
            ->paginate($size);


        if($cwdUser){
            foreach($cwdUser as $item) {
                $item->phone = null;
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_date);
                $from = Carbon::now();
                $diff_in_months = $to->diffInMonths($from);
                $item->seniority = $diff_in_months;
            }
            return $this->responseJsonSuccess([
                'success' => true,
                'data' => $cwdUser
            ]);
        }else{
            return $this->responseJsonError([
                'success' => false,
                'error' => "Error",
            ]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
