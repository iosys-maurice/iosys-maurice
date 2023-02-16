@extends('layouts.portal')
@section('css')
    {{--  <script src="https://js.stripe.com/v3/"></script>  --}}
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection


@section('content')
<div class="container navbar bg-white shadow-sm">
    <div class="col-md-12">
        <table id="invoice" class="col-md-12 row-border">
            <thead>
                <tr>
                    <th>Invoice Number</th>
                    <th>Due Date</th>
                    <th class="text-right mr-4">Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#invoice').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{!! route('invoice.listget') !!}",
                    "type": "GET"
                },select: {
                    style:    'os',
                    selector: 'td:name'
                },
                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                }
                ],
                columns: [
                    {data :'invnum', name: 'invnum'},
                    {
                        data :'due_date', 
                        name: 'due_date'
                    },
                    {data :'amount', name: 'amount'},
                    {data :'paid', name: 'paid'},
                ]
            } );
        } );
    </script>
@endsection