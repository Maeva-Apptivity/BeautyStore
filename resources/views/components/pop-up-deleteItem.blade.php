@if(session('success') || session('error') || session('warning'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                customClass: {
                    popup: 'compact-toast'
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: '{{ session("success") ? "success" : (session("error") ? "error" : "warning") }}',
                title: '{{ session("success") ?? session("error") ?? session("warning") }}'
            });

            // Style pour la version compacte
            const style = document.createElement('style');
            style.textContent = `
                .compact-toast {
                    min-height: 50px !important;
                    max-height: 60px !important;
                    padding: 0.5rem 0.8rem !important;
                    font-size: 0.85rem !important;
                }
                .swal2-title {
                    padding: 0.3rem 0 !important;
                    margin: 0 !important;
                }
            `;
            document.head.appendChild(style);
        });
    </script>
@endif