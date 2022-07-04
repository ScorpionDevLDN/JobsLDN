@extends('AdminDashboard.index')
@section('breadcrumb')
    <a class="btn">Payments</a>
    <a href="{{route('admin.transactions')}}" class="btn">Transactions</a>
@endsection
@section('title','Transactions')
@section('content')
    <div class="container">
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <h3 class="card-label">Transactions
                        <div class="text-muted pt-2 font-size-sm"></div>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <table id="tableToExcel" class="table responsive" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company</th>
                        <th scope="col">Job</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Paid at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">{{$transaction->id}}</th>
                            <td>{{$transaction->company->company_name}}</td>
                            <td>{{$transaction->job->title}}</td>
                            <td>{{$transaction->amount}}{{$transaction->symbol}}</td>
                            <td>{{$transaction->created_at}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            // document.title = 'Categories';
            $('#tableToExcel').DataTable(
                {
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    responsive: true,
                    language: { search: "" },
                    pagingType: 'numbers',
                    // "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    // dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                    "paging": true,
                    "autoWidth": true,
                }
            );
        });
    </script>
@endsection