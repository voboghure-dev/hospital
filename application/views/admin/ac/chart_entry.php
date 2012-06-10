<div style="width: 100%; font-size: 15px; font-weight: bold; text-align: center;">
  Chart of A/C Entry
</div>
<?php echo form_open('accounts/add_chart_ac', 'name="chart_ac"'); ?>
<table cellpadding="0" cellspacing="5">
  <tr>
    <td width="120"><b>Under A/C of</b></td>
    <td>
      <select name="parent_id" style="width: 270px;">
        <option value="">Root</option>
        <?php echo $ac_chart_tree; ?>
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>A/C Code</strong></td>
    <td><input type="text" name="code" autocomplete="off" style="width: 266px;" /></td>
  </tr>
  <tr>
    <td><strong>A/C Name</strong></td>
    <td><input type="text" name="name" autocomplete="off" style="width: 266px;" /></td>
  </tr>
  <tr>
    <td valign="top"><strong>Memo</strong></td>
    <td><textarea name="memo" style="width: 268px;"></textarea></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" colspan="2"><input type="submit" name="submit" value="Create A/C" /></td>
  </tr>
</table>
<?php echo form_close(); ?>

<script type="text/javascript">
  document.chart_ac.code.focus();
</script>