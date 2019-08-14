@extends('base')

@section('main-content')
    <div class="cust_card">
        <div class="header">
            <h2>New Product</h2>
            <ul>
                <li>
                    <a href="{{ URL::to('products') }}">Back to Products</a>
                </li>
            </ul>
        </div>
        <div class="body">
            {{ FORM::open(['url'=>'products/save/','method'=>'post','enctype'=>'multipart/form-data']) }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
                        <label class="control-label">Name of Product</label>
                        {{ FORM::text('name','',['class'=>'form-control','placeholder'=>'Product Name']) }}
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('price') ? 'has-error': '' }}">
                        <label class="control-label">Price of Product</label>
                        {{ FORM::text('price','',['class'=>'form-control','placeholder'=>'Prroduct Price']) }}
                        @if($errors->has('price'))
                            <span class="help-block">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('qty') ? 'has-error': '' }}">
                        <label class="control-label">Qty of Stock</label>
                        {{ FORM::text('qty','',['class'=>'form-control','placeholder'=>'Prroduct Stock']) }}
                        @if($errors->has('qty'))
                            <span class="help-block">{{ $errors->first('qty') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group {{ $errors->has('description') ? 'has-error': '' }}">
                        <label class="control-label">Description</label>
                        {{ FORM::textarea('description','',['class'=>'form-control','rows'=>'10']) }}
                        @if($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ $errors->has('image') ? 'has-error': '' }}">
                        <label class="control-label">Product Image</label>
                        <div class="image_upload">
                            {{ FORM::file('image',['class'=>'file_input','id'=>'file_input']) }}
                            <div id="noneimage" class="none_img">
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <img id="image" class="preview_image"/>
                        </div>
                        @if($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-right action_form">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </div>
            {{ FORM::close() }}
        </div>
    </div>
    <script type="text/javascript">
    document.getElementById('file_input').onchange = function() {
        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById('image').src = e.target.result;
            document.getElementById('image').classList.add('active');
            document.getElementById('noneimage').classList.add('hidden');
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>
@endsection
