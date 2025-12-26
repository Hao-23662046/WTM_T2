@include('admin/template/header')

<div class="container my-4">
   <div class="row">
      <div class="col-12">
         <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-primary">
               <tr>
                  <th colspan="5" class="fs-5">Danh sách người dùng</th>
               </tr>
               <tr>
                  <th>Tên tài khoản</th>
                  <th>Họ tên</th>
                  <th>Địa chỉ</th>
                  <th colspan="2">
                     <a href="{{ url('admin/them-nguoi-dung') }}" class="btn btn-success btn-sm">+ Thêm người dùng</a>
                  </th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
               <tr>
                  <td>{{ $user->user_username }}</td>
                  <td>{{ $user->user_fullname }}</td>
                  <td>{{ $user->user_address }}</td>
                  <td>
                     <a href="{{ url('admin/thong-tin-nguoi-dung/' . $user->user_id) }}">
                        <img src="{{ asset('admin/img/edit.png') }}" width="30" title="Sửa">
                     </a>
                  </td>
                  <td>
                     <a href="#" onclick="confirmDelete('{{ $user->user_id }}')">
                        <img src="{{ asset('admin/img/delete.png') }}" width="30" title="Xóa">
                     </a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@include('admin/template/footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   @if(session('success'))
   Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      width: '260px'
   });
@endif
   function confirmDelete(id) {
      Swal.fire({
         title: 'Bạn có chắc chắn muốn xóa?',
         text: "Hành động này không thể hoàn tác!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Có, xóa đi!',
         cancelButtonText: 'Không'
      }).then((result) => {
         if (result.isConfirmed) {
            window.location.href = '/admin/xoa-nguoi-dung/' + id;
         }
      });
   }
</script>
