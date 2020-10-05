<!-- Modal -->
<div class="modal fade" id="add-trend-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog form-dark" role="document">
       <!--Content-->
       <div class="modal-content card card-image" style="background-repeat: no-repeat; background-size: cover; background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
          <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
             <!--Header-->
             <div class="modal-header text-center pb-4">
                 <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Products</strong></h3>
                 <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <!-- Name Field -->
                  <div class="form-group col-sm-6">
                       {{form::label('name','Fashion Trend')}}
                       {{form::select('name',array('T-shirts'=>'T-shirts','Shoes'=>'Shoes','Watch'=>'Watch','Bags'=>'Bags','Belts'=>'Belts','Hoodies'=>'Hoodies'),'B')}}
                   </div>
                   <!-- Photo Field -->
                   <div class="form-group col-sm-6">
                       {!! Form::label('photo', 'Photo:') !!}
                       {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                    </div>
              </div>
              <div class="modal-footer">
                 {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                 <a href="{{ route('trends.index') }}" class="btn btn-default">Cancel</a>
              </div>
          </div>
       </div>
    </div>
</div>