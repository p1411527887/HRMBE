<?php

namespace App\Models;

use App\Constants\HrmIssueStatusConstant;
use Illuminate\Database\Eloquent\Model;

class JiraIssue extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'pkey',
        'issuenum',
        'PROJECT',
        'REPORTER',
        'ASSIGNEE',
        'CREATOR',
        'issuetype',
        'SUMMARY',
        'DESCRIPTION',
        'ENVIRONMENT',
        'PRIORITY',
        'RESOLUTION',
        'issuestatus',
        'CREATED',
        'UPDATED',
        'DUEDATE',
        'RESOLUTIONDATE',
        'VOTES',
        'WATCHES',
        'TIMEORIGINALESTIMATE',
        'TIMEESTIMATE',
        'TIMESPENT',
        'WORKFLOW_ID',
        'SECURITY',
        'FIXFOR',
        'COMPONENT',
        'ARCHIVED',
        'ARCHIVEDBY',
        'ARCHIVEDDATE',
    ];
    protected $primaryKey = 'ID';
    protected $table = 'jiraissue';

    public function getIssueStatusAttribute($issuestatus)
    {
        switch ($issuestatus) {
            case HrmIssueStatusConstant::ISSUE_STATUS_OPEN:
                return $this->issuestatus = 'Open';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_BLACK_LOG:
                return $this->issuestatus = 'Black Log';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_SELECTED_FOR_DEVELOPMENT:
                return $this->issuestatus = 'Selected for development';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_DONE:
                return $this->issuestatus = 'Done';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_TO_DO:
                return $this->issuestatus = 'To Do';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_TESTING:
                return $this->issuestatus = 'Testing';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_IN_PROGRESS:
                return $this->issuestatus = 'In Progress';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_REOPENED:
                return $this->issuestatus = 'Reopened';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_RESOLVED:
                return $this->issuestatus = 'Resolved';
                break;
            case HrmIssueStatusConstant::ISSUE_STATUS_CLOSED:
                return $this->issuestatus = 'Closed';
                break;
        }
    }

    public function Project(){
        return $this->hasOne(Project::class, 'ID', 'PROJECT')->select(["pname"]);
    }
}
