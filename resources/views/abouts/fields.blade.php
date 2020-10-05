<!-- Modal -->
<div class="modal fade" id="add-about-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-repeat: no-repeat; background-size: cover; background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>About us</strong></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
            <!-- Description Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['id'=>'description','class' => 'form-control','rows'=>6]) !!}
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Save about info', ['class' => 'btn btn-success']) !!}
  
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
ClassicEditor
.create( document.querySelector( '#description' ) )
.catch( error => {
    console.error( error );
} );
</script>
@endpush