<div class="col-md-10 col-sm-10 col-xs-8">
        {!! Form::open(array('route' => 'searches' ,'class'=>'navbar-form')) !!}
          <div class="input-group">
              <input id = "search-input" class="form-control"  autocomplete="off" type="text" placeholder="Kërko" name="word">
              <div class="input-group-btn">
                  <button style="height: 34px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          {!! Form::close() !!}
</div>
<div id="livesearchcontainer" class="col-md-8 col-sm-10 col-xs-8">
</div>
