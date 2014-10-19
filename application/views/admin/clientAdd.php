<!-- TODO: Make page work -->
 <div class="span10">
      <?php 
        $header['page'] = "clientadd";
        $this->load->view('admin/admin_nav',$header); 
      ?>
      <!--Body content-->
<?php
// $attributes = array('class' => 'form-horizontal', 'id' => 'insert_client');
// echo form_open('admin/addClient', $attributes);
?>
<?php print_r($data);?>
<form action="<?php echo base_url();?>index.php/admin/addClient" method="post" id="insert_client">
    <fieldset>
        <legend>Add Client</legend>
  <div class="control-group">
    <label class="control-label" for="inputClient">Client Name</label>
    <div class="controls">
      <input type="text" id="inputClient" name="inputClient" placeholder="Client Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="in">Spreadsheet URL</label>
    <div class="controls">
      <input type="text" id="inputLink" name="inputLink" placeholder="https://novaitsolutions.zendesk.com/agent/#/organizations/20215628">
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