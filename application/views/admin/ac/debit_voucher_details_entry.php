<div id="center-column">
  <?php
  if ($this->session->flashdata('message')) {
    echo '<div class="top-bar"><h1>' . $this->session->flashdata('message') . '</h1></div>';
  }
  ?>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('accounts/add_debit_voucher_details', 'name="journal_voucher" id="journal_voucher"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="6">Voucher Particulars</th>
      </tr>
      <tr>
        <td class="first"><strong>Chart of A/C</strong></td>
        <td style="padding-left: 5px; text-align: left;">
          <select name="chart_id" class="required" style="width: 270px;">
            <option value="">Select One</option>
            <?php foreach ($ac_charts as $key => $value) { ?>
              <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
        <td><strong>Debit</strong></td>
        <td><input type="text" name="debit" style="width: 100px;" /></td>
        <td><strong>Credit</strong></td>
        <td class="last"><input type="text" name="credit" style="width: 100px;" /></td>
      </tr>
      <tr>
        <td class="full" colspan="6">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="6"><input type="submit" name="submit" value="Add Particulars" /></th>
      </tr>
    </table>
    <?php
      echo form_hidden('voucher_no', $voucher_no);
      echo form_close();
      
      echo form_open('accounts/debit_voucher_list', 'name="voucher_list" id="voucher_list"');
    ?>
    <table class="listing form" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
      <tr>
        <th class="full" colspan="5">Added Voucher Details</th>
      </tr>
      <tr>
        <th>Chart of A/C Name</th>
        <th>Debit</th>
        <th>Credit</th>
        <th>Action</th>
      </tr>
      <?php
        $debit = 0;
        $credit = 0;
        foreach($voucher_particulars as $key=>$value){
      ?>
      <tr>
        <td><?php echo $value['chart_name']; ?></td>
        <td align="right"><?php echo number_format($value['debit'], 2); ?></td>
        <td align="right"><?php echo number_format($value['credit'], 2); ?></td>
        <td style="text-align: center;"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
          $debit += $value['debit'];
          $credit += $value['credit'];
        }
      ?>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><b><?php echo number_format($debit, 2); ?></b></td>
        <td align="right"><b><?php echo number_format($credit, 2); ?></b></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="full" colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="5"><input type="submit" name="submit" value="Voucher Complete" /></th>
      </tr>
    </table>
    <?php
      echo form_hidden('debit', $debit);
      echo form_hidden('credit', $credit);
      echo form_hidden('voucher_no', $voucher_no);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>

<script type="text/javascript">
  document.journal_voucher.cr_chart_id.focus();
  $(document).ready(function(){
    $("#journal_voucher").validate();
    //$("#voucher_list").validate();
  });
</script>

<script type="text/javascript">
  $(function(){
    $('.delete').click(function(){
      $(this).parent().parent().fadeTo(400, 0, function () {
        $(this).remove();
      });
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>accounts/delete_journal_voucher_item",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>