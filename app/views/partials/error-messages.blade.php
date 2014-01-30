<!-- Display Alert messages -->
@if(Session::get('error_message'))
<div data-alert data-options="animation_speed:500;" class="alert-box alert">
  <div class="row">
    <div class="small-12 columns">
      <i class="fa fa-exclamation-circle fa-lg"></i> {{ Session::get('error_message') }}
      <a href="#" class="close">&times;</a>
    </div>
  </div>
</div>
@endif

@if(Session::get('warning_message'))
<div data-alert data-options="animation_speed:500;" class="alert-box warning">
  <div class="row">
    <div class="small-12 columns">
      <i class="fa fa-exclamation-triangle fa-lg"></i>{{ Session::get('warning_message') }}
      <a href="#" class="close">&times;</a>
    </div>
  </div>
</div>
@endif

@if(Session::get('info_message'))
<div data-alert data-options="animation_speed:500;" class="alert-box info">
  <div class="row">
    <div class="small-12 columns">
      <i class="fa fa-bullhorn fa-lg"></i> {{ Session::get('info_message') }}
      <a href="#" class="close">&times;</a>
    </div>
  </div>
</div>
@endif

@if(Session::get('success_message'))
<div data-alert data-options="animation_speed:500;" class="alert-box success">
  <div class="row">
    <div class="small-12 columns">
      <i class="fa fa-check-square-o fa-lg"></i> {{ Session::get('success_message') }}
      <a href="#" class="close">&times;</a>
    </div>
  </div>
</div>
@endif