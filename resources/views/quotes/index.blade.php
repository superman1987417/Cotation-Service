@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Orçamentos</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <tr>
            <th>Veículo</th>
            <th>Cidade</th>
            <th>Características</th>
            <th>Ja tem o veículo?</th>
            <th>Responsável</th>
            <th>Entrada</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($quotes as $quote)
            <tr>
                <td>{{ $quote->vehicle->id }}</td>
                <td>{{ $quote->location->location ?? null }}</td>
                <td>{{ implode(',', $quote->getAllCharacteristics()) }}</td>
                <td>
                    <span class="glyphicon glyphicon-ok"></span>
                </td>
                <td>{{ $quote->clerk->name}}</td>
                <td>{{ ($quote->created_at->year < 1) ? '' : $quote->created_at->format('d/m/Y')}}</td>
                <td>
                    <a class="btn btn-default" title="Visualizar" href="{{ route('quotes.resend_email',$quote->id) }}">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                    </a>
                    <a class="btn btn-primary" title="Reenviar E-mail" href="{{ route('quotes.resend_email',$quote->id) }}">
                        <span class="glyphicon glyphicon-repeat"></span>
                    </a>
                    <a class="btn btn-success" title="Finalizar" href="{{ route('quotes.resend_email',$quote->id) }}">
                        <span class="glyphicon glyphicon-download-alt"></span>
                    </a>
                    <a class="btn btn-danger" title="Excluir" href="{{ route('quotes.resend_email',$quote->id) }}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>

                </td>
            </tr>
        @endforeach
    </table>

    <nav aria-label="Page navigation example">
        {!! $quotes->links() !!}
    </nav>
@endsection