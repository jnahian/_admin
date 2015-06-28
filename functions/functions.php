<?php session_start();

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DB_NAME', 'jnahian_management');

    define('INC_PATH', '../page_contents/includes/');
    define('PART_PATH', '../page_contents/parts/');

class Database {

    private $conn, $query_res;

    private function connect() {
        return $this->conn = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
    }

    private function disconnect() {
        if ($this->conn) {
            mysqli_close($this->conn);
            return true;
        } else {
            return false;
        }
    }

    public function query($query_string) {
        if ($this->connect()) {
            $this->query_res = mysqli_query($this->conn, $query_string);
            $this->disconnect();
            if (!$this->query_res) {
                // echo 'Query Failed';
                return FALSE;
            } else {
                // echo 'Query Success';
                return $this->query_res;
            }
        } else
            echo 'Connection Error!';
    }

    public function fetch() {
        if ($this->query_res) {
            return mysqli_fetch_array($this->query_res);
        } else {
            return false;
        }
    }

    public function q_fetch($query_string) {
        $this->query($query_string);
        return $this->fetch();
    }

}

class Tools {

    public function get_header() {
        require_once (INC_PATH . 'header.php');
    }

    public function get_footer() {
        require_once (INC_PATH . 'footer.php');
    }

    public function get_sidebar() {
        require_once (INC_PATH . 'sidebar.php');
    }

    public function get_part($partname) {
        require_once (PART_PATH . $partname . '.php');
    }

    public function current_page() {
        $exp = explode('/', $_SERVER['PHP_SELF']);
        $curr = $exp[count($exp) - 1];
        return $curr;
    }

    public function current_directory() {
        $exp = getcwd() . '/';
        return $exp;
    }

    public function alert($msg) {
        echo '<script>alert("' . $msg . '");</script>';
    }
    
    public function toast($msg) {
        echo '<script>Materialize.toast(<span>'.$msg.'</span>, 1500);</script>';
    }

    public function redirect($link) {
        header('location:' . $link);
        echo '<script>location.href="' . $link . '";</script>';
        echo 'If the page doesn\'t redirect automatically...<a href="' . $link . '">Click Here</a>';
    }

}

class Check {

    public function chkName($name) {
        if (preg_match("/^[a-z\.\-\ ]{2,}/i", $name))
            return true;
        else
            return false;
    }

    public function chkEmail($email) {
        if (preg_match("/^[a-z0-9\.\_]{4,}@[a-z0-9\-\.]+\.[a-z]{2,10}/i", $email))
            return true;
        else
            return false;
    }

}

class User extends Database{

    public function isLogged() {
        return isset($_SESSION['username'])? true: false;
    }

    public function userName() {
        
    }
    
    public function hasAcces() {
        if(!$this->isLogged()){
//            echo "login failed.";
            header("location:../");
            exit();
        }
    }
    
    public function getUserRole($username) {
        $res = $this->q_fetch("select * from j_user where u_username = '$username'");
        switch ($res['u_role']){
            case 1: echo 'Administator';
                    break;
            case 2: echo 'Mordarator';
                    break;
            case 3: echo 'Client';
                    break;
        }
    }
    public function getUserImage($username){
        $res = $this->q_fetch("select * from j_user where u_username = '$username'");
        echo $image = "../uploads/users/".$res['u_image'];
    }
    
    public function logout(){
        !isset($_SESSION['username'])|| isset($_GET['out']) ? session_destroy() : header("location:../dashboard/");
    }

}

$oDb = new Database();
$oTools = new Tools();
$oUser = new User();
$oCheck = new Check();

//echo $oTools->current_directory();
//    if($oCheck->chkEmail('nahian048@gmail.com')){
//        echo 'Success';
//    } else        echo 'Error!';
?>