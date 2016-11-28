<?php $this->load->view('header'); ?>


    <!-- 配置文件 -->
    <script type="text/javascript" src="<?php echo base_url(); ?>extensions/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo base_url(); ?>extensions/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8"
            src="<?php echo base_url(); ?>extensions/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
    <div class="contents">
        <h1>发布管理 </h1>
        <div class="section">

            <?php echo form_open('article/add') ?>
            <ul class="create-article">
                <li>
                    <label>栏目:</label>
                    <select name="cid">
                        <?php foreach ($categoryes as $item): ?>
                            <option value="<?php echo $item['cid'] ?>"><?php echo $item['cname'] ?></option>
                        <?php endforeach; ?>
                    </select></li>

                <li><?php echo form_label('标题:'); ?><?php echo form_input('title'); ?></li>
                <li><?php echo form_label('描述:'); ?><?php echo form_textarea('description'); ?></li>
                <li><?php echo form_label('设置:'); ?><?php echo form_checkbox('auto', 400, 'checked'); ?>
                    是否获取内容200字为描述内容？

                </li>
                <li>
                    <!-- 加载编辑器的容器 -->
                    <label>内容:</label>
                    <script id="editor" name="contents" type="text/plain"></script>
                </li>
                <li><input type="submit" name="submit" value="保存"></li>

            </ul>

            <?php echo form_close(); ?>


        </div>

    </div>


<?php $this->load->view('footer'); ?>