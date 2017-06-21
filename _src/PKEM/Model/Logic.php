<?php

namespace PKEM\Model;

use PKEM\Controller\Route;

class Logic {

    protected $pageName;
    protected $data;

    function __construct($pageName) {
        $this->pageName = $pageName;
        $this->data = $this->generateData();
    }

    private function generateData() {
        return $this->{$this->pageName}();
    }

    public function getData() {
        return $this->data;
    }

    /**
     * @Page: start
     */
    public function start() {
        return [
            'title' => 'Home',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: about
     */
    public function about() {
        return [
            'title' => 'About Us',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: not-found
     */
    public function not_found() {
        $_SESSION['message'] = "Could not find your requested page!";
        return [
            'title' => 'Not Found',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: manage-system
     */
    public function manage_system() {
        // Insert a new user:
        if (isset($_POST['username'])) {
            $user = new User($_POST['username'], $_POST['password'], $_POST['roles']);
            $user->insertIntoDB();
        }

        // Users' list:
        $dbh = (new DB())->dbh;
        $sql = "SELECT * FROM ".User::TABLE_NAME;
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return [
            'title' => 'Manage System',
            'page' => $this->pageName,
            'users' => $users,
        ];
    }

    /**
     * @Page: login
     */
    public function login() {
        if ( isset($_POST['username']) ) {
            $user = new User($_POST['username'], $_POST['password']);
            if ( $user->isValid() ) {
                $_SESSION['userid'] = $user->getId();
                Route::routeTo(START_PATH);
            } else {
                $_SESSION['message'] = "Username or Password is incorrect.";
            }
        }

        return [
            'title' => 'Log in',
            'page' => $this->pageName,
        ];
    }

    /**
     * @Page: account
     */
    public function account() {
        if ( isset($_POST['password']) ) {
            if ($_POST['password'] == $_POST['confirm-password']) {
                //Update Password:
                $dbh = (new DB())->dbh;
                $sql = "UPDATE ".User::TABLE_NAME." SET password=:password WHERE id=:id";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':password', User::hashPassword($_POST['password']));
                $stmt->bindValue(':id', $_SESSION['userid']);
                $stmt->execute();
                Route::routeTo(LOGOUT_PATH);
            } else {
                $_SESSION['message'] = "Passwords entered do not match";
            }
        }

        return [
            'title' => 'Account',
            'page' => $this->pageName,
        ];
    }

}
