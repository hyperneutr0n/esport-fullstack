<?php
require_once 'Middleware.php';
require_once __DIR__ . '/../models/JoinProposal.php';
require_once __DIR__ . '/../models/Member.php';
require_once __DIR__ . '/../models/Team.php';
require_once __DIR__ . '/../models/TeamMembers.php';

class JoinProposalController
{
    private $model;
    private $member;
    private $team;
    private $teamMember;

    public function __construct()
    {
        $this->model = new JoinProposal();
        $this->member = new Member();
        $this->team = new Team();
        $this->teamMember = new TeamMembers();
    }

    public function showJoinProposalForm()
    {
        if (Middleware::checkAdmin()) {
            $joinProposals = $this->model->SelectJoinProposal();
            require_once 'views/admin/read/joinproposal.php';
        } else {
            header("Location: /");
        }
    }

    public function showAddJoinProposalForm()
    {
        if (Middleware::checkMember()) {
            $id = $_SESSION["id"];
            $member = $this->member->SelectMemberId($id);
            $teams = $this->team->SelectTeamNotJoined($id);
            require_once 'views/member/join_proposal.php';
        } else {
            header("Location: /");
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
        } else {
            header("Location: /");
        }
    }

    public function addJoinProposal()
    {
        if (Middleware::checkPostMethod() && Middleware::checkMember()) {
            $idmember = $_POST["idmember"];
            $idteam = $_POST["idteam"];
            $description = $_POST["description"];
            $status = "waiting";

            if ($this->model->AddJoinProposal($idteam, $idmember, $description, $status)) {
                header('Location: /admin/joinproposal?message=Succesfully%20added%20join%20proposal');
            } else {
                header('Location: /admin/joinproposal?message=Failed%20adding%20join%20proposal');
            }
        } else {
            header("Location: /");
        }
    }

    public function processJoinProposal()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];
            $status = $_GET['status'];
            $idmember = $_GET['idmember'];
            $idteam = $_GET['idteam'];

            if ($this->model->ProcessJoinProposal($status, $id)) {
                if ($status == 'approved') {
                    $this->teamMember->AddTeamMember($idteam, $idmember, null);
                }
                $message = 'Successfully updated join proposal status';
                $message = rawurlencode($message);
                header('Location: /admin/joinproposal?message=' . $message);
            } else {
                $message = 'Failed to update join proposal status';
                $message = rawurlencode($message);
                header('Location: /admin/joinproposal?message=' . $message);
            }
        } else {
            header('Location: /');
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

            if ($this->model->EditJoinProposal($id, $idteam, $idmember, $description, $status)) {
                header('Location: /admin/joinproposal?message=Succesfully%20updated%20join%20proposal');
            } else {
                header('Location: /admin/joinproposal?message=Failed%20updating%20join%20proposal');
            }
        } else {
            header("Location: /");
        }
    }

    public function deleteJoinProposal()
    {
        if (Middleware::checkAdmin()) {
            $id = $_GET['id'];

            if ($this->model->DeleteJoinProposal($id)) {
                header('Location: /admin/joinproposal?message=Succesfully%20deleted%20join%20proposal');
            } else {
                header('Location: /admin/joinproposal?message=Failed%20deleting%20join%20proposal');
            }
        } else {
            header("Location: /");
        }
    }
}
