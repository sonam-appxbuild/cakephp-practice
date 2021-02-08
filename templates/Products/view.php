<section class="content-header">
  <h1>
    Product
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
            <dd><?= h($product->name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($product->id) ?></dd>
            <dt scope="row"><?= __('Category Id') ?></dt>
            <dd><?= $this->Number->format($product->category_id) ?></dd>
            <dt scope="row"><?= __('Sub Category Id') ?></dt>
            <dd><?= $this->Number->format($product->sub_category_id) ?></dd>
            <dt scope="row"><?= __('Image Id') ?></dt>
            <dd><?= $this->Number->format($product->image_id) ?></dd>
            <dt scope="row"><?= __('Thumbnail Id') ?></dt>
            <dd><?= $this->Number->format($product->thumbnail_id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($product->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($product->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
