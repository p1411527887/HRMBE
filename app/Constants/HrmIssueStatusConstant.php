<?php

namespace App\Constants;

class HrmIssueStatusConstant
{
    public const ISSUE_STATUS_OPEN = 1;
    public const ISSUE_STATUS_BLACK_LOG = 10000;
    public const ISSUE_STATUS_SELECTED_FOR_DEVELOPMENT = 10001;
    public const ISSUE_STATUS_DONE = 10002;
    public const ISSUE_STATUS_TO_DO = 10003;
    public const ISSUE_STATUS_TESTING = 10004;
    public const ISSUE_STATUS_IN_PROGRESS = 3;
    public const ISSUE_STATUS_REOPENED = 4;
    public const ISSUE_STATUS_RESOLVED = 5;
    public const ISSUE_STATUS_CLOSED = 6;
}
