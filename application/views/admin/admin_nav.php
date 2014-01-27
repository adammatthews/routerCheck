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
</ul>
      <!-- End Nav -->