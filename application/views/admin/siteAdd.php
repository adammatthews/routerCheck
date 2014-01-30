 <div class="span10">
      <?php 
        $header['page'] = "siteadd";
        $this->load->view('admin/admin_nav',$header); 
      ?>
      <!--Body content-->
<?php
// $attributes = array('class' => 'form-horizontal', 'id' => 'insert_client');
// echo form_open('admin/addClient', $attributes);
?>
<form action="<?php echo base_url();?>index.php/admin/addSite" method="post" id="insert_site">
    <fieldset>
        <legend>Add Site</legend>
  
  <div class="control-group">
    <label class="control-label" for="client_id">Client</label>
    <div class="controls">
        <select id="client_id" name="client_id">
            <?php
          foreach($clients as $client){
            //reach($client as $value){
              echo "<option value=".$client->id.">".$client->name."</option>";
            //
          }
        ?>
        </select>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="site_name">Site Name</label>
    <div class="controls">
      <input type="text" id="site_name" name="site_name" placeholder="Site Name">
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