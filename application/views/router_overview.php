 <div class="span10">
      <!--Body content-->
      <table class="table table-bordered">
        <tr style="font-weight:bold;">
          <td>Client</td>
          <td>Site</td>
          <td>Status</td>
          <td>IP Address / URL</td>
          <td>Last Response</td>
        </tr>          
     <?php 
            $previousClient = '';
            $previousSite = '';

                foreach ($routers as $row){   
                    //print_r($row);
                if(!$row['status_name']){
                  $class = "class='error'";
                  $status_name = "<font style='color:red'>OFFLINE</font>";
                }
                else{
                  $class = "";
                  $status_name = "<font style='color:green'>ONLINE</font>";
                }
                echo '<tr '.$class.'>';

                if($previousClient == $row['client_name']){
                  echo '<td style="border-top:none;"></td>';
                }
                else{
                  if(!empty($row['zendesk'])){
                      echo '<td><a href="'.$row['zendesk'].'" target="_blank">'.$row['client_name'].'</a></td>';
                  }
                  else{
                      echo '<td>'.$row['client_name'].'</td>';                   
                  }  
                }
                $previousClient = $row['client_name'];
                

                if($previousSite == $row['site_name']){
                  echo '<td style="border-top:none;"></td>';
                }
                else{
                  echo '<td>'.$row['site_name'].'</td>'; 
                }
                $previousSite = $row['site_name'];

                echo '<td><a href="#" data-toggle="tooltip" title="'.$row['code'].'">'.$status_name.'</a></td>';
                echo '<td><a href="'.$row['url'].'" target="_blank">'.$row['url'].'</a></td>';
                echo '<td>'.$row['timestamp'].', '.$row['ping'].' ms</td>';
            };
            ?>
        </tr>
      </table>      <small>Page Last Refreshed: <?php echo date("D M j G:i:s T Y");  ?></small>
      <script type="text/javascript">
        function reCheck(){
            alert("Checks are being re-run");
            $.ajax({
             url: "index.php/checker/go",
             success: function(data){
               alert("Checks have been re-run.");
               window.location.reload();
             }
           });
        }  
      </script>
      <button type="button" onclick="reCheck()">Re-Check</button>  
      </div>