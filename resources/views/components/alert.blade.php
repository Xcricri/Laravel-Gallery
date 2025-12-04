@if (session()->has('success'))
    <script>
        let flashMessage = "{{ session()->get('success') }}";

        function displayAlert(message, type) {
            if (type === 'success') {
                alert('Success! ' + message);
            } else {
                alert('Message: ' + message);
            }
        }

        displayAlert(flashMessage, 'success');
    </script>
@endif
