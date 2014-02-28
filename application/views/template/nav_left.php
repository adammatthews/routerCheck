  <div class="row-fluid">
    <div class="span2 hidden-phone tv_hide">
      <!--Sidebar content-->
       
        <ul class="nav nav-pills nav-stacked well">
          Main
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li><a href="#">Reports</a></li>
          
          <?php if ($this->ion_auth->is_admin()): ?>
          Administration 
          <li><a href="<?php echo base_url('index.php/admin');?>">Dashboard</a></li>
          <li><a href="<?php echo base_url('index.php/auth');?>">Account Management</a></li>
          <?php endif; ?>        
          
          <?php if ($this->ion_auth->logged_in()): ?>
            <li><a href="<?php echo base_url('index.php/auth/logout');?>">Log Out</a></li> 
          <?php endif; ?>        
        
        </ul>
      
      <!--<form target="_blank" onSubmit=" location.href = 'http://helpdesk.nova-itsolutions.com/helpdesk/tickets/' + document.getElementById('id').value; return false; ">
        <div class="control-group">
          <label class="control-label" for="id">Ticket Ref</label>
          <div class="controls">
            <input type="text" id="id" class=".input-small" />
          </div>
        </div>
      </form> -->

      <div class="well">
      <p>Hover over the ONLINE/OFFLINE section to get a description of the HTML Response code.</p>
      <p>Error codes of 403 and below are all OK.</p>
      </div>
    </div>

    <div class="span10">
