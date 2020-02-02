@extends('layouts.app')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Edit Points</h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Edit Points
                        </h3>
                    </div>
                </div>
            </div>

            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" id="ediform" method="POST" action="{{route('point.update', $coin->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="m-portlet__body">
                    @if(count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="form-group m-form__group row">
                        <label for="title" class="col-lg-2 col-form-label">Title:</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="title" id="title" value="{{ $coin->title }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Enter Title" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="amount" class="col-lg-2 col-form-label">Amount:</label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control m-input" name="amount" id="amount" value="{{ $coin->amount }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Enter Amount" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="coins" class="col-lg-2 col-form-label">Points:</label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control m-input" name="coins" id="coins" value="{{ $coin->coins }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Enter Points" placeholder="Enter Points">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="image" class="col-lg-2 col-form-label">Image:</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control m-input" name="image" id="image" value="{{ old('image') }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Coin Image Upload">
                            <br />
                            @if(!(empty($coin->image)) && file_exists( public_path().'/coin/'.$coin->image ))
                            
                            <img name="edit_blah" id="edit_blah" src="{{asset('public/coin/'.$coin->image)}}" alt="Coin Old Image" title="Coin Old Image" style="height:100px; widt:100px" />    
                            @endif
                            <img id="blah" src="#" alt="Coin New Image" title="Coin New Image" style="display:none; height:100px; width:100px" />
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" id="resetbtn" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
</div>
<script src="{{ asset('public/theme/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/theme/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $("#resetbtn").click(function() {
            $('#blah').hide();
            $('#edit_blah').show();
        });

        $("#ediform").validate({
            rules: {
                title: {
                    required: !0
                },
                amount: {
                    required: !0,
                },
                coins: {
                    required: !0,
                }
                
            },
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        $('#blah').show();
        $('#edit_blah').hide();
        
        readURL(this);
    });
</script>
@endsection