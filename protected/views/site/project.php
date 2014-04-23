<div class="brand-plugin">
    <div class="slider">
        <div class="sliderContent">
            <?php foreach ($project->project_upload as $project_upload): ?>
                <div class="item">
                    <img style="height: 800px" src="/uploads/<?php echo $project_upload->upload->file_name; ?>"/>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="sliderArrows sliderArrowsBottom"></div>
    </div>
    <div class="title">
        <?php echo $project->name; ?>
    </div>
    <div class="anchor"></div>
</div>

<div class="breadcrumbs"><a href="/site/index">Главная</a> / <a href="/site/catalog">Новости</a></div>
<div class="collection">
    <h1> <?php echo $project->name; ?></h1>

    <div class="collection-description">
        <?php echo $project->description; ?>
    </div>
    <div class="collection-gallery">
        <div class="item-box">

            <?php foreach ($project->project_upload as $project_upload): ?>
                <a href="/uploads/<?php echo $project_upload->upload->file_name; ?>"
                   class="collection-img-item item">
                    <img class="item-bg" src="/uploads/medium/<?php echo $project_upload->upload->file_name; ?>">
                </a>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="anchor"></div>
</div>
<div class="anchor"></div>
<div class="collection-footer">
    <div class="item-box">
        <a href="/site/posts" class="brand-item item brand-title">
            <span class="brand-title">Проекты</span>
        </a>

        <?php foreach ($projects as $model): ?>
            <a href="/site/project?id=<?php echo $model->id; ?>" class="brand-item item hovered">
                <img class="item-bg"
                     src="/uploads/<?php echo(isset($model->upload1) ? $model->upload1->file_name : ''); ?>"/>

                <div class="hovered-div">
                    <div class="hovered-div-text">
                        <span><?php echo $model->name; ?></span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
</div>

<script type="text/javascript">
    $(function () {
        $(".collection-img-item").lightBox();
    });
</script>