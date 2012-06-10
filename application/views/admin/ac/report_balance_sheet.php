<div id="site">
  <div id="content_2_column">
    <?php $this->load->view('admin/sub_menu'); ?>
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Report Balance Sheet</h1>
      </div>

      <?php $this->load->view('admin/ac/left'); ?>

      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <?php echo form_open('accounts/report_chart_ac'); ?>
          <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvItemList" class="GridView">
            <tbody>
              <tr>
                <th colspan="4">&nbsp;</th>
              </tr>
              <tr>
                <td class="first" width="80"><strong>Start Date</strong></td>
                <td style="padding-left: 5px; text-align: left;"><input type="text" class="jq_date" name="s_date" value="<?php echo date('Y-m-01'); ?>" style="width: 170px;" /></td>
                <td width="90"><strong>End Date</strong></td>
                <td class="last"><input type="text" class="jq_date" name="e_date" value="<?php echo date('Y-m-t'); ?>" style="width: 170px;" /></td>
              </tr>
              <tr class="bg">
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th colspan="4" align="center"><input type="submit" name="submit" value="Show Report" /></th>
              </tr>
            </tbody>
          </table>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>