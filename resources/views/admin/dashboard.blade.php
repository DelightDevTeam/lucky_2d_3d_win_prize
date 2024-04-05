@extends('layouts.admin_app')
@section('styles')
<style>
    .text-gold{
        color: #ffc107;
    }
    .border-gold{
        border: 1px solid #ffc107;
    }
</style>
@endsection
@section('content')

<div class="container">
    <div class="row">
        @foreach ($sessions as $session)
        <div class="col-md-2 col-6 mb-3">
            <div class="card p-1 text-center bg-dark text-white border-gold">
                <div class="card-body">
                    <h6 class="card-title text-gold">
                        <i class="fa-regular fa-clock me-1 text-gold"></i>
                        {{ $session->name }}
                    </h6>
                    <p class="card-text fw-bold">
                        <i class="fa-solid fa-award me-1 text-gold"></i>
                        {{ $session->results[0]->result ?? "--" }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-md-6 mb-3">
            <div class="card bg-transparent border-gold">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-dark border-radius-lg py-2 pe-1 border-gold">
                        <h4 class="text-gold font-weight-bolder text-center mb-2">Create 2D Result</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form class="text-start" action="{{ route('admin.twoD-results.store') }}" method="POST">
                        @csrf
                        <div class="custom-form-group mb-3">
                            <label for="result" class="text-dark">Result</label>
                            <input type="number" id="result" value="" name="result" class="form-control border border-dark px-2" placeholder="Enter Result">
                            @error('result')
                            <small class="text-danger d-block">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="two_d_session_id" class="form-label text-dark">Choose Session</label>
                            <select name="two_d_session_id" id="two_d_session_id" class="form-control form-select border border-dark px-2">
                            <option value="">Choose Session</option>
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                            @endforeach
                            </select>
                            @error('two_d_session_id')
                            <small class="text-danger d-block">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('admin_app/assets/js/plugins/chartjs.min.js')}}"></script>
{{-- pie chart --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js">
</script>
<script src="{{ asset('admin_app/assets/js/dashboard.js')}}"></script>
<script src="{{ asset('admin_app/assets/js/v_1_dashboard.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    @if(session('SuccessRequest'))
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session("SuccessRequest") }}',
      timer: 3000,
      showConfirmButton: false
    });
    @endif

    // If you want to show an error or other types of alerts, you can add more conditions here
    @if(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '{{ session("error") }}'
    });
    @endif
});

// For the reset confirmation, you can replace the native confirm with SweetAlert
// $('form').on('submit', function(e) {
//     e.preventDefault(); // prevent the form from submitting immediately
//     var form = this;
//     Swal.fire({
//         title: 'Are you sure you want to reset?',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, reset it!'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             form.submit(); // submit the form if confirmed
//         }
//     });
// });


</script>

{{-- first chart end --}}
@endsection
