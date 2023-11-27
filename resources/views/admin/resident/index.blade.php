@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h4 class="card-title">Residents Overview</h4>
                    <a title="new" href="{{ route('residents.create') }}"
                        class="btn btn-sm btn-info py-2 mb-2">Add Resident</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>DOB</th>
                                <th>Nationality</th>
                                <th>Civi Status</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($residents as $item)
                            <tr>
                                <td>{{ Str::ucfirst($item->firstName) }}</td>
                                <td>{{ Str::ucfirst($item->lastName) }}</td>
                                <td>{{ Str::ucfirst($item->address) }}</td>
                                <td>{{ Str::ucfirst($item->contactNumber) }}</td>
                                <td>{{ Str::ucfirst($item->dateOfBirth) }}</td>
                                <td>{{ Str::ucfirst($item->nationality) }}</td>
                                <td>{{ Str::ucfirst($item->civilStatus) }}</td>
                                @php
                                    $birthDate = Carbon\Carbon::parse($item->dateOfBirth);
                                    $age = "";
                                    $age = $birthDate->age;
                                @endphp
                                <td>{{ $age }}</td>
                                <td>{{ Str::ucfirst($item->gender) }}</td>
                                <td><label
                                        class=" {{ $item->status == '1' ? 'text-success' : 'text-danger' }}">{{
                                        $item->status == '1' ? 'Active' : 'Inactive'
                                        }}</label></td>
                                <td>
                                    <a href="{{ route('residents.edit', $item->id) }}"
                                        class="btn btn-info py-1 btn-icon float-start me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                     <a href="{{ route('residents.show', $item->id) }}"
                                        class="btn btn-secondary py-1 btn-icon float-start me-2">
                                        <i class="fas fa-print"></i>
                                    </a>

                                    <form method="post" action="{{ route('residents.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger py-1 btn-icon">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $(".alert").show("slow").delay(3000).hide("slow");
    } );
</script>
@endsection
