 <div class="span10">
      <?php 
        $header['page'] = "monitoradd";
        $this->load->view('admin/admin_nav',$header); 
      ?>
      <!--Body content-->
<?php 
  if(!empty($router)){
    echo "Done!";
  }
?>
<form action="<?php echo base_url();?>index.php/admin/addMonitor" method="post" id="insert_monitor">
    <fieldset>
        <legend>Add Monitor</legend>

  <div class="control-group">
    <label class="control-label" for="site_id">Client</label>
    <div class="controls">
        <select id="site_id" name="site_id">
          <?php
            foreach($sites as $site){
                echo "<option value=".$site->id.">(".$site->client_name.") ".$site->site_name."</option>";
            }
          ?>
        </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="router_url">URL</label>
    <div class="controls">
      <input type="text" id="router_url" name="router_url" placeholder="Router URL">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="router_note">Router Note</label>
    <div class="controls">
      <textarea id="router_note" name="router_note"></textarea>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Add</button>
    </div>
  </div>
   </fieldset>

<?php echo form_close();?>

 </div>