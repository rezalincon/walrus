@extends('admin.layout.master.master')

@section('main-content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2 class="text-secondary"><strong>Subsribers</strong></h2>
            <ul class="header-dropdown dropdown">
                
                <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu theme-bg gradient">
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($subsribers as $subsriber)
                        <tr>
                            <td>{{ $subsriber->id }}</td>
                            <td>{{ $subsriber->email }}</td>
                        </tr>
                        @empty
                        <td colspan="5" class="text-center">No data Available</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection