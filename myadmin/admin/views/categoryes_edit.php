<?php $this->load->view('header'); ?>

    <div class="contents">
        <h1>编辑栏目 <a href="<?php echo site_url('categoryes/create') ?>"><i class="iconfont">&#xe67d;</i></a></h1>
        <div class="section">
            <?php echo form_open('categoryes/update/' . $this->uri->segment(3)); ?>
            <ul class="create-cate">
                <li><?php echo form_hidden('cid', $categoryes['cid']); ?></li>
                <li>
                    <?php echo form_label('栏目名称:'); ?>
                    <?php echo form_input('cname', $categoryes['cname']); ?>
                </li>
                <li>
                    <?php echo form_label('排序:'); ?>
                    <?php echo form_input('order', $categoryes['order']); ?>
                </li>
                <li><?php echo form_submit('submit', '保存'); ?></li>
            </ul>
            <?php echo form_close(); ?>
        </div>
    </div>


<?php $this->load->view('footer'); ?>