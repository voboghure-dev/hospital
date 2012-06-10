<div id="site">
  <div id="content_2_column">
    <?php $this->load->view('admin/sub_menu'); ?>
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Chart of A/C List</h1>
      </div>

      <?php $this->load->view('admin/ac/left'); ?>

      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvItemList" class="GridView">
            <tbody>
              <tr align="left" style="font-family: Arial; text-decoration: none;">
                <th align="center" style="width: 47px;" scope="col">&nbsp;</th>
                <th align="left" style="width: 150px;" scope="col">Voucher No</th>
                <th align="left" style="width: 150px;" scope="col">Voucher Date</th>
                <th align="left" style="width: 150px;" scope="col">DR Amount</th>
                <th align="left" style="width: 150px;" scope="col">CR Amount</th>
              </tr>
              <?php
              $i = 0;
              foreach ($credit_vouchers as $key => $value) {
                ?>
                <tr <?php if ($i == 1) { ?>class="RowStyle"<?php } else { ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center" style="height: 22px;">
                    <a href="user/edit/<?php echo $value['id']; ?>?height=250&width=400&modal=true" class="thickbox" title="Item Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="user/delete/<?php echo $value['id']; ?>" title="Item Delete"><img src="images/icon_delete.gif" class="delete" border="0" /></a>
                  </td>
                  <td align="center"><?php echo $value['voucher_no']; ?></td>
                  <td align="center"><?php echo date('jS F Y ', strtotime($value['voucher_date'])); ?></td>
                  <td align="right"><?php echo number_format($value['debit_amount'], 2); ?></td>
                  <td align="right"><?php echo number_format($value['credit_amount'], 2); ?></td>
                </tr>
                <?php
                if ($i == 0) {
                  $i = 1;
                } else {
                  $i = 0;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('.delete').click(function(){
      $(this).parent().parent().fadeTo(400, 0, function () {
        $(this).remove();
      });
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>accounts/delete_journal_voucher",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>