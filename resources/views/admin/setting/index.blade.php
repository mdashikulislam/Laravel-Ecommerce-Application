@extends('admin.layouts.app')
@section('breadcum')
    <div class="page-header">
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Setting</a>
            </li>
        </ul>
    </div>
@endsection
@section('maincontent')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Website Setting</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Visibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#header-top-nav" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Header Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#main-slider" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Slider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-testimonial-tab-nobd" data-toggle="pill" href="#main-testimonial" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-footer-tab-nobd" data-toggle="pill" href="#main-footer" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Footer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-partner-tab-nobd" data-toggle="pill" href="#main-partner" role="tab" aria-controls="pills-partner-nobd" aria-selected="false">Partner</a>
                    </li>

                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                    <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                        <table class="table col-md-6">
                            <form action="{{route('setting.visibility')}}" method="post">
                                @csrf
                                <tr>
                                    <td>Header Top</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="header_top">
                                                <option value="1">Show</option>
                                                <option value="0">Hide</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Header </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="header">
                                                <option value="1">Show</option>
                                                <option value="0">Hide</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Slider</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" name="slider">
                                                <option value="1">Show</option>
                                                <option value="0">Hide</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-bookmark"></i>
											</span>
                                            Save
                                        </button>
                                    </td>
                                </tr>
                            </form>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="header-top-nav" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                        <form action="{{route('setting.header_top',['id'=>$header_top->id])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$header_top->phone}}" name="phone">
                                <label for="inputFloatingLabel" class="placeholder">Phone</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$header_top->email}}" name="email">
                                <label for="inputFloatingLabel" class="placeholder">Email</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$header_top->text}}" name="text">
                                <label for="inputFloatingLabel" class="placeholder">Text</label>
                            </div>

                                <button class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-bookmark"></i>
											</span>
                                    Save
                                </button>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="main-slider" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Heading</th>
                                <th>paragraph</th>
                                <th>Image</th>
                                <th>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="color: #ffffff;">Add Slider</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$slider->heading}}</td>
                                    <td>{{$slider->paragraph}}</td>
                                    <td><img src="{{Storage::disk('local')->url($slider->image)}}" alt="" style="max-width: 80px;max-height: 50px;"></td>
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editSlider-{{$slider->id}}" style="color: #ffffff;">
                                                <span class="btn-label">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                        </a>
                                        <form action="{{route('setting.slider.destroy',['id'=>$slider->id])}}" method="post" id="delete-data-{{$slider->id}}" style="display: none">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" class="btn btn-danger" onclick="

                                                if (confirm('Are you sure, want to delete this ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-data-{{$slider->id}}').submit();
                                                }else {

                                                event.preventDefault();
                                                }
                                                ">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="main-testimonial" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Designation </th>
                                <th>Image</th>
                                <th>Comment</th>

                                <th>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#testimonial" style="color: #ffffff;">Add Testimonial</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->designation}}</td>
                                    <td><img src="{{Storage::disk('local')->url($testimonial->image)}}" alt="" style="max-width: 80px;max-height: 50px;"></td>
                                    <th>{{$testimonial->comment}}</th>
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editTestimonial-{{$testimonial->id}}" style="color: #ffffff;">
                                                <span class="btn-label">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                        </a>
                                        <form action="{{route('setting.testimonial.destroy',['id'=>$testimonial->id])}}" method="post" id="delete-data-{{$testimonial->id}}" style="display: none">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" class="btn btn-danger" onclick="

                                                if (confirm('Are you sure, want to delete this ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-data-{{$testimonial->id}}').submit();
                                                }else {

                                                event.preventDefault();
                                                }
                                                ">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="main-footer" role="tabpanel" aria-labelledby="pills-footer-tab-nobd">
                        <form action="{{route('setting.footer.update',['id'=>$footer->id])}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$footer->logoname}}" name="logoname">
                                <label for="inputFloatingLabel" class="placeholder">Logo Name</label>
                            </div>
                            <div class="form-group">
                                <label for="comment">Description</label>
                                <textarea class="form-control" id="comment" rows="5" name="desc">{{$footer->desc}}</textarea>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$footer->address}}" name="address">
                                <label for="inputFloatingLabel" class="placeholder">Address</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" value="{{$footer->copyright}}" name="copyright">
                                <label for="inputFloatingLabel" class="placeholder">Copyright</label>
                            </div>

                            <button class="btn btn-primary">
											<span class="btn-label">
												<i class="fa fa-bookmark"></i>
											</span>
                                Save
                            </button>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="main-partner" role="tabpanel" aria-labelledby="pills-partner-tab-nobd">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#partner" style="color: #ffffff;">Add Partner</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$partner->name}}</td>
                                    <td><img src="{{Storage::disk('local')->url($partner->image)}}" alt="" style="max-width: 80px;max-height: 50px;"></td>
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#editPartner-{{$partner->id}}" style="color: #ffffff;">
                                                <span class="btn-label">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                        </a>
                                        <form action="{{route('setting.partner.destroy',['id'=>$partner->id])}}" method="post" id="delete-data-{{$partner->id}}" style="display: none">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" class="btn btn-danger" onclick="

                                                if (confirm('Are you sure, want to delete this ?')){
                                                event.preventDefault();
                                                document.getElementById('delete-data-{{$partner->id}}').submit();
                                                }else {

                                                event.preventDefault();
                                                }
                                                ">
                                                <span class="btn-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Add Option--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.slider')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="heading">
                            <label for="inputFloatingLabel" class="placeholder">Heading</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="paragraph">
                            <label for="inputFloatingLabel" class="placeholder">Paragraph</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="testimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.testimonial')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="name">
                            <label for="inputFloatingLabel" class="placeholder">Name</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="designation">
                            <label for="inputFloatingLabel" class="placeholder">Designation</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="comment">
                            <label for="inputFloatingLabel" class="placeholder">Comment</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="partner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.partner.create')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="name">
                            <label for="inputFloatingLabel" class="placeholder">Name</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--Edit option--}}
    @foreach($sliders as $slider)
        <div class="modal fade" id="editSlider-{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('setting.slider.edit',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="heading" value="{{$slider->heading}}">
                            <label for="inputFloatingLabel" class="placeholder">Heading</label>
                        </div>
                        <div class="form-group form-floating-label">
                            <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="paragraph" value="{{$slider->paragraph}}">
                            <label for="inputFloatingLabel" class="placeholder">Paragraph</label>
                        </div>
                        <div>
                            <img src="{{Storage::disk('local')->url($slider->image)}}" alt="" style="width: 200px;height: 150px;">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input check" type="checkbox" id="check" value="1" name="chkbox">
                                <span class="form-check-sign">Upload new Image</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file image"  name="image" id="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @foreach($testimonials as $testimonial)
        <div class="modal fade" id="editTestimonial-{{$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('setting.testimonial.edit',['id'=>$testimonial->id])}}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="name" value="{{$testimonial->name}}">
                                <label for="inputFloatingLabel" class="placeholder">Heading</label>
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="designation" value="{{$testimonial->designation}}">
                                <label for="inputFloatingLabel" class="placeholder">Paragraph</label>
                            </div>
                            <div>
                                <img src="{{Storage::disk('local')->url($testimonial->image)}}" alt="" style="width: 200px;height: 150px;">
                            </div>
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="comment" value="{{$testimonial->comment}}">
                                <label for="inputFloatingLabel" class="placeholder">Comment</label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input check" type="checkbox" id="check" value="1" name="chkbox">
                                    <span class="form-check-sign">Upload new Image</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" class="form-control-file image"  name="image" id="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($partners as $partner)
        <div class="modal fade" id="editPartner-{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Partner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('setting.partner.update',['id'=>$partner->id])}}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group form-floating-label">
                                <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="name" value="{{$partner->name}}">
                                <label for="inputFloatingLabel" class="placeholder">Name</label>
                            </div>

                            <div>
                                <img src="{{Storage::disk('local')->url($partner->image)}}" alt="" style="width: 200px;height: 150px;">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input check" type="checkbox" id="check" value="1" name="chkbox">
                                    <span class="form-check-sign">Upload new Image</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" class="form-control-file image"  name="image" id="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach




@endsection
@include('admin.layouts.message')
@section('js')
    <script>
        $(document).ready(function () {
            var chkbox =  document.getElementsByClassName('check');
            for (var i=0;i<chkbox.length;i++){
                chkbox[i].disabled = false;
            }
            var image =  document.getElementsByClassName('image');
            for (var i=0;i<image.length;i++){
                image[i].disabled = true;
            }

            $('.check').change(function () {
                let isChecked = this.checked;
                if (isChecked){
                    $('.image').prop("disabled",false);
                }else {
                    $('.image').prop("disabled",true);
                }
            });
        });
    </script>
@endsection