<button type="button" class="btn btn-default btn-popup" data-popup="edit-brand"
        data-item='{"meta_data":{}}'
        data-title="Создание производителя">
    Создать производителя
</button>

<div class="anchor"></div>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'brand-grid',
    'dataProvider' => $brand->search(),
    'cssFile' => false,
    'itemsCssClass' => 'table table-hover',
    'filter' => $brand,
    'columns' => array(
        array(
            'name' => 'id',
        ),
        array(
            'name' => 'name',
        ),
        array(
            'name' => '',
            'type' => 'raw',
            'value' => array($brand, 'getLogo'),
            'filter' => false,
        ),
        array(
            'name' => 'maine_page_visible',
            'type' => 'raw',
            'value' => array($brand, 'pageVisible'),
            'filter' => false,
        ),
        array(
            'name' => 'order',
        ),
        array(
            'name' => 'Редактировать',
            'type' => 'raw',
            'value' => array($brand, 'popupPrepear'),
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




<script id="template_edit-brand" type="text/x-jsrender">
    <?php $this->renderPartial('/main/brand/_edit_brand'); ?>
</script>
<script id="template_upload-row" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_upload_row'); ?>
</script>
<script id="template_crop_modal" type="text/x-jsrender">
    <?php $this->renderPartial('/main/_crop_modal'); ?>
</script>

