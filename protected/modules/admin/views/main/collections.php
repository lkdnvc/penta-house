<button type="button" class="btn btn-default btn-popup" data-popup="edit-model"
        data-item='{"meta_data":{}}'
        data-title="Создание коллекции">
    Создать Коллецию
</button>

<div class="anchor"></div>
<script>
    $(function () {
        getBrands();

    });
</script>

<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(),
));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'model-grid',
    'dataProvider' => $collection->search(),
    'cssFile' => false,
    'itemsCssClass' => 'table table-hover',
    'filter' => $collection,
    'columns' => array(
        array(
            'name' => 'id',
        ),
        array(
            'name' => 'name',
        ),
        array(
            'name' => 'maine_page_visible',
            'type' => 'raw',
            'value' => array($collection, 'pageVisible'),
            'filter' => Collection::getVisibleSelect($collection),
        ),
        array(
            'name' => '',
            'type' => 'raw',
            'value' => array($collection, 'getBrandLogo'),
            'filter' => false,
        ),
        array(
            'name' => 'brand.name',
            'filter' => Collection::getBrandSelect($collection),
        ),
        array(
            'name' => 'order',
        ),
        array(
            'name' => '',
            'type' => 'raw',
            'value' => array($collection, 'popupPrepear'),
            'filter' => false,
        ),
    ),
    'pagerCssClass' => 'pager',
    'pager' => array(
        'htmlOptions' => array('class' => 'pagination pagination-sm'),
        'cssFile' => false,
        'header' => '',
        'firstPageLabel' => '',
        'prevPageLabel' => '&laquo;',
        'nextPageLabel' => '&raquo;',
        'lastPageLabel' => '',

    ),


    'template' => '{items}{pager}',
));
?>


<script id="template_edit-model" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_edit_collection'); ?>
</script>
<script id="template_uplod_wrap" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_uplod_wrap'); ?>
</script>
<script id="template_uplod_wrap_miltiple" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_uplod_wrap_miltiple'); ?>
</script>
<script id="template_upload-row" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_upload_row'); ?>
</script>
<script id="template_crop_modal" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_crop_modal'); ?>
</script>
<script id="template_meta_data" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_meta_data'); ?>
</script>

