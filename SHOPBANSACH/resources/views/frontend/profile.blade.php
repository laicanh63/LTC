@extends('frontend.layouts.master')
@section('title', 'Profile')

@section('style')
<link rel="stylesheet" href="{{ asset('frontendcss/css/profile.css') }}" />
<style>
    .profile-container {
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
</style>
@endsection

@section('content')
<div class="profile-container">
    <div class="sidebar">
        <h3>{{ __('Category') }}</h3>
        <div class="nav-item active" data-target="profile">{{ __('Profile') }}</div>
        <div class="nav-item" data-target="orders">{{ __('Orders') }}</div>
        <div class="nav-item" data-target="password">{{ __('Password') }}</div>
    </div>
    <div class="content">
        <div id="profile" class="content-section active">
            <h2>{{ __('Profile') }}</h2>
            <form id="profile-form" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label>{{ __('Avatar') }}:</label>
                    <br>
                    <img id="avatar-preview" src="{{ asset($infoUser->avatar) }}" alt="Avatar" class="img-thumbnail"
                        width="150">
                    <br>
                    <input id="avatar" type="file" class="form-control mt-2" name="avatar" accept="image/*"
                        onchange="previewAvatar(event)">
                </div>
                <div class="form-group">
                    <label>{{ __('First Name') }}:</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $infoUser->first_name }}">
                </div>
                <div class="form-group">
                    <label>{{ __('Last Name') }}:</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $infoUser->last_name }}">
                </div>
                <div class="form-group">
                    <label>{{ __('Email') }}:</label>
                    <input type="email" class="form-control" name="email" value="{{ $infoUser->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>{{ __('Phone Number') }}:</label>
                    <input type="text" class="form-control" name="phone" value="{{ $infoUser->phone }}">
                </div>
                <div class="form-group">
                    <label>{{ __('Address') }}:</label>
                    <input type="text" class="form-control" name="address" value="{{ $infoUser->address }}">
                </div>
                <div class="form-group">
                    <label>{{ __('Date of Birth') }}:</label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{ $infoUser->date_of_birth }}" max="2007-06-06">
                </div>
                <div class="form-group">
                    <label>{{ __('Gender') }}:</label>
                    <select class="form-control" name="gender">
                        <option value="male" {{ $infoUser->gender == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                        <option value="female" {{ $infoUser->gender == 'female' ? 'selected' : '' }}>{{ __('Female') }}
                        </option>
                        <option value="other" {{ $infoUser->gender == 'other' ? 'selected' : '' }}>{{ __('Other') }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
            </form>
        </div>
        <div id="orders" class="content-section">
            <h2>{{ __('Orders') }}</h2>
            @if(count($orders) != 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('Order ID') }}</th>
                            <th>{{ __('Total Price') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Phone Number') }}</th>
                            <th>{{ __('Details') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ number_format($order['total'], 0, ',', '.') }} đ</td>
                            <td>
                                @php
                                $statusClasses = [
                                'pending' => 'badge bg-secondary', // Chờ xử lý (màu xám)
                                'confirm' => 'badge bg-primary', // Đã xác nhận (xanh dương)
                                'ship' => 'badge bg-warning text-dark', // Đang giao hàng (vàng cam)
                                'delivery' => 'badge bg-success', // Đã giao hàng (xanh lá)
                                'return' => 'badge bg-info text-dark', // Trả hàng (xanh nhạt)
                                'cancel' => 'badge bg-danger', // Đã hủy (đỏ)
                                ];
                                $statusClass = $statusClasses[$order['status']] ?? 'badge bg-dark'; // Mặc định nếu trạng thái không hợp lệ
                                @endphp

                                <span class="{{ $statusClass }}">
                                    {{ ucfirst($order['status']) }}
                                </span>
                            </td>

                            <td>{{ $order['address'] }}</td>
                            <td>{{ $order['phone'] }}</td>
                            <td>
                                <ul>
                                    @foreach($order['details'] as $detail)
                                    <li>
                                        {{ $detail['product']['name'] }} - {{ $detail['quantity'] }} x
                                        {{ number_format($detail['product']['price'], 0, ',', '.') }} đ
                                        @if(!empty($detail['rental_end_date']))
                                        - {{ __('Rental Date') }}: {{ $detail['rental_start_date'] }}
                                        {{ __('and Return Date') }}:
                                        {{ $detail['rental_end_date'] }}
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <button id="cancel" class="btn {{ $order['status']=='confirm' ? 'btn-danger' : 'btn-secondary' }}"
                                    {{ $order['status']=='confirm' ? '' : 'disabled' }}>
                                    {{ __('Cancel') }}
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <span>{{ __('No successful orders yet') }}</span>
            @endif
        </div>
        <div id="password" class="content-section">
            <h2 class="mb-4">{{ __('Password') }}</h2>
            <form id="password-form">
                <div class="form-group">
                    <label for="current-password">{{ __('Current Password') }}</label>
                    <input id="current-password" name="current-password" type="password" class="form-control"
                        placeholder="{{ __('Enter old password') }}" required>
                </div>
                <div class="form-group">
                    <label for="new-password">{{ __('New Password') }}</label>
                    <input id="new-password" name="new-password" type="password" class="form-control"
                        placeholder="{{ __('Enter new password') }}" required>
                </div>
                <div class="form-group">
                    <label for="confrim-password">{{ __('Confirm Password') }}</label>
                    <input id="confrim-password" name="confrim-password" type="password" class="form-control"
                        placeholder="{{ __('Re-enter new password') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Update password') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Nav chuyển tab -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function showTabFromHash() {
            // First check if there's a saved tab in localStorage (from language switch)
            let savedTab = localStorage.getItem('profileActiveTab');
            if (savedTab) {
                localStorage.removeItem('profileActiveTab'); // Clear it after use
                window.location.hash = savedTab; // Set the hash in the URL
            }
            
            let hash = window.location.hash.substring(1); // Lấy phần sau dấu #
            if (hash) {
                let targetTab = document.querySelector(`.nav-item[data-target="${hash}"]`);
                if (targetTab) {
                    document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
                    targetTab.classList.add('active');

                    document.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
                    document.getElementById(hash).classList.add('active');
                    
                    // Scroll to the top of the page smoothly
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            }
        }

        // Khi trang tải, kiểm tra URL hash
        showTabFromHash();

        // Lắng nghe sự kiện click để thay đổi hash
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.nav-item').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');

                let target = this.getAttribute('data-target');
                window.location.hash = target; // Cập nhật hash trên URL

                document.querySelectorAll('.content-section').forEach(section => section.classList.remove('active'));
                document.getElementById(target).classList.add('active');
                
                // Scroll to the top of the page smoothly
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        // Khi hash thay đổi (ví dụ: người dùng nhấn nút quay lại trên trình duyệt)
        window.addEventListener("hashchange", showTabFromHash);
    });
</script>

<!-- Cập nhật thông tin cá nhân -->
<script>
    function previewAvatar(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('avatar-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function() {
        let initialData = {};
        let initialAvatar = null;

        function getFormData() {
            $('#profile-form').find('input, select').each(function() {
                if ($(this).attr('type') !== 'file') {
                    initialData[$(this).attr('name')] = $(this).val();
                }
            });

            let avatarInput = $('#avatar')[0];
            if (avatarInput.files.length > 0) {
                initialAvatar = avatarInput.files[0];
            }
        }

        getFormData(); // Lưu dữ liệu ban đầu

        $('#profile-form').on('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            let hasChanged = false;

            // Kiểm tra thay đổi dữ liệu text, select
            $(this).find('input, select').each(function() {
                if ($(this).attr('type') !== 'file') {
                    let name = $(this).attr('name');
                    let value = $(this).val();

                    if (initialData[name] !== value) {
                        hasChanged = true;
                    }
                }
            });

            // Kiểm tra xem có ảnh mới không
            let avatarInput = $('#avatar')[0];
            if (avatarInput.files.length > 0 && avatarInput.files[0] !== initialAvatar) {
                hasChanged = true;
            }

            if (!hasChanged) {
                Swal.fire({
                    icon: 'info',
                    title: "{{ __('No changes') }}",
                    text: "{{ __('Not Found') }}",
                });
                return;
            }

            $.ajax({
                url: "{{ route('api.update.info') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "{{ __('Processing...') }}",
                        text: "{{ __('Please wait a moment!') }}",
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Update successful!',
                        text: response.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        getFormData(); // Cập nhật lại dữ liệu sau khi lưu thành công

                        // Cập nhật avatar preview nếu có ảnh mới
                        if (avatarInput.files.length > 0) {
                            let reader = new FileReader();
                            reader.onload = function(e) {
                                $('#avatar-preview').attr('src', e.target.result);
                            };
                            reader.readAsDataURL(avatarInput.files[0]);
                        }
                    });
                },
                error: function(xhr) {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON?.message || 'An error occurred, please try again.',
                    });
                }
            });
        });

        // Hiển thị ảnh preview ngay khi chọn file
        $('#avatar').on('change', function() {
            let file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatar-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<!-- Cập nhật mật khẩu -->
<script>
    $(document).ready(function() {
        $('#password-form').on('submit', function(event) {
            event.preventDefault();

            let currentPassword = $('#current-password').val();
            let newPassword = $('#new-password').val();
            let confirmPassword = $('#confrim-password').val();

            if (newPassword !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'New password does not match, please re-enter.',
                });
                return;
            }

            $.ajax({
                url: "{{ route('api.update.password') }}",
                type: "POST",
                data: {
                    current_password: currentPassword,
                    new_password: newPassword,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    Swal.fire({
                        title: "{{ __('Processing...') }}",
                        text: "{{ __('Please wait a moment!') }}",
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        willOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                    }).then(() => {
                        $('#password-form')[0].reset();
                    });
                },
                error: function(xhr) {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON.message || 'An error occurred, please try again.',
                    });
                }
            });
        });
    });
</script>

<!-- Hủy đơn hàng -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#cancel.btn-danger', function() {
            let row = $(this).closest("tr");
            let orderId = row.find("td:nth-child(1)").text().trim();

            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('You will not be able to recover this order!') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "{{ __('Yes, cancel it!') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('api.order.cancel') }}",
                        type: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        contentType: "application/json",
                        data: JSON.stringify({
                            orderId: orderId
                        }),
                        beforeSend: function() {
                            Swal.fire({
                                title: "{{ __('Processing...') }}",
                                text: "{{ __('Please wait a moment!') }}",
                                allowOutsideClick: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: "success",
                                    title: "{{ __('Order canceled!') }}",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "{{ __('Error!') }}",
                                    text: response.message || "{{ __('Failed to cancel the order.') }}",
                                    confirmButtonText: "OK"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: "error",
                                title: "{{ __('Error!') }}",
                                text: xhr.responseJSON?.message || "{{ __('An error occurred while canceling the order.') }}",
                                confirmButtonText: "OK"
                            });
                            console.error("Error:", xhr.responseText);
                        }
                    });
                }
            });
        });
    });
</script>
@endsection