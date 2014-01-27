 <div class="span10">
      <?php 
        $data['page'] = "clientadd";
        $this->load->view('admin/admin_nav',$data); 
      ?>
      <!--Body content-->
<?php
// $attributes = array('class' => 'form-horizontal', 'id' => 'insert_client');
// echo form_open('admin/addClient', $attributes);
?>
<form action="<?php echo base_url();?>index.php/admin/addClient" method="post" id="insert_client">
    <fieldset>
        <legend>Add Client</legend>
  <div class="control-group">
    <label class="control-label" for="inputClient">Client Name</label>
    <div class="controls">
      <input type="text" id="inputClient" placeholder="Client Name">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="in">Spreadsheet URL</label>
    <div class="controls">
      <input type="text" id="inputZendesk" placeholder="https://novaitsolutions.zendesk.com/agent/#/organizations/20215628">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Add</button>
    </div>
  </div>
            </fieldset>
<?php echo form_close();?>
      
      
<!--<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'edit_client');
echo form_open('admin/insert_client', $attributes);
?>
  <fieldset>
    <legend>Edit Client</legend>
    <div class="control-group">
        <div class="controls">
        <?php     
        $array1 = $this->manage_db->getClientIDs();
        //print_r($array1);
        echo form_dropdown('shirts', $array1,'large');
        ?>        
        </div>
    </div>
  </fieldset>
<?php echo form_close();?>-->

 </div>