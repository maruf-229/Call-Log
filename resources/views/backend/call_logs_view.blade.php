@extends('backend.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Call Logs <span class="badge badge-pill badge-danger">{{ count($call_logs) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Phone Number</th>
                                        <th>Call Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($call_logs as $item)
                                        <tr>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->call_duration }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <form action="{{ route('update_status',$item->id) }}" method="post">
                                                    @csrf

                                                    @if($item->status == 'in-call')
                                                        <input type="hidden" name="status" class="form-control" value="hold">
                                                        <input type="submit" class="btn btn-success" value="Hold">
                                                    @elseif($item->status == 'hold')
                                                        <input type="hidden" name="status" class="form-control" value="call-back">
                                                        <input type="submit" class="btn btn-success" value="Call Back">
                                                    @elseif($item->status == NULL)
                                                        <input type="hidden" name="status" class="form-control" value="in-call">
                                                        <input type="submit" class="btn btn-success" value="Call Now">
                                                    @else
                                                        <input type="hidden" name="status" class="form-control" value="don't_call">
                                                        <input type="submit" class="btn btn-success" value="Do Not Call">
                                                    @endif

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                {{--                Add Category Form--}}

                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter By Date</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('search_by_date') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Select Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control">
                                            @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Filter">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>


                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Filter Status</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form action="{{ route('filter_by_status') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Select Status <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option label="Choose One"></option>
                                                <option value="in-call">In-Call</option>
                                                <option value="hold">Hold</option>
                                                <option value="call-back">Call-Back</option>
                                                <option value="don't_call">Don't Call</option>
                                            </select>
                                            @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Filter">
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
