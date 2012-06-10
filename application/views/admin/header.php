<div id="mastheadholder">
  <div id="masthead">
    <div id="logo">
      
    </div>
    <div id="storeinfo">
      <table cellpadding="0" cellspacing="5">
        <tbody>
          <tr>
            <td align="left"><b>Current User :</b>&nbsp;&nbsp;<span id="headerControl_lblCashierName" style="display: inline-block; border-style: none;"><?php echo $this->session->userdata('full_name'); ?></span></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="topnav">
      <ul>
        <li><a href="pharmacy" <?php if($menu=='pharmacy'){ ?>class="current"<?php } ?>>Pharmacy</a></li>
        <li><a href="accounts" <?php if($menu=='accounts'){ ?>class="current"<?php } ?>>Accounts</a></li>
        <li><a href="bed_manager" <?php if($menu=='bed_manager'){ ?>class="current"<?php } ?>>Bed Manager</a></li>
        <li><a href="dr_call" <?php if($menu=='dr_call'){ ?>class="current"<?php } ?>>Dr Call</a></li>
        <li><a href="settings" <?php if($menu=='settings'){ ?>class="current"<?php } ?>>Settings</a></li>
      </ul>
    </div>
  </div>
</div>