<script>
    $(document).on('click','form input.delete-btn', function (e) {
                var _this = $(this);
                e.preventDefault();
                Swal.fire({
                        title: "{{ trans('global.areYouSure') }}",
                        text: "{{ trans('global.cantRevert') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "{{ trans('global.deleteYes') }}",
                        cancelButtonText:"{{ trans('global.deleteNo') }}"
                    }).then(res => {
                        if (res.value) {
                        _this.closest("form").submit();
                    }
                });
            });
</script>
