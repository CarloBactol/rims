@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 " style="margin: 0 auto;">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4> Add Resident</h4>
                            {{-- <a href="{{ route('admin.owners.index') }}" class="btn btn-md btn-info">Back</a> --}}
                            <a href="{{ route('persons.index') }}" class="btn btn-inverse-primary btn-rounded btn-icon">
                                <i class="ti-arrow-left"></i>
                            </a>
                        </div>
                        <form class="forms-sample" action="{{ route('persons.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control  @error('firstName') is-invalid @enderror"
                                            name="firstName" value="{{ old('firstName') }}" id="fname"
                                            placeholder="First Name">
                                        @error('firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fname">Middle Name</label>
                                        <input type="text"
                                            class="form-control  @error('middleName') is-invalid @enderror"
                                            name="middleName" value="{{ old('middleName') }}" id="fname"
                                            placeholder="First Name">
                                        @error('middleName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                            name="lastName" value="{{ old('lastName') }}" id="lname"
                                            placeholder="Last Name">
                                        @error('lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="contactNumber">Phone Number</label>
                                        <input type="text" value="{{ old('contactNumber') }}"
                                            class="form-control  @error('contactNumber') is-invalid @enderror"
                                            name="contactNumber" id="contactNumber" placeholder="Phone number">
                                        <small id="msg" class="text-danger"></small>
                                        @error('contactNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="dateOfBirth">Date Of Birth</label>
                                        <input type="date" value="{{ old('dateOfBirth') }}"
                                            class="form-control  @error('dateOfBirth') is-invalid @enderror"
                                            name="dateOfBirth" id="dateOfBirth">
                                        @error('dateOfBirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control  @error('address') is-invalid @enderror"
                                            name="address" value="{{ old('address') }}" id="address"
                                            placeholder="Address">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <select name="nationality"
                                            class="form-control @error('nationality') is-invalid @enderror">
                                            <option value="" disabled>Select Civil Status</option>
                                            <option value="Filipino"
                                                {{ old('nationality') == 'Filipino' ? 'selected' : '' }}>
                                                Filipino</option>
                                            <option value="Foreign" {{ old('nationality') == 'Foreign' ? 'selected' : '' }}>
                                                Foreign</option>
                                        </select>
                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="civilStatus">Civil Status</label>
                                        <select name="civilStatus"
                                            class="form-control @error('civilStatus') is-invalid @enderror">
                                            <option value="" disabled>Select Nationality</option>
                                            <option value="Single" {{ old('civilStatus') == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Married" {{ old('civilStatus') == 'Married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="Separated"
                                                {{ old('civilStatus') == 'Separated' ? 'selected' : '' }}>Separated</option>
                                            <option value="Annulled"
                                                {{ old('civilStatus') == 'Annulled' ? 'selected' : '' }}>
                                                Annulled</option>
                                        </select>
                                        @error('civilStatus')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror">{{ old('purpose') }}</textarea>
                                @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" value="1" name="status" class="form-check-input">
                                        Status
                                        <i class="input-helper"></i></label>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary me-2" id="btnSubmit">Submit</button>
                            <a href="{{ route('persons.index') }}" class="btn btn-light">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var flag = false
            $("#dateOfBirth").change(function(e) {
                e.preventDefault();
                var dob = $(this).val();
                calculateAge(dob);
            });

            $("#contactNumber").change(function(e) {
                e.preventDefault();
                var pn = $(this).val();
                isEmpty(pn)
            });

            function calculateAge(dob) {

                // Convert the birthdate string to a Date object
                var birthdate = new Date(dob);

                // Get the current date
                var currentDate = new Date();

                // Calculate the difference in years
                var age = currentDate.getFullYear() - birthdate.getFullYear();

                // Check if the birthday has occurred this year
                if (currentDate.getMonth() < birthdate.getMonth() || (currentDate.getMonth() === birthdate
                    .getMonth() && currentDate.getDate() < birthdate.getDate())) {
                    age--;
                }
                if (age >= 18) {
                    flag = true;
                    $("#msg").empty();
                    $("#msg").html("Please enter a phone number");
                    $("#btnSubmit").addClass("disabled");
                } else {
                    falg = false;
                    $("#msg").empty();
                    $("#btnSubmit").removeClass("disabled");
                }
            }

            function isEmpty(pn) {
                if (flag) {
                    if (pn.length == 11) {
                        console.log(pn.length);
                        $("#btnSubmit").removeClass("disabled");
                        $("#msg").empty();
                    } else {
                        $("#msg").empty();
                        $("#msg").html("Number should be 11 characters.");
                        $("#btnSubmit").addClass("disabled");
                    }
                } else {
                    $("#btnSubmit").removeClass("disabled");
                }
            }

        });
    </script>
@endsection
