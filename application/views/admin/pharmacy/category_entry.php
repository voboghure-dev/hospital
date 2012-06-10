<div id="center-column">
  <?php
    if ($this->session->flashdata('message')){
      echo '<div class="top-bar"><h1>'.$this->session->flashdata('message').'</h1></div>';
    }
  ?>
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('category/add'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">New Category Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Category Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Description</strong></td>
        <td class="last"><input type="text" class="text" name="description" /></td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Category Parent</strong></td>
        <?php $width = 'style="width: 270px;"'; ?>
        <td class="last"><?php echo form_dropdown('parent_id', $categories, 'root', $width); ?></td>
      </tr>
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Create Category" />
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>