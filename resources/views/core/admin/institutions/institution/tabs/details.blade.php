<div class="row">
    <div class="col-md-8">

        <table class="table table-bordered">
            <tr>
                <th class="titlecolumn">Institution Name</th>
                <td>{{ @$institution->name }}</td>
            </tr>

            <tr>
                <th class="titlecolumn">Institution Level</th>
                <td>{{ @$institution->institutionLevel->name }}</td>
            </tr>

            <tr>
                <th class="titlecolumn">Organization Type</th>
                <td>{{ @$institution->organizationType->name }}</td>
            </tr>
            <tr>
                <th class="titlecolumn">Address</th>
                <td>{{ @$institution->address }}</td>
            </tr>

            <tr>
                <th class="titlecolumn">Address Postal Code</th>
                <td>{{ @$institution->address_postal_code }}</td>
            </tr>

            <tr>
                <th class="titlecolumn">Discount Code</th>
                <td>{{ @$institution->discount }}</td>
            </tr>

            <tr>
                <th class="titlecolumn">Status</th>
                <td>
                @if($institution->status == \App\Repositories\StatusRepository::getInstitutionStatus('inactive'))
                    <button class="btn btn-outline-secondary">In active</button>
                @elseif($institution->status == \App\Repositories\StatusRepository::getInstitutionStatus('active'))
                        <button class="btn btn-outline-success">Active</button>
                @else
                        <button class="btn btn-outline-danger">Rejected</button>
                @endif
                </td>
            </tr>

        </table>

    </div>

    <div class="col-md-4">

        <div class="card">
            <div class="card-title">
                <span class="text-center mt-3 ml-5">Featured Image</span>
                <div class="text-center mt-2">
                    <img class="media-object rounded-circle" alt="64x64" src="{{ url($institution->featured_image) }}" style="width: 84px; height: 84px;">
                </div>
            </div>
            <div class="card-body">
                <h6>Actions</h6>
                @if($institution->status == \App\Repositories\StatusRepository::getInstitutionStatus('inactive') || $institution->status == \App\Repositories\StatusRepository::getInstitutionStatus('rejected'))
                    <a href="#" onclick="runPlainRequest(`{{ url('admin/institutions/institution/'.$institution->id.'/active') }}`)" class="btn btn-success btn-sm clear-form m-1" ><i class="fa fa-check"></i> Set as Active</a>
                @endif

                @if($institution->status != \App\Repositories\StatusRepository::getInstitutionStatus('rejected'))
                    <a href="#" onclick="runPlainRequest(`{{ url('admin/institutions/institution/'.$institution->id.'/rejected') }}`)" class="btn btn-danger btn-sm clear-form m-1" ><i class="fa fa-check"></i> Reject Listing</a>
                @endif

            </div>
        </div>
    </div>
</div>
