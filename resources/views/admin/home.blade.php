@extends('layouts.main')
@section('title', 'Home')

@section('contetn')
<style>
    .status1{
        color: green;
    }
    .status{
        color: red;
    }
</style>
    <div class="container">
        <div class="row justify-content-center mt-2 pt-5">
            <div class="col-md-8">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Date Of Birth</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($user as $key => $value)
                                <tr>
                                    <td>{{ $value->first_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->date_of_birth }}</td>
                                    <td class="{{ $value->is_verified_user == 1 ? 'status1':'status' }}">{{ $value->is_verified_user == 1 ? 'Verified':'Unverified' }}</td>
                                    <td>
                                        <form action="{{ route('block') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" id="" value="{{ $value->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm w-100 ">Block</button>    
                                        </form>
                                        <form action="{{ route('delete.user') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="" value="{{ $value->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm mt-1 w-100">Delete</button>    
                                    </form>
                                    
                                </td>
                                    
                                </tr>
                        @endforeach    
                        
                    </tbody>
                </table>


                <table class="table table-hover table-striped mt-5 pt-5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Date Of Birth</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($users as $key => $value)
                                <tr>
                                    <td>{{ $value->first_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->date_of_birth }}</td>
                                    <td class="{{ $value->is_verified_user == 1 ? 'status1':'status'}}">{{ $value->is_verified_user == 1  ? 'Verified':'Unverified'}}</td>
                                    <td><form action="{{ route('unblock') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" id="" value="{{ $value->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm w-50">Unblock</button>    
                                        <button type="submit" class="btn btn-danger btn-sm w-50 mt-1">Unverify</button>    
                                    </form></td>

                                    
                                </tr>
                        @endforeach    
                        
                    </tbody>
                </table>


                <table class="table table-hover table-striped mt-5 pt-5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($order as $value)
                                <tr>
                                    {{-- <td><input class="userID" type="text" name="userID" id="userID" value="{{ $value->id }}"></td> --}}
                                    <td>{{ $value->user_name }}</td>
                                    <td>{{ $value->user_email }}</td>
                                    <td>{{ $value->user_phone }}</td>
                                    <td>{{ $value->product_name }}</td>
                                    <td>{{ $value->product_quantity }}
                                    
                                    </td>
                                    <td>
                                    
                                        <select class="form-control" name="ID" id="mySelect">
                                            <option {{ $value->status === 'Pending' ? 'selected':'' }} value="{{ $value->id  }}">Pending </option>
                                            <option {{ $value->status === 'Procesing'? 'selected':'' }} value="{{ $value->id  }}">Procesing</option>
                                            <option {{ $value->status === 'Deleverd' ? 'selected':'' }} value="{{ $value->id  }}">Deleverd</option>
                                        </select>
                                            
                                    </td>
                                    

                                    
                                </tr>
                        @endforeach    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@push('custom-scripts')
    <script>
        $('select').on('change', function () {
        var id = (this.value);
        var text = $(this).find('option').filter(':selected').text();
        axios.post('/order-status',{
            id: id,
            status: text
        }).then(res=>{
            console.log(res);
        }).catch(error=>{

        })

        });
    </script>
@endpush
@endsection