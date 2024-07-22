<script>
document.addEventListener('DOMContentLoaded', function() {
    const cancelButton = document.getElementById('cancel-button');
    if (cancelButton) {
        cancelButton.addEventListener('click', function() {
            @if (Route::currentRouteName() == 'admin.addUser' || Route::currentRouteName() == 'admin.edituser')
                window.location.href = '{{ route('admin.usersList') }}';
            @elseif (Route::currentRouteName() == 'admin.addBeverage' || Route::currentRouteName() == 'admin.editBeverage')
                window.location.href = '{{ route('admin.beveragesList') }}';
            @elseif (Route::currentRouteName() == 'admin.addCategory' || Route::currentRouteName() == 'admin.editCategory')
                window.location.href = '{{ route('admin.categoriesList') }}';
            @elseif (Route::currentRouteName() == 'admin.showMessage')
                window.location.href = '{{ route('admin.messages') }}';
            @endif
        });
    }
});
</script>