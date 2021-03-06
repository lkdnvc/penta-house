<div id="edit-model" class="modal fade" tabindex="-1" data-width="600">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h2 class="modal-title">{{>title}}</h2>
    </div>
    <div class="modal-body">
        <form id="form-save-model" action="/admin/main/collection" method="POST">
            <input type="hidden" name="Collection[id]" value="{{>item.id}}"/>
            <h4>Продукция</h4>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="Collection[sanitary_engineering]"
                                {{boolCheckbox:item.sanitary_engineering}}> Сантехника
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="Collection[tile]" {{boolCheckbox:item.tile}} > Плитка
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <label>
                        <input type="checkbox" name="Collection[maine_page_visible]"
                        {{boolCheckbox:item.maine_page_visible}} />
                        Скрыть колекцию
                    </label>
                </div>
                <div class="col-md-6">
                    <select name="Collection[entity_id]" data-value="{{>item.entity_id}}">
                        <?php foreach (Entity::getAll() as $entity): ?>
                            <option value="<?php echo $entity->id; ?>"><?php echo $entity->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <hr/>

            <div class="form-group">
                <label for="model-order">Порядок вывода</label>
                <input style="width: 50px" type="text" class="form-control" id="model-order" name="Collection[order]"
                       value="{{>item.order}}">
            </div>
            <hr/>
            <h4>Основная страница</h4>

            <div class="form-group">
                <label for="model-name">Наименование</label>
                <input type="text" class="form-control" id="model-name" name="Collection[name]"
                       value="{{>item.name}}">
            </div>
            <div class="form-group">
                <label for="model-name">Производитель</label>
                <select name="Collection[brand_id]">
                    <option value="0">-</option>
                    {{getSelectOption:item.brand_id}}
                </select>
            </div>
            <div class="form-group">
                <label>Обложка на странице каталога</label>

                <div class="construct_upload"
                     data-width="400"
                     data-height="200"
                     data-action="/server/collectionUplod1"
                     data-multiple="false">
                    {{renderUploder:item.upload1}}
                </div>

            </div>
            <hr/>
            <div class="form-group">
                <label for="model-index_slider">Добавить в слайдер на главной</label>
                <select id="model-index_slider" name="Collection[index_slider]" data-value="{{>item.index_slider}}">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="form-group">
                <label>Обложка на главной странице</label>

                <div class="construct_upload"
                     data-width="1200"
                     data-height="600"
                     data-action="/server/collectionUplod2"
                     data-multiple="false">
                    {{renderUploder:item.upload2}}
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="model-slogan">Слоган</label>
                <input type="text" class="form-control" id="model-slogan" name="Collection[slogan]"
                       value="{{>item.slogan}}">
            </div>
            <div class="form-group">
                <label for="model-description">Текст</label>
                <textarea class="form-control h500 redactor" id="model-description" name="Collection[description]">{{>item.description}}</textarea>
            </div>
            <hr/>
            <div class="form-group">
                <label for="model-description">Фото</label>

                <div class="construct_upload"
                     data-width="2000"
                     data-height="800"
                     data-action="/server/CollectionUpload"
                     data-multiple="true">
                    {{renderUploderMiltiple:item.collection_upload}}
                </div>
            </div>

            <hr/>
            {{metaData:item.meta_data}}
        </form>
    </div>
    <div class="modal-footer">
        {{if item.id }}
        <button type="button" class="btn btn-danger" data-name="{{>item.name}}" data-unit="коллекция"
                data-action="/admin/main/deleteCollection" data-model-id="{{>item.id}}"
                style="float:left" id="delete-model">
            Удалить коллекцию
        </button>
        {{/if}}
        <button type="button" data-dismiss="modal" class="btn btn-default">Отмена</button>
        <button type="button" class="btn btn-primary" id="save-model">Сохранить</button>
    </div>
</div>


