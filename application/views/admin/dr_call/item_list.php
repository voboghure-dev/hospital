<div id="site">
  <div id="content_full">
    <?php $this->load->view('admin/dr_call/sub_menu'); ?>
    
    <div id="channel_full">
      <div id="manager_header">
        <h1 id="lblPageName">Item List</h1>
      </div>
      
      <?php $this->load->view('admin/dr_call/left'); ?>
      
      <div id="ManagerWorkArea">
        <div style="overflow: scroll;" id="mgrFullChannel">
          <div>
            <table cellspacing="0" border="0" style="border-collapse: collapse;" id="gvItemList" class="GridView">
              <tbody>
                <tr align="left" style="font-family: Arial; text-decoration: none;">
                  <th align="center" style="width: 47px;" scope="col">&nbsp;</th>
                  <th align="left" style="width: 50px;" scope="col">Code</th>
                  <th align="left" style="width: 100px;" scope="col">Name</th>
                  <th align="left" style="width: 75px;" scope="col">Category</th>
                  <th align="left" style="width: 150px;" scope="col">Description</th>
                  <th align="left" style="width: 40px;" scope="col">Price</th>
                  <th align="left" style="width: 55px;" scope="col">Re-Order</th>
                </tr>
                <tr>
                  <td colspan="7"><a href="item/add?height=250&width=400&modal=true" class="thickbox" title="Item Entry"><img src="images/btn_add.gif" border="0" /></a></td>
                </tr>
                <?php
                  $i = 1;
                  foreach($items as $key=>$value){
                ?>
                <tr <?php if($i==1){ ?>class="RowStyle"<?php }else{ ?>class="AlternatingRowStyle"<?php } ?>>
                  <td align="center" style="height: 22px;">
                    <a href="item/edit/<?php echo $value['id']; ?>?height=250&width=400&modal=true" class="thickbox" title="Item Edit"><img src="images/icon_edit.gif" border="0" /></a>
                    <a href="item/delete/<?php echo $value['id']; ?>" title="Item Delete"><img src="images/icon_delete.gif" border="0" /></a>
                  </td>
                  <td align="left"><?php echo $value['code']; ?></td>
                  <td align="left"><?php echo $value['name']; ?></td>
                  <td align="left"><?php echo $value['categoryname']; ?></td>
                  <td align="left"><?php echo $value['description']; ?></td>
                  <td align="right"><?php echo $value['sale_price']; ?></td>
                  <td align="right"><?php echo $value['re_order']; ?></td>
                </tr>
                <?php
                    if($i==1){
                      $i=0;
                    }else{
                      $i=1;
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
</div>

<script type="text/javascript">
  
  function AdvancedSearch()
  {
    ClearSearchOptions();
    var btnControl;
    btnControl = document.getElementById("btnAdvancedSearch");
    var divControl;
    divControl = document.getElementById("divAdvancedSearch");
    var lnkControl;
    lnkControl = document.getElementById("lnkAdvancedSearch");
    var divCommands;
    divCommands = document.getElementById("divCommands");
    if (btnControl.src.indexOf("expand") > -1)
    {
      ShowAdvancedSearch(btnControl, divControl, lnkControl, divCommands);
    }
    else
    {
      HideAdvancedSearch(btnControl, divControl, lnkControl, divCommands);
    }
    return;
  }
  function HideAdvancedSearch(btnControl, divControl, lnkControl, divCommands)
  {
    btnControl.src = "images/icon_expand.gif"
    divControl.style.display = "none";
    lnkControl.innerHTML = lnkControl.innerHTML.replace("Fewer", "More");
    divCommands.style.top = "25px";
    divCommands.style.left = "80px";
    document.getElementById("hdnSearchDisplay").value = "hide";
  }
  function ShowAdvancedSearch(btnControl, divControl, lnkControl, divCommands)
  {
    btnControl.src = "images/icon_collapse.gif"
    divControl.style.display = "block";
    lnkControl.innerHTML = lnkControl.innerHTML.replace("More", "Fewer");
    divCommands.style.top = "60px";
    divCommands.style.left = "90px";
    document.getElementById("hdnSearchDisplay").value = "display";
  }
  function ClearSearchOptions()
  {
    document.getElementById("txtUPCCode").value = "";
    document.getElementById("ddlSupplier").selectedIndex = 0;
    document.getElementById("txtReorderNumber").value = "";
  }
  function PageSetup()
  {
    HideShowControls();
    var btnControl;
    btnControl = document.getElementById("btnAdvancedSearch");
    var divControl;
    divControl = document.getElementById("divAdvancedSearch")
    var lnkControl;
    lnkControl = document.getElementById("lnkAdvancedSearch");
    var divCommands;
    divCommands = document.getElementById("divCommands");
    if (document.getElementById("hdnSearchDisplay").value == "display") {
      ShowAdvancedSearch(btnControl, divControl, lnkControl, divCommands);
    }
    else
    {
      HideAdvancedSearch(btnControl, divControl, lnkControl, divCommands);
    }
  }
</script>