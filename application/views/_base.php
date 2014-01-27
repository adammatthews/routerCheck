 <div class="span10">
      <!--Body content-->
      <table class="table table-bordered">
        <tr style="font-weight:bold;">
          <td>Client</td>
          <td>Site</td>
          <td>Status</td>
          <td>IP Address</td>
          <td>Last Response</td>
        </tr>
            <?php 
                foreach ($routers as $row){               
                if(!$row['status_name']){
                  $class = "class='error'";
                  $status_name = "<font style='color:red'>OFFLINE</font>";
                }
                else{
                  $class = "";
                  $status_name = "<font style='color:green'>ONLINE</font>";
                }
                echo '<tr '.$class.'>';
                echo '<td>'.$row['client_name'].'</td>';
                echo '<td>'.$row['site_name'].'</td>';          
                echo '<td>'.$status_name.'</td>';
                echo '<td><a href="'.$row['url'].'" target="_blank">'.$row['url'].'</a></td>';
                echo '<td>'.$row['timestamp'].'</td>';
            };
            ?>
        </tr>
      </table>      <small>Page Last Refreshed: <?php echo date("D M j G:i:s T Y");  ?></small>

      		</div>