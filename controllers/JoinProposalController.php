<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/JoinProposal.php';
class JoinProposalController
{
    private $model;

    public function __construct()
    {
        $this->model = new JoinProposal();
    }

    public function showJoinProposalForm()
    {
        if (Middleware::checkAdmin()) {
            $joinProposals = $this->model->SelectJoinProposal();
            require_once 'views/admin/read/joinproposal.php';
        }
    }
}
