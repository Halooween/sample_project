@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Role Create</h4>
                    <div class="flex-shrink-0">

                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        {!! Form::open([ 'route'=> 'backend.role.store', 'method' => 'POST', 'files' => true, 'class' => 'needs-validation', 'novalidate']) !!}

                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <strong>Name</strong>
                                    {!! Form::text('name', null, ['placeholder'=> 'Enter Role' ,'class' => 'form-control' . ($errors->has('name') ? ' form-error' : '') . '', 'required']) !!}<br/>
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
                                    <strong>Permission:</strong><br/>
                                    @foreach ($permission_data as $permission)

                                    <label for="permissionInput" class="form-label">{{  $permission->name}}</label> 
                                    {{-- {{ dd($permission_data) }} 
                                    {{-- {{ Form::checkbox('permission', $value->id, false, ['class' =>
                                        'form-check-input name_chkbx', 'id' => $permission, 'required']) }} --}}
                                     {{-- {!! Form::checkbox('permission[]', null, ['class' => 'form-control' . ($errors->has('permission') ? ' form-error' : '') . '']) !!} --}}

                                     {{ Form::checkbox('permission[]', $permission->id, false, array('class' => 'name')) }}
                                     <br/>

                                     @endforeach

                                     @if ($errors->has('permission'))
                                         <div class="invalid-feedback">{{ $errors->first('permission') }}</div>
                                         <span class="text-danger">{{ $errors->first('permission') }}</span>
                                     @else
                                         <div class="valid-feedback">
 
                                         </div>
                                     @endif 
                                 
                                </div>
                            </div>

                         
                            

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <a class="btn btn-primary" href="{{ route('backend.role.index') }}"> Back</a>

                                    <button type="submit" class="btn btn-primary">Create</button>
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
