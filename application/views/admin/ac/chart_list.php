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
                <th align="left" style="width: 150px;" scope="col">Code of A/C</th>
                <th align="left" style="width: 150px;" scope="col">Name of A/C</th>
                <th align="left" style="width: 90px;" scope="col">Date of Entry</th>
              </tr>
              <?php
              $i = 1;
              foreach ($ac_chart_list as $key => $value) {
                ?>
                <tr <?php if ($i == 1) { ?>class="RowStyle"<?php } else { ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center" style="height: 22px;">
                    <a href="user/edit/<?php echo $value['id']; ?>?height=250&width=400&modal=true" class="thickbox" title="Item Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="user/delete/<?php echo $value['id']; ?>" title="Item Delete"><img src="images/icon_delete.gif" class="delete" border="0" /></a>
                  </td>
                  <td class="first style1"><?php echo $value['code']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td align="center"><?php echo date('jS F Y ', strtotime($value['edate'])); ?></td>
                </tr>
                <?php
                if ($i == 1) {
                  $i = 0;
                } else {
                  $i = 1;
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
        url: "<?php echo base_url(); ?>accounts/delete_chart_ac",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>