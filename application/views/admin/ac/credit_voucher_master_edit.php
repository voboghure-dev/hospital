<div id="center-column">
  <?php
  if ($this->session->flashdata('message')) {
    echo '<div class="top-bar"><h1>' . $this->session->flashdata('message') . '</h1></div>';
  }
  ?>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('accounts/edit_credit_voucher_master', 'name="credit_voucher" id="credit_voucher"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Credit Voucher Posting</th>
      </tr>
      <tr>
        <td class="first" width="80"><strong>Voucher No</strong></td>
        <td style="padding-left: 5px; text-align: left;"><input name="voucher_no" value="<?php echo $credit_voucher['voucher_no']; ?>" style="width: 230px;" /></td>
        <td width="90"><strong>Voucher Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="voucher_date" value="<?php echo $credit_voucher['voucher_date']; ?>" style="width: 230px;" /></td>
      </tr>
      <tr class="bg">
        <td class="first" valign="top"><strong>Ref. Employee</strong></td>
        <td valign="top" style="padding-left: 5px; text-align: left;">
          <select name="emp_id" class="required" style="width: 236px;">
            <option value="">Select One</option>
            <?php foreach ($employees as $key => $value) { ?>
            <option value="<?php echo $value['id']; ?>" <?php if($value['id']==$credit_voucher['emp_id']){ ?>selected<?php } ?>><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
        <td valign="top"><strong>Memo</strong></td>
        <td class="last"><textarea name="memo" style="width: 230px;"><?php echo $credit_voucher['memo']; ?></textarea></td>
      </tr>
      <tr>
        <td class="full" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4"><input type="submit" name="submit" value="Update Voucher" /></th>
      </tr>
    </table>
    <?php
      echo form_hidden('id', $credit_voucher['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>

<script type="text/javascript">
  document.credit_voucher.voucher_no.focus();
  $(document).ready(function(){
    $("#credit_voucher").validate();
  });
</script>