<div class="row">
    <div class="col-md-7">

        <table class="table table-bordered titlecolumn">
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{{ $user->phone }}</td>
            </tr>

            <tr>
                <th>Country</th>
                <td>{{ @$user->country->name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ @$user->address }}</td>
            </tr>

            <tr>
                <th>Postal Address</th>
                <td>{{ @$user->postal_address }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($user->status == \App\Repositories\StatusRepository::getUserStatus('inactive'))
                        <button class="btn btn-warning btn-sm">In-active</button>

                    @elseif($user->status == \App\Repositories\StatusRepository::getUserStatus('active'))
                        <button class="btn btn-success btn-sm"> Active</button>

                    @elseif($user->status == \App\Repositories\StatusRepository::getUserStatus('suspended'))
                        <button class="btn btn-danger btn-sm"> Suspended</button>
                    @else
                        <button class="btn btn-danger btn-sm"> Deactivated</button>
                    @endif
                </td>
            </tr>
        </table>

    </div>
    <div class="col-md-3">


        @include('common.auto_modal',[
            'modal_title'=>'Change '.$user->name.' Password',
            'modal_id'=>'password_modal',
            'modal_content'=>'<div class="alert alert-info">User will be mailed a new password</div>'.Form::autoForm(['new_password'],"admin/users/user/$user->id/password")
        ])
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('input[name="deadline"]').datetimepicker();
        });

    </script>
</div>