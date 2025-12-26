@include('admin/template/header')

<body style="background-color:#f8f9fa;">
<div class="container my-5">
    <h2>
        @if(isset($category)) 
            <i class="fas fa-edit me-2"></i> Sửa danh mục 
        @else 
            <i class="fas fa-plus me-2"></i> Thêm danh mục mới 
        @endif
    </h2>

    <!-- Form Thêm/Sửa Danh Mục -->
    <form action="{{ isset($category) ? url('admin/sua-danh-muc/'.$category->category_id) : url('admin/them-danh-muc') }}" method="POST">
        @csrf
        @if(isset($category)) 
            @method('PUT') <!-- Sử dụng phương thức PUT khi sửa danh mục -->
        @endif
        
        <div class="mb-3">
            <label for="category_name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="category_name" name="category_name" 
                   value="{{ isset($category) ? $category->category_name : old('category_name') }}" required>
        </div>
        <button type="submit" class="btn {{ isset($category) ? 'btn-warning' : 'btn-primary' }}">
            {{ isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục' }}
        </button>
    </form>
</div>

@include('admin/template/footer')

</body>
