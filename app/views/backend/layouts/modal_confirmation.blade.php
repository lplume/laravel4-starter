<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="confirm_title">@lang('admin/'.$model.'/modal.'.$action.'.title')</h4>
</div>
<div class="modal-body">
    @if($error)
        <div>{{{ $error }}}</div>
    @else
        @lang('admin/'.$model.'/modal.'.$action.'.body')
    @endif
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin/'.$model.'/modal.'.$action.'.cancel')</button>
  @if(!$error)
    <a href="{{ $confirm_route }}" type="button" class="btn btn-primary">@lang('admin/'.$model.'/modal.'.$action.'.confirm')</a>
  @endif
</div>
