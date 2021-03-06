<fieldset class="sticky-wrapper">
  <div  class="sticky-head">
    <h2>Images</h2>

    <div id="actions" class="row">

      <div class="col-lg-7">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <div class="btn btn-success fileinput-button" id="dropzone" data-url="{{ route('admin.images.store') }}" data-maxfiles="1">
          <i class="glyphicon glyphicon-plus"></i>
          <span>Add file...</span>
        </div>
        <div type="reset" class="btn btn-warning cancel">
          <i class="glyphicon glyphicon-ban-circle"></i>
          <span>Cancel upload</span>
        </div>
      </div>

    </div>

  </div>

  <ul class="table table-striped files" id="previews">
    
    @foreach ($homeslider->getMedia('sliderHome') as $image)
    <li class="file-row template image-row db-image">
      <!-- This is used as the file preview template -->

      <input type="hidden" name="delete_{{ $image->id }}" value="{{ $image->id }}" />

      <div class="col-image" >
        <div class="preview aspect-1-1">
          <img class="thumbnail " src="{{ $image->getFullUrl('backoffice') }}" />
        </div>
      </div>

      <div class="col">
        <div class="row">
          <p class="name col">{{$image->name}}</p>
          <p class="size col">{{$image->human_readable_size}}</p>
        </div>
      </div>

      <div class="col-action">
        <div data-dz-remove class="btn btn-danger delete">
          <i class="glyphicon glyphicon-trash"></i>
          <span>Delete</span>
        </div>
      </div>
    </li>
    @endforeach  

    @if (request()->old('images') != null)
    @foreach (request()->old('images') as $image)
    @if ($image != null)
    <li class="file-row template old-image row">
      <!-- This is used as the file preview template -->
      <input type="hidden" class="image" name="images" value="{{ $image }}" />
      <div class="col-image" >
        <div class="preview aspect-1-1">
          <img class="thumbnail" />
        </div>
      </div>

      <div class="col">

      </div>

      <div class="col-action">
        <div data-dz-remove class="btn btn-danger delete">
          <i class="glyphicon glyphicon-trash"></i>
          <span>Delete</span>
        </div>
      </div>
    </li>
    @endif
    @endforeach
    @endif

  </ul>

  @include('admin.homeslider.template')

</fieldset>