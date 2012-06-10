<div id="site">
  <div id="content_2_column">
    <?php $this->load->view('admin/sub_menu'); ?>
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Journal Voucher Posting</h1>
      </div>

      <?php $this->load->view('admin/ac/left'); ?>

      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <?php echo form_open('accounts/add_journal_voucher_master', 'name="journal_voucher" id="journal_voucher"'); ?>
          <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvItemList" class="GridView">
            <tbody>
              <tr>
                <th style="width: 70px;" scope="col">&nbsp;</th>
                <th style="width: 150px;" scope="col">&nbsp;</th>
                <th style="width: 70px;" scope="col">&nbsp;</th>
                <th style="width: 150px;" scope="col">&nbsp;</th>
              </tr>
              <tr>
                <td><strong>Voucher No</strong></td>
                <td><input name="voucher_no" value="<?php echo $voucher_no; ?>" style="width: 230px;" /></td>
                <td><strong>Voucher Date</strong></td>
                <td><input type="text" class="jq_date" name="voucher_date" value="<?php echo date('Y-m-d'); ?>" style="width: 230px;" /></td>
              </tr>
              <tr>
                <td valign="top"><strong>Ref. Employee</strong></td>
                <td valign="top">
                  <select name="emp_id" class="required" style="width: 236px;">
                    <option value="">Select One</option>
                    <?php foreach ($employees as $key => $value) { ?>
                      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td valign="top"><strong>Memo</strong></td>
                <td><textarea name="memo" style="width: 230px;"></textarea></td>
              </tr>
              <tr>
                <td align="center" colspan="4"><input type="submit" name="submit" value="Post Voucher" /></td>
              </tr>
            </tbody>
          </table>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.journal_voucher.voucher_no.focus();
  $(document).ready(function(){
    $("#journal_voucher").validate();
  });
</script>