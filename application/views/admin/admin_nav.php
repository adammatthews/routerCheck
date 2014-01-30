<?php
function active($p,$c)
{
    if($p === $c){
        echo "class='active'";
    };
}
?>

<!-- Admin Nav -->
      <ul class="nav nav-tabs">
  <li <?php active("home",$page);?>><a href="<?php echo base_url('index.php/admin');?>">Home</a></li>
  <li <?php active("clientadd",$page);?>><a href="<?php echo base_url('index.php/admin/addClient');?>">Add Client</a></li>
    <li <?php active("siteadd",$page);?>><a href="<?php echo base_url('index.php/admin/addSite');?>">Add Site</a></li>
        <li <?php active("monitoradd",$page);?>><a href="<?php echo base_url('index.php/admin/addMonitor');?>">Add Monitor</a></li>


</ul>
      <!-- End Nav -->