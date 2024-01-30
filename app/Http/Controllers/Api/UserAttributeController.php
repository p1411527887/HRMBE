<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAttributeController extends Controller
{
    use ResponseTrait;

    public function update(Request $request, string $id)
    {
        $checkData = [];
        $rate = $request->post('rate');
        $level = $request->post('level_id');
        $lastRate = $request->post('last_rate');
        $query1 = DB::table('cwd_user_attributes')->where('user_id', '=', $id);
        $query2 = DB::table('cwd_user_attributes')->where('user_id', '=', $id);
        $query3 = DB::table('cwd_user_attributes')->where('user_id', '=', $id);

        $countCheckData = 0;

        if($rate){
            $checkData[] = $rate;
            $update_rate = $query1->where('attribute_name', 'like', 'rate')
                ->update(['attribute_value' => $rate, 'lower_attribute_value' => $rate]);
            if($update_rate){
                $countCheckData = $countCheckData + 1 ;
            }
        }
        if($level){
            $checkData[] = $level;
            $update_level = $query2->where('attribute_name', 'like', 'level.id')
                ->update(['attribute_value' => $level, 'lower_attribute_value' => $level]);
            if($update_level){
                $countCheckData = $countCheckData + 1 ;
            }

        }
        if($lastRate){
            $checkData[] = $lastRate;
            $update_last_rate = $query3->where('attribute_name', 'like', 'lastRate')
                ->update(['attribute_value' => $lastRate, 'lower_attribute_value' => $lastRate]);
            if($update_last_rate){
                $countCheckData = $countCheckData + 1 ;
            }
        }

        if($countCheckData === count($checkData)){
            return $this->responseJsonSuccess([
                'success' => true,
                'message' => 'update success'
            ]);
        }else{
            return $this->responseJsonError([
                'success' => false,
                'message' => 'update fails'
            ]);
        }
    }
}
