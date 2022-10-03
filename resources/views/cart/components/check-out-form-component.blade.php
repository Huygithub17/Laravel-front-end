<div class="checkout">
    <!-- Main content -->
    <form action="{{route('cart.checkOut')}}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   placeholder="Enter name..."
                                   value="{{old('name')}}"
                            >
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   placeholder="Enter email..."
                                   value="{{old('email')}}"
                            >
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   name="phone"
                                   placeholder="Enter phone..."
                                   value="{{old('phone')}}"
                            >
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text"
                                   class="form-control @error('address') is-invalid @enderror"
                                   name="address"
                                   placeholder="Enter address..."
                                   value="{{old('address')}}"
                            >
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Order note</label>
                            <input type="text"
                                   class="form-control @error('note') is-invalid @enderror"
                                   placeholder="Enter order note..."
                                   name="note"
                                   value="{{old('note')}}"
                            >
                            @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary check-out-click">Submit</button>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </form>
    <!-- /.content -->
</div>

