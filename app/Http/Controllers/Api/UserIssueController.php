<?php

namespace App\Http\Controllers\Api;

use App\Constants\HrmIssueStatusConstant;
use App\Http\Controllers\Controller;
use App\Models\CwdUser;
use App\Models\JiraIssue;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserIssueController extends Controller
{
    use ResponseTrait;

    public function view(Request $request){
        $user_id = auth()->user()['ID'];
//        $creator = "JIRAUSER".(string)$user['ID'];
        $start_day = $request->get('start_day') ?? null;
        $end_day = $request->get('end_day') ?? null;
        $size = $request->get('size') ?? 5;
        return $this->renderDataUserIssue($user_id, $start_day, $end_day, $size);
    }

    public function show(Request $request, $id){
        $start_day = $request->get('start_day') ?? null;
        $end_day = $request->get('end_day') ?? null;
        $size = $request->get('size') ?? 5;
        return $this->renderDataUserIssue($id, $start_day, $end_day, $size);
    }

    public function renderDataUserIssue($id_creator, $start_day, $end_day, $size)
    {
        $creator = "JIRAUSER".(string)$id_creator;

        $query = DB::table('jiraissue')->join('issuestatus', 'jiraissue.issuestatus', '=', 'issuestatus.id')
            ->join('project', 'jiraissue.PROJECT', '=', 'project.ID')
            ->where('jiraissue.creator', 'like', $creator);
        if($start_day){
            $query->whereBetween('jiraissue.CREATED', [$start_day, $end_day ?? Carbon::now()]);
        }
        $query->select('jiraissue.*', 'issuestatus.pname as issuestatus_name', 'project.pname as project_name');
        $listIssue = $query->paginate($size);
        foreach ($listIssue as $item){
            if($item->issuestatus == HrmIssueStatusConstant::ISSUE_STATUS_DONE){
                $user_attribute_rate = DB::table('cwd_user_attributes')->where('user_id', '=', $id_creator)
                    ->where('attribute_name', 'like', 'rate')->get();
                $item->point = $item->TIMESPENT/360 * $user_attribute_rate[0]->attribute_value;
            }
            $item->creator_name = CwdUser::find($id_creator)->display_name;
        }
        if($listIssue){
            return $this->responseJsonSuccess([
                'success' => true,
                'data' => $listIssue
            ]);
        }else{
            return $this->responseJsonSuccess([
                'success' => false,
                'message' => 'error - not get data'
            ]);
        }
    }
}
