<?php   
    //khai báo
  define('host', 'mysql-server');
  define('user', 'root');
  define('pass', 'root');
  define('dbName', 'quantrivien');
    //kết nối database
  function connection() {
    $conn = new mysqli(host, user, pass, dbName);
    if ($conn->connect_error) {
        die('Connect error: ' . $conn->connect_error);
    }
    return $conn;
  }
  function login($user, $pass) {
          $sql = "select * from login where user = ?";
          $conn = connection();
          
          $stmt = $conn->prepare($sql);
          $stmt->bind_param('s', $user);
          if ( !$stmt->execute() ) {
              return array('code'=>1, 'error'=>'Excute command failed');
          }
          
          $result = $stmt->get_result();
          if ( $result->num_rows==0 ) {
              return array('code'=>2, 'error'=>'Username does not exists');
          }
          $data = $result->fetch_assoc();
          $password_hash = $data['pass'];
          
          if (password_verify($pass,$password_hash)) {
            return array('code'=>0, 'error'=>'', 'data'=>$data);
              
          } 
          else {
            return array('code'=>3, 'error'=>'Password is invalid');
          }
    }
	function getAccount() {
        $sql = 'select * from login';
        $conn = connection();

        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'error'=>'Excute command failled');
        }

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return array('code'=>0, 'error'=>'', 'data'=>$data);
    }
    function getHuman() {
        $sql = 'select * from nhanvien';
        $conn = connection();

        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'error'=>'Excute command failled');
        }

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return array('code'=>0, 'error'=>'', 'data'=>$data);
    }
    function getPhongban() {
        $sql = 'select * from phongban';
        $conn = connection();

        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'error'=>'Excute command failled');
        }

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return array('code'=>0, 'error'=>'', 'data'=>$data);
    }

    function getXinnghiphep() {
        $sql = 'select * from xinnghiphep ';
        $conn = connection();

        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'error'=>'Excute command failled');
        }

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return array('code'=>0, 'error'=>'', 'data'=>$data);
    }
    function getDuan() {
        $sql = 'select * from duan';
        $conn = connection();

        $stmt = $conn->prepare($sql);
        if ( !$stmt->execute() ) {
            return array('code'=>1, 'error'=>'Excute command failled');
        }

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }

        return array('code'=>0, 'error'=>'', 'data'=>$data);
    }
?>
