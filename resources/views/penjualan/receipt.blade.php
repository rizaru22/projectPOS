<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Receipt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400&display=swap" rel="stylesheet">
    <style>
        @media print {
            @page {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 7pt;
                font-family: 'Inconsolata', monospace;
                text-align: justify;
                size: 58mm, 100%;

            }
        }

        .border {
            border: 1px hidden black;
            width: 58mm;
        }



        .tdbreak {
            word-break: break-all;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 8pt;
            font-family: 'Inconsolata', monospace;
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="border">
        <p>invoice:{{ $dataOrder->invoice}}<br>Customer:{{ $dataOrder->customer->name}}<br>Cashier:{{ Auth::user()->name}}<br>Tanggal:{{$dataOrder->created_at->format('d M Y H:m')}}</p>
        <table>
            <thead>
                <tr>
                    <td>Product</td>
                    <td>Qty/Price</td>
                    <td>Amount</td>
                </tr>
            </thead>
            @foreach($dataOrderDetail as $dod)
            <tr>
                <td class="tdbreak">{{ $dod->product->name }}</td>
                <td class="tdbreak">{{$dod->qty}} x @money($dod->price)</td>
                <td>@money($dod->price*$dod->qty)</td>
            </tr>

            @endforeach
            <tr>
                <td colspan="2">Total:</td>
                <td>@money($dataOrder->total)</td>
            </tr>
        </table>
    </div>


    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            window.print();
            setInterval(myURL, 5000);
        });

        function myURL() {
            document.location.href = "{{ route('penjualan') }}";
            // clearInterval(interval);
        }
    </script>
</body>

</html>