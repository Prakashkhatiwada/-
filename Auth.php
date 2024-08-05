
               <?php  
            
                 $REMOTE_ADD = $_SERVER['REMOTE_ADDR'];
                    $accept = array("127","0","0",'1');
                       $remote = explode(".", $REMOTE_ADD);
                            $match = 1;
                                 for ($i = 0; $i < sizeof($remote); $i++){
                                     if($remote[$i]!=$accept[$i]){
                                        $match = 0 ;

                                            }
             
                                         }
                                          if ( $match == 1){
                                               echo "<h2>Access Granted</2>";
                                                     }else  {
                                                         echo "<h2 style=color:red>Access Forbidden </h2>";

                                                            }?>