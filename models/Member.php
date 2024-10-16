<?php
require_once 'Database.php';
class Member
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function Login($username, $password): bool
    {
        $sql = 'SELECT idmember, username,password,profile FROM member WHERE username = ?';

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param('s', $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                session_start();
                $role = $row['profile'];

                if ($role == 'member') {
                    $_SESSION['userLogged'] = true;
                    $_SESSION['adminLogged'] = false;
                } else {
                    $role == 'admin';
                    $_SESSION['adminLogged'] = true;
                    $_SESSION['userLogged'] = false;
                }
                $_SESSION["id"] = $row["idmember"];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function Logout()
    {
        session_start();
        session_destroy();
    }

    public function Register($fname, $lname, $username, $password): bool
    {
        $profile = 'member';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO member (fname, lname, username, password, profile) VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssss', $fname, $lname, $username, $hashedPassword, $profile);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function EditMember($id, $fname, $lname)
    {
        $sql = 'UPDATE member SET fname=?, lname=? WHERE idmember=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssi', $fname, $lname, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteMember($id)
    {
        $sql = 'DELETE FROM member WHERE idmember=?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function SelectMember()
    {
        $sql = 'SELECT idmember, fname,lname,username, profile FROM member';

        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }

    public function SelectMemberId($id)
    {
        $sql = 'SELECT idmember, fname,lname,username, profile FROM member WHERE idmember = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultset = $stmt->get_result();
        $resultarray = $resultset->fetch_assoc();
        $resultarray = array_map(function ($value) {
            return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
        }, $resultarray);
        return $resultarray;
    }

    public function SelectMemberInTeamMembers()
    {
        $sql = "SELECT member.idmember, member.username FROM team_members INNER JOIN member on member.idmember = team_members.idmember;";
        $resultset = $this->db->query($sql);
        $resultarray = $resultset->fetch_all(MYSQLI_ASSOC);
        $resultarray = array_map(function ($row) {
            return array_map(function ($value) {
                return is_string($value) ? htmlspecialchars($value, ENT_QUOTES) : $value;
            }, $row);
        }, $resultarray);
        return $resultarray;
    }
}
