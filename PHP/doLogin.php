<?php
   /*
    * Initialize the session
    */
   session_start();
   
   /*
    * Include the configuration file
    */
   include("../PHP/config.inc.php");
   
   /*
    * Get variables from post
    */
   $username = $_POST["loginUsername"];
   $password = $_POST["loginPassword"];
   
   /*
    * Check validity of request before opening connection
    */
   if (empty($username) || empty($password)) {
      header("Location: ../login.php?error=1");
      exit;
   }
   
   /*
    * Open a connection to the database and authenticate the user
    */
   try {
      /*
       * Establish the connection with the database & set attributes
       */
      $dbc = new PDO($config['db_path'], $config['db_user'], $config['db_pass']);
      $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      /*
       * Construct & execute the PDO statement
       */
      $stmt = $dbc->prepare("SELECT * FROM " . $config['db_pref'] . "users WHERE username = :username");
      $stmt->execute(array(':username' => $username));
      
      /*
       * Fetch the results from the database
       */
      $r = $stmt->fetch(PDO::FETCH_ASSOC);
      
      /*
       * Authenticate the user
       */
      if($r['is_banned'] == 1) {
         header("Location: ../login.html");
         $stmt = null;
         $dbc = null;
         exit;
      }
      
      if(password_verify($password, $r['password'])) {
         $_SESSION["qf"] = 1;
         $_SESSION["id"] = $r['id'];
         $_SESSION["username"] = $r['username'];
         $_SESSION["role"] = $r['role'];
         $_SESSION["first_name"] = $r['first_name'];
         $_SESSION["last_name"] = $r['last_name'];
         $_SESSION["prefix"] = $r['prefix'];
         
         header("Location: ../dashboard/");
         
         $stmt = null;
         $dbc = null;
         exit;
      } else {
         header("Location: ../login.html");
         $stmt = null;
         $dbc = null;
         exit;
      }
      
      /*
       * Close the connection
       */
      $stmt = null;
      $dbc = null;
   } catch (PDOException $e) {
      header("Location: ../login.html");
      die();
   }
?>