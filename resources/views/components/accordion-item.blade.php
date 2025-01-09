<!-- resources/views/components/accordion-item.blade.php -->
<div class="card">
    <div class="card-header" id="heading{{ $id }}" style="background-color: brown; color:white">
        <h5 class="mb-0">
            <button class="btn btn-link {{ $collapsed }}" data-toggle="collapse" data-target="#collapse{{ $id }}"
                aria-expanded="{{ $expanded }}" aria-controls="collapse{{ $id }}" style="background-color: brown; color:white">
                {{ $title }}
            </button>
        </h5>
    </div>
    <div id="collapse{{ $id }}" class="collapse {{ $show }}" aria-labelledby="heading{{ $id }}" data-parent="#accordion">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Módulo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route($route, $item->id) }}">
                                <i class="fa fa-fw fa-eye"></i> {{ __('ver') }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
