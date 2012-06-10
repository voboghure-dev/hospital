<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr bgcolor="#C9EAFC">
    <th>Code</th>
    <th>Item Name</th>
    <th>Category</th>
    <th>Description</th>
  </tr>
  <?php foreach($items as $key=>$value){ ?>
  <tr>
    <td><a href="pharmacy/add/<?php echo $sales_id; ?>/<?php echo $value['code']; ?>"><?php echo $value['code']; ?></a></td>
    <td><?php echo $value['name']; ?></td>
    <td><?php echo $value['category']; ?></td>
    <td><?php echo $value['description']; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="button" value="Cancel" onclick="tb_remove()" /></td>
  </tr>
</table>