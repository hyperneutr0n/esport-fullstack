<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/JoinProposal.php';
require_once __DIR__ . '/../models/Member.php';
require_once __DIR__ . '/../models/Team.php';

class JoinProposalController
{
    private $model;
    private $member;
    private $team;

    public function __construct()
    {
        $this->model = new JoinProposal();
        $this->member = new Member();
        $this->team = new Team();
    }

    public function showJoinProposalForm()
    {
        if (Middleware::checkAdmin()) {
            $joinProposals = $this->model->SelectJoinProposal();
            require_once 'views/admin/read/joinproposal.php';
        }
    }

    public function showAddJoinProposalForm()
    {
        if (Middleware::checkMember()) {
            $members = $this->member->SelectMember();
            $teams = $this->team->SelectTeam();
            require_once 'views/member/join_proposal.php';
        }
    }

    public function showEditJoinProposalForm()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET["id"];
            $members = $this->member->SelectMember();
            $teams = $this->team->SelectTeam();
            $joinproposal = $this->model->SelectJoinProposalId($id);
            require_once 'views/admin/update/edit_join_proposal.php';
        }
        //form nya memang lom ada ya?
    }

    public function addJoinProposal()
    {
        if (Middleware::checkPostMethod() && Middleware::checkMember()) {
            $idmember = $_POST["idmember"];
            $idteam = $_POST["idteam"];
            $description = $_POST["description"];
            $status = "waiting";

            if ($this->model->AddJoinProposal($idteam, $idmember, $description, $status)) {
                echo "<script>alert('Join Proposal Added Successfully');</script>";
            } else {
                echo "<script>alert('Failed to add Join Proposal.');</script>";
            }
        }
    }


    public function editJoinProposal()
    {
        if (Middleware::checkPostMethod() && Middleware::checkAdmin()) {
            $id = $_POST['id'];
            $idteam = $_POST['idteam'];
            $idmember = $_POST['idmember'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            // session_start();
            // $_SESSION['message'] = "Proposal has been changed successfully";

            if ($this->model->EditJoinProposal($id, $idteam, $idmember, $description, $status)) {
                echo "<script>alert('Proposal has been changed successfully');</script>";
            } else {
                echo "<script>alert('Failed to edit Proposal.');</script>";
            }
        }
    }

    public function deleteJJoinProposal()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            // session_start();
            // $_SESSION['message'] = "Proposal berhasil";

            if ($this->model->DeleteJoinProposal($id)) {
                echo "<script>alert('Proposal successfully deleted');</script>";
            } else {
                echo "<script>alert('Failed to delete Proposal.');</script>";
            }
        }
    }
}
