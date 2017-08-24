<div class="col-md-9 col-sm-8 col-xs-7" id="search">
        {!! Form::open(array('route' => 'searches' ,'class'=>'navbar-form')) !!}
          <div class="input-group">
              <input id = "search-input" class="form-control"  autocomplete="off" type="text" placeholder="Kërko" name="word">
              <div class="input-group-btn">
                  <button style="height: 34px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
          {!! Form::close() !!}

          <div id="livesearchcontainer">
          </div>
</div>
