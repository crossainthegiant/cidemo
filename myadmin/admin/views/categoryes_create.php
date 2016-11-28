<?php $this->load->view('header'); ?>

    <div class="contents">
        <h1>添加管理 </h1>
        <div class="section">
            <?php echo form_open('categoryes/add'); ?>

            <ul class="create-cate">
                <li>
                    <?php echo form_label('栏目名称:'); ?>

                    <?php echo form_input('cname', set_value('username')); ?>
                </li>
                <li>
                    <?php echo form_label('排序:'); ?>

                    <?php echo form_input('order', '0'); ?>
                </li>
                <li>
                    <?php echo form_submit('submit', '保存'); ?>
                </li>
            </ul>

            <?php echo form_close(); ?>

        </div>


    </div>


<?php $this->load->view('footer'); ?>