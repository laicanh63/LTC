@extends('admin.layouts.master')

@section('title', __('Add New Product'))

@section('content')
    <div class="container">
        <h1>{{ __('Add New Product') }}</h1>

        <form id="createForm" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text" name="name" id="name" class="form-control" value="" required>
            </div>

            <div class="form-group">
                <label for="parent_category">Danh mục cha</label>
                <select id="parent_category" class="form-control" required>
                    <option value="">-- Chọn danh mục cha --</option>
                    @foreach ($categories->where('parent_id', null) as $parent)
                        <option value="{{ $parent->id }}" data-abbr="{{ strtoupper(Str::slug(Str::words($parent->name,1,''))) }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục con</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục con --</option>
                    @foreach ($categories->where('parent_id', '!=', null) as $child)
                        <option value="{{ $child->id }}" data-parent="{{ $child->parent_id }}">{{ $child->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_code">Mã sản phẩm</label>
                <input type="text" name="product_code" id="product_code" class="form-control" value="" readonly style="background:#f5f5f5;">
            </div>

            <div class="form-group">
                <label for="author">Tác giả</label>
                <input type="text" name="author" id="author" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="translator">Dịch giả</label>
                <input type="text" name="translator" id="translator" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="publisher">Nhà xuất bản</label>
                <input type="text" name="publisher" id="publisher" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="publish_year">Năm xuất bản</label>
                <input type="number" name="publish_year" id="publish_year" class="form-control" value="{{ date('Y') }}">
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" id="price" class="form-control" value="99999" min="0" required>
            </div>

            <div class="form-group">
                <label for="stock">Tồn kho</label>
                <input type="number" name="stock" id="stock" class="form-control" value="99" min="0">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea style="min-height: 100px;" name="description" id="description" class="form-control">
- Kích thước : 14.5x20.5 cm
- Số trang : 336
- Khối lượng : 380 grams
- Bìa : bìa mềm</textarea>
            </div>

            <div class="form-group">
                <label for="infomations">Thông tin chi tiết</label>
                <textarea style="min-height: 100px;" name="infomations" id="infomations" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="features">Dịch vụ & Khuyến mãi</label>
                <textarea style="min-height: 100px;" name="features" id="features" class="form-control" required>
🔖 Đối với sản phầm giảm 40% - 50% - 70% (sản phẩm xả kho): Mỗi khách hàng được mua tối đa 3 sản phẩm/ 1 mặt hàng/ 1 đơn hàng
🎁Tặng kèm Bookmark (đánh dấu trang) cho các sách Kĩ năng sống, Kinh doanh, Mẹ và Bé, Văn học
🎁 FREESHIP cho đơn hàng từ 300K trở lên
🎁Tặng kèm 1 VOUCHER 20K cho đơn từ 500K trở lên
</textarea>
            </div>

            <div class="form-group">
                <label for="applications">Dịch vụ của chúng tôi</label>
                <textarea style="min-height: 100px;" name="applications" id="applications" class="form-control" required>
- Đóng gói cẩn thận
- Hỗ trợ khách hàng 24/7
</textarea>
            </div>

            <div class="form-group">
                <label for="images">Hình ảnh</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
        </form>
    </div>
@endsection

@section('js')
    <!-- Thêm sản phẩm -->
    <script>
        $(document).ready(function () {
            $('#createForm').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                if (!formData.get('price')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: 'Bạn phải nhập giá sản phẩm!'
                    });
                    return;
                }
                $.ajax({
                    url: '{{ route("admin.api.product.store") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        Swal.fire({
                            title: 'Đang xử lý...',
                            text: 'Vui lòng chờ trong giây lát!',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: 'Sản phẩm đã được thêm thành công!',
                        }).then(() => {
                            window.location.href = '{{ route("admin.products.index") }}';
                        });
                    },
                    error: function (xhr) {
                        let errorMessage = 'Có lỗi xảy ra!';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).join('\n');
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: errorMessage,
                        });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const parentSelect = document.getElementById('parent_category');
            const childSelect = document.getElementById('category_id');
            function filterChildren() {
                const parentId = parentSelect.value;
                Array.from(childSelect.options).forEach(opt => {
                    if (!opt.value) return;
                    opt.style.display = (opt.getAttribute('data-parent') === parentId) ? '' : 'none';
                });
                childSelect.value = '';
            }
            parentSelect.addEventListener('change', filterChildren);
            filterChildren();
        });

        // Tự sinh mã sản phẩm theo viết tắt danh mục cha + timestamp
        function generateProductCode() {
            const parent = document.querySelector('#parent_category');
            const name = document.querySelector('#name').value.trim();
            let abbr = parent.options[parent.selectedIndex]?.getAttribute('data-abbr') || '';
            let code = abbr ? abbr.toUpperCase() : '';
            if (name) {
                code += '-' + Date.now().toString().slice(-5);
            }
            document.querySelector('#product_code').value = code;
        }
        document.querySelector('#parent_category').addEventListener('change', generateProductCode);
        document.querySelector('#name').addEventListener('input', generateProductCode);
    </script>
@endsection