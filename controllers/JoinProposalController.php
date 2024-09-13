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
    public function showEditJoinProposalForm()
    {
        require_once 'views/admin/addJoinProposal.php';
        //form nya memang lom ada ya?
    }

    public function editJoinProposal()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idteam = $_POST['idteam'];
            $idmember = $_POST['idmember'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            $this->model->EditJoinProposal($id, $idteam, $idmember, $description, $status);
            session_start();
            $_SESSION['message'] = "Proposal has been changed successfully";
        }
    }

    public function deleteJJoinProposal()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];

            $this->model->DeleteJoinProposal($id);
            session_start();
            $_SESSION['message'] = "Proposal berhasil";
        }
    }
}
