<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    ID: {{$user->id}}
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Создано</label>
                    <input type="text" value="{{$user->created_at}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Изменено</label>
                    <input type="text" value="{{$user->updated_at}}" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
