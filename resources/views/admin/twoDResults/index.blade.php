@extends('layouts.admin_app')
@section('styles')
<style>
.transparent-btn {
 background: none;
 border: none;
 padding: 0;
 outline: none;
 cursor: pointer;
 box-shadow: none;
 appearance: none;
 /* For some browsers */
}
</style>
@endsection
@section('content')
<div class="row mt-4">
 <div class="col-12">
  <div class="card px-3">
   <!-- Card header -->
   <div class="card-header pb-0">
    <div class="d-lg-flex">
     <div>
      <h5 class="mb-0">2D Results</h5>

     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       <a href="{{ route('admin.twoD-results.create') }}" class="btn bg-gradient-primary btn-sm mb-0 py-2">+&nbsp; Create New Result</a>
       <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1 " data-type="csv" type="button"
        name="button">Export</button>
      </div>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-flush text-center">
     <thead class="thead-light">
      <th>#</th>
      <th>Result</th>
      <th>Session</th>
      <th>Created_at</th>
      <th>Action</th>
     </thead>
     <tbody class="text-center">
      @foreach ($results as $key => $result)
      <tr>
        <td class="text-sm font-weight-normal">{{ ++$key }}</td>
        <td class="text-sm font-weight-normal">
          <span class="d-block mb-2">{{ $result->result }}</span>
        </td>
        <td class="text-sm font-weight-normal">
          <span class="d-block mb-2">{{ $result->session->name }}</span>
        </td>
        <td class="text-sm font-weight-normal">{{ $result->created_at->format('F j, Y') }}</td>
        <td>
            <a href="{{ route('admin.twoD-results.edit', $result->id) }}" class="">
                <i class="fas fa-pen-to-square text-success me-2" style="font-size: 20px;"></i>
            </a>
            <form class="d-inline" action="{{ route('admin.twoD-results.destroy', $result->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="transparent-btn" data-bs-toggle="tooltip" data-bs-original-title="Delete User">
                <i class="fas fa-trash text-danger" style="font-size: 20px;"></i>
            </button>
            </form>
        </td>
      </tr>
      @endforeach
     </tbody>
    </table>
    <div class="d-flex justify-content-end">
      {{ $results->links() }}
    </div>
   </div>
  </div>
 </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin_app/assets/js/plugins/datatables.js') }}"></script>
{{-- <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script> --}}
<script>
if (document.getElementById('users-search')) {
 const dataTableSearch = new simpleDatatables.DataTable("#users-search", {
  searchable: true,
  fixedHeight: false,
  perPage: 7
 });

 document.querySelectorAll(".export").forEach(function(el) {
  el.addEventListener("click", function(e) {
   var type = el.dataset.type;

   var data = {
    type: type,
    filename: "material-" + type,
   };

   if (type === "csv") {
    data.columnDelimiter = "|";
   }

   dataTableSearch.export(data);
  });
 });
};
</script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
 return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
@endsection