<?php
   /*
    * Configuration File
    */
    
   /*
    * Database Configuration
    */
      /*
       * Database host
       */
      $config['db_host'] = "";
      
      /*
       * Database driver (http://php.net/manual/en/pdo.drivers.php)
       */
      $config['db_driv'] = "mysql";
      
      /*
       * Database port
       */
      $config['db_port'] = 3306;
      
      /*
       * Database username
       */
      $config['db_user'] = "";
      
      /*
       * Database password
       */
      $config['db_pass'] = "";
      
      /*
       * Database name
       */
      $config['db_name'] = "";
      
      /*
       * Database table prefix
       */
      $config['db_pref'] = "";
      

      $config['db_path'] = $config['db_driv'] . ":host=" . $config['db_host'] . ";port=" . $config['db_port'] . ";dbname=" . $config['db_name'];
?>