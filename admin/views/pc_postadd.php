<!-- content start -->
<div class="admin-content">
  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">内容管理</strong> / <small>新增</small></div>
  </div>
  <hr/>
  <div class="am-g">
    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
    </div>
    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
      <!-- 表单 start -->
      <form action="<?=site_url('pc_newpost/addnew')?>" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-sm-3 am-form-label">标题</label>
          <div class="am-u-sm-9">
            <input type="text" placeholder="标题" name='title'>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-sm-3 am-form-label">简介</label>
          <div class="am-u-sm-9">
            <textarea rows="4" placeholder="简短说明" name='postinfo'></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-sm-3 am-form-label">图片上传</label>
          <div class="am-u-sm-9">
            <input type="file" id="imgUpload" name="postpic" onchange="previewImage(this)" class="upload-add">
            <!-- 图片实时预览 -->
            <div id="preview"> <img style="border-radius: 3px;" alt="选择图片" src=""> </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-sm-3 am-form-label">图文内容</label>
          <div class="am-u-sm-9">
            <!-- 编辑器 -->
            <link href="assets/uediter/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="assets//uediter/third-party/jquery.min.js"></script>
            <script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.config.js"></script>
            <script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.js"></script>
            <script type="text/javascript" src="assets/uediter/lang/zh-cn/zh-cn.js"></script>
            <div style="margin-left: -20px;">
              <script id="myEditor" type="text/plain" style="width:90%;height:500px;" name='postcontent'></script>
            </div>
            <script type="text/javascript">
            var um = UM.getEditor('myEditor'); //实例化编辑器
            </script>
          </div>
        </div>
        <div class="am-form-group">
          <div class="am-u-sm-9 am-u-sm-push-3">
          <input type="hidden" name='pid' value="2">
            <button type="submit" class="am-btn am-btn-primary">保存修改</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- content end -->