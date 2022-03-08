@extends('admin.admin_master')


@section('admin')



<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Profile Edit</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form novalidate="">
                     <div class="row">
                       <div class="col-12">


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" required="" value="{{ $editData->name }}">
                                    </div>
                                </div>

                            </div>     {{-- end col md 6  --}}



                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}">
                                    </div>
                                </div>


                            </div>   {{-- end col md 6  --}}

                        </div>     {{-- end row --}}



                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Profile Iamge<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="profile_photo_path" class="form-control" required=""> </div>
                                </div>

                            </div>     {{-- end col md 6  --}}



                            <div class="col-md-6">

                                <div class="form-group">
                                    @if (!empty($adminData->profile_photo_path))

                                    <img class="rounded-circle" src=" {{ asset('upload/admin_images/'.$adminData->profile_photo_path) }}" alt="User Avatar">

                                    @else


                                   <img class="rounded-circle" src=" {{ asset('upload/no_image.jpg') }}" alt="User Avatar" style="width: 100px ; height:100px">

                                    @endif
                                </div>


                            </div>   {{-- end col md 6  --}}

                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Password Input Field <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" class="form-control" required="" > </div>
                                </div>
                            </div>

                        </div>






                       <div class="text-xs-right">
                           <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">Submit</button>
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
    <!-- /.content -->
  </div>


@endsection