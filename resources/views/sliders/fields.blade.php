<style>

    .preview-img
    {
        border-radius: 80%;
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.7);
    }
    .browse-button
    {
        width: 180px;
        height: 180px;
        border-radius: 100%;
        position: absolute; /* Tweak the position property if the element seems to be unfit */
        top: 0px;
        left: 15px;
        background: linear-gradient(180deg, transparent, black);
        opacity: 0;
        transition: 0.3s ease;
    }
    
    .browse-button:hover
    {
        opacity: 1;
    }
    
    .browse-input
    {
        width: 180px;
        height: 180px;
        border-radius: 80%;
        transform: translate(-1px,-26px);
        opacity: 0;
    }
    
    .fieldset{
         margin-top: 5px;
    }
    .fieldset legend{
         display:block;
         width: 100%;
         padding: 0%;
         font-size: 15px;
         border: 0;
         line-height: inherit;
         color: #797979;
         border-bottom: 1px solid #e5e5e5; 
    }
    </style>

<!-- Modal -->
<div class="modal fade" id="add-slider-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog form-dark" role="document">
       <!--Content-->
       <div class="modal-content card card-image" style="background-repeat: no-repeat; background-size: cover; background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
          <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
             <!--Header-->
             <div class="modal-header text-center pb-4">
                 <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Image Sliders</strong></h3>
                 <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
              </div>
              <!--Body-->
              <div class="modal-body">
                  <!-- Photo Field -->
                  <h3>Image slider preview before upload</h3>
                  <div class="form-group col-sm-12">
                     <div class="form-group form-group-login">
                          <table style="margin:0 auto;">
                             <thead>
                                 <tr class="info">
                                 </tr>
                             </thead>
                             <tbody>
                                 <img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="180" height="180" id="photo" style="border-radius: 50%"/>
                                    <div class="browse-button">
                                      <i class="fa fa-pencil"></i>
                                      <input class="browse-input" type="file" accept="image/*" onchange="preview_image(event)" name="photo">
                                    </div>
                                </tbody>
                           </table>
                       </div>
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Save Image slider', ['class' => 'btn btn-primary']) !!}
                    </div>
              </div>
          </div>
       </div>
    </div>
</div>
@push('scripts')
    <script type='text/javascript'>
    function preview_image(event) 
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('photo');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    </script>
@endpush