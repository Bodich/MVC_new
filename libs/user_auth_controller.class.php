<?php
 
 class user_auth_controller  {
    //  public $dbh; // handle of the db connexion
     // private static $instance;
 /*
    public function __construct()
    {
        // building data source name from config
        $dsn = 'pgsql:host=' . Config::read('db.host') .
               ';dbname='    . Config::read('db.basename') .
               ';port='      . Config::read('db.port') .
               ';connect_timeout=15';
        // getting DB user from config                
        $user = Config::read('db.user');
        // getting DB password from config                
        $password = Config::read('db.password');
     parent::__construct($dsn,$user,$password);
      //  $this->dbh = new PDO($dsn, $user, $password);
     
    }
   */ 
      public function chek_user_to_autorize($POST) {
         extract($POST);
          $error_ms = '';
        $sql = "SELECT    
                          name,
                          pass,
                          email
                          FROM users WHERE name ='".$login_a."'";
        
  //  $column = $this->$dbh->query($sql);
   // $res = $this->$column->fetch(PDO::FETCH_ASSOC);
    $res = mysql_query($sql)  or die (mysql_error()); 
          if (mysql_num_rows($res) > 0){
              $res = mysql_fetch_assoc($res);
                      if ($res['pass'] !== $pass){
                          $error_ms .= 'Password   is incorect <br />';
                      } else{
                          $sql = "SELECT  id,
                                          status
                                         FROM `users`
                                               WHERE  name ='".$login_a."'";
                         //  $column = $this->$db->query($sql);
                        //   $res = $this->$column->fetch(PDO::FETCH_ASSOC);
                         $res = mysql_query($sql)  or die (mysql_error());
                          $res = mysql_fetch_assoc($res);
                                 $_SESSION['user'] = $login_a;
                                 $_SESSION['user_id'] = $res['id']; 
                                 $_SESSION['status'] = $res['status'];
                                 
                                $now = time();
                        $sql = "UPDATE users 
                                       SET 
                                         date_last_log  = '$now' 
                                              WHERE id='".$_SESSION['user_id']."'";  
                  // $update = $this->$bd->exec($sql);
                     $res = mysql_query($sql)  or die (mysql_error());
                                }
                        
                                
             }else {$error_ms .= 'No such user <br />'; }
      
      return $error_ms; 
     }
      public function chek_user_to_regist($POST) {
            extract($POST);
           $error_msg = '';
             if($pass !== $confirm_pass){$error_msg .= USER_PASS_R_ERROR.'<br />';}else{
                $sql = "SELECT 
                                name,
                                pass,
                                email
                                FROM users WHERE name ='".$login."' AND  email ='".$email."'";
                    $res = mysql_query($sql)  or die (mysql_error()); 
                  
             if (mysql_num_rows($res) > 0){
                    $error_msg .= USER_PASS_R_ERROR.'<br />'; 
                  } 
             }
             return $error_msg; 
         
     }
      public function put_user_register_to_db($POST) {
            //print_r($POST); 
            extract($POST);
                  $date_reg = time();
                  $date_last_log = time();
                  $sql = "INSERT INTO users (
                                            name,
                                            pass,
                                            email,
                                            avatar,
                                            status,
                                            date_reg,
                                            date_last_log
                                                ) VALUES (
                                                    '$login',
                                                    '$pass',
                                                    '$email',
                                                    '$avatar',
                                                    '$status',
                                                    '$date_reg',
                                                    '$date_last_log'
                                                         )";
                  
                 $res = mysql_query($sql)  or die (mysql_error()); 
               if($res) { $sql = "SELECT 
                                    id,
                                    name
                                     FROM users WHERE name ='".$login."'"; 
                   $res = mysql_query($sql)  or die (mysql_error()); 
                   $res = mysql_fetch_assoc($res);
                                  $_SESSION['user_id'] = $res['id']; 
                           }      $_SESSION['user'] = $login;
                                  
                       header('location:?type=regist&res=true');  
                
     }
 }
 
