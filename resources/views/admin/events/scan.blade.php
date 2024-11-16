@extends('layouts.app')

@section('content')
<div id="reader" style="width: 600px"></div>
<input type="hidden" id="event_id" value="{{ $event->id }}"> <!-- Menyimpan event_id -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        $('#result').val(decodedText);
        let id = decodedText;
        let event_id = $('#event_id').val();

        html5QrcodeScanner.clear().then(_ => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('events.attendance') }}",
                type: 'POST',
                data: {
                    _method: "POST",
                    _token: CSRF_TOKEN,
                    qr_code: id,
                    event_id: event_id // Mengirimkan event_id
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message); // Menampilkan pesan keberhasilan
                    } else {
                        alert(response.message); // Menampilkan pesan error
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan dalam proses absensi.');
                }
            });
        }).catch(error => {
            alert('Terjadi kesalahan dalam pemindaian.');
        });
    }

    function onScanFailure(error) {
        // Bisa dilewati atau log error-nya
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection