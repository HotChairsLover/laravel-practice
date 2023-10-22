<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <p class="form-control m-0">{{$user->name}}</p>
                    <!--<input class="form-control" id="name" value="{{$user->name}}">-->
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <p class="form-control m-0">{{$user->email}}</p>
                    <!--<input id="email" class="form-control" value="{{$user->email}}">-->
                </div>
            </div>
        </div>
    </div>
</div>
