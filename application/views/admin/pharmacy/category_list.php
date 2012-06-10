<div id="site">
  <div id="content_full">
    <?php $this->load->view('admin/pharmacy/sub_menu'); ?>
    
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Category List</h1>
      </div>
      
      <?php $this->load->view('admin/pharmacy/left'); ?>
      
      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <div>
            <div>
              <table cellspacing="0" border="0" style="border-collapse: collapse;" id="GridCategList" cacheexpirationpolicy="Absolute" cacheduration="2" enablecaching="True" allowselecting="True" causesvalidation="False" allowediting="True" class="GridView">
                <tbody>
                  <tr align="left" style="font-family: Arial; text-decoration: none;">
                    <th scope="col">&nbsp;</th>
                    <th align="left" scope="col">Category Name</th>
                    <th align="left" scope="col">Code</th>
                  </tr>
                  <tr>
                    <td colspan="3"><a href=""><img src="images/btn_add.gif" /></a></td>
                  </tr>
                  <?php
                  $i = 1;
                  foreach ($categories as $key => $value) {
                  ?>
                    <tr <?php if ($i == 1) { ?>class="RowStyle"<?php } else { ?>class="AlternatingRowStyle"<?php } ?>>
                      <td style="width: 50px;">
                        <a href="category/edit/<?php echo $value['id']; ?>?height=150&width=280&modal=true" class="thickbox" title="Category Entry"><img src="images/icon_edit.gif" border="0" /></a>
                        <a href="category/delete/<?php echo $value['id']; ?>" title="Category Delete"><img src="images/icon_delete.gif" border="0" /></a>
                      </td>
                      <td><?php echo $value['name'] ?></td>
                      <td align="left"><?php echo $value['code'] ?></td>
                    </tr>
                  <?php
                    if ($i == 1) {
                      $i = 0;
                    } else {
                      $i = 1;
                    }
                  }
                  ?>
                </tbody></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
