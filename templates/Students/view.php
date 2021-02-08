<section class="content-header">
  <h1>
    Student
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($student->name) ?></dd>
            <dt scope="row"><?= __('Sales') ?></dt>
            <dd><?= h($student->sales) ?></dd>
            <dt scope="row"><?= __('Purchase') ?></dt>
            <dd><?= h($student->purchase) ?></dd>
            <dt scope="row"><?= __('Cart') ?></dt>
            <dd><?= h($student->cart) ?></dd>
            <dt scope="row"><?= __('Wishlist') ?></dt>
            <dd><?= h($student->wishlist) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($student->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($student->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($student->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
