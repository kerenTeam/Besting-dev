<!-- content start -->
<div class="admin-content am-form wx_btn_txt">
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">玩儿途悦</strong> / <small>banner</small></div>
  </div>
  
  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">读物</a></li>
      <li><a href="#tab2">城事</a></li>
    </ul>
    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
       <table class="am-table am-table-striped am-table-hover table-main" id="SignFrame">
            <thead>
              <tr>
               <th class="table-title">banner</th><th class="table-date am-hide-sm-only">图片</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody id="movies"> 
          <?php foreach($banner as $key=>$val):?>
            <?php if($val['pid'] == 3):?>
          <form action="<?=site_url('wx_banner/upplayBanner');?>" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
            <tr>
              <td>banner<?=$key+1?></td>
              <!-- 这儿如果改了name值得话，上面的js也需要改 -->
              <td>
              <div class="wx_type_img">
                 <input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add">
                  <!-- 图片实时预览 -->
                  <div id="preview"> <img style="border-radius: 3px;" src="<?=base_url('/weixin/'.$val['bannerpic']);?>" alt="选择图片"> </div>
              </div>
               <div >
                <input type="hidden" value="<?=$val['id'];?>" name='id'>
                <input type='hidden' value="<?=$val['bannerpic'];?>" name='bannerpic'>
              </div>
              </td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="submit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 修改保存</button>
                   <!-- 这儿的链接确定了的话，上面的js中的a标签也需要添加一个 -->
                  </div>
                </div>
              </td>
            </tr>
            </form> 
          <?php endif;?>
          <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="am-tab-panel am-fade" id="tab2">
       <table class="am-table am-table-striped am-table-hover table-main" id="SignFrame">
            <thead>
              <tr>
               <th class="table-title">banner</th><th class="table-date am-hide-sm-only">图片</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody id="movies"> 
             <?php foreach($banner as $key=>$val):?>
            <?php if($val['pid'] == 4):?>
          <form action="<?=site_url('wx_banner/upplayBanner');?>" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
            <tr>
              <td>banner<?=$key+1?></td>
              <!-- 这儿如果改了name值得话，上面的js也需要改 -->
              <td>
              <div class="wx_type_img">
                 <input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add">
                  <!-- 图片实时预览 -->
                  <div id="preview"> <img style="border-radius: 3px;" src="<?=base_url('/weixin/'.$val['bannerpic']);?>" alt="选择图片"> </div>
              </div>
               <div >
                <input type="hidden" value="<?=$val['id'];?>" name='id'>
                <input type='hidden' value="<?=$val['bannerpic'];?>" name='bannerpic'>
              </div>
              </td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button type="submit" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 修改保存</button>
                   <!-- 这儿的链接确定了的话，上面的js中的a标签也需要添加一个 -->
                  </div>
                </div>
              </td>
            </tr>
            </form> 
          <?php endif;?>
          <?php endforeach;?>
          </tbody>
        </table>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="assets/js/imgup.js"></script>
<!-- content end -->