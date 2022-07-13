@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">User Create</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        {!! Form::open([ 'route'=> 'backend.user.store', 'method' => 'POST', 'files' => true, 'class' => 'needs-validation', 'novalidate']) !!}

                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">name</label>
                                    {!! Form::text('name', null, [ 'class' => 'form-control' . ($errors->has('name') ? ' form-error' : '') . '', 'required']) !!}
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @else
                                        <div class="valid-feedback">

                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">email</label>
                                    {!! Form::email('email', null, [ 'class' => 'form-control' . ($errors->has('email') ? ' form-error' : '') . '', 'required']) !!}
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @else
                                        <div class="valid-feedback">

                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="passInput" class="form-label">Password</label>
                                    {!! Form::password('password', [ 'class' => 'form-control' . ($errors->has('password') ? ' form-error' : '') . '', 'required']) !!}
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">Valid Mobile Number Required</div>
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @else
                                        <div class="valid-feedback">

                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--end col-->
                           {{--  <div class="col-6">
                                <div class="mb-3">
                                    <label for="numberInput" class="form-label">Mobile Number</label>
                                    {!! Form::number('mobile_number', null, ['placeholder' => '+977-9808198756', 'class' => 'form-control' . ($errors->has('mobile_number') ? ' form-error' : '') . '', 'required']) !!}
                                    @if ($errors->has('mobile_number'))
                                        <div class="invalid-feedback">Valid Mobile Number Required</div>
                                        <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                    @else
                                        <div class="valid-feedback">

                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="bioInput" class="form-label">bio</label>
                                    {!! Form::text('bio', null, ['placeholder' => 'bio', 'class' => 'form-control' . ($errors->has('bio') ? ' form-error' : '') . '', 'required']) !!}
                                    @if ($errors->has('bio'))
                                        <div class="invalid-feedback">{{ $errors->first('bio') }}</div>
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                    @else
                                        <div class="valid-feedback">
    
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="genderInput" class="form-label">gender</label>
                                    {!! Form::select('gender', ['M' => 'male', 'F' => 'female'], null, ['class' => 'form-select', 'required']) !!}
                                    @if ($errors->has('gender'))
                                        <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @else
                                        <div class="valid-feedback">
    
                                        </div>
                                    @endif
                                </div>
                            </div>--}}
                            <!--end col-->


                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="categoryInput" class="form-label">category</label>
                                
                                    {!! Form::select('category', $data, null, ['class' => 'form-select', 'required']) !!}

                                    @if ($errors->has('category'))
                                        <div class="invalid-feedback">{{ $errors->first('category') }}</div>
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @else
                                        <div class="valid-feedback">
                                            
                                        </div>
                                    @endif
                                </div>
                            </div>
                         
                            

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <a class="btn btn-primary" href="{{ route('backend.user.index') }}"> Back</a>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div> 
                        </div>
                        <!--end row-->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        flatpickr('#dob', {
            defaultDate: 'today',
            allowInput: true

        });
    </script>
@endsection --}}
